<?php

namespace Skaffold\Tests\Configuration;

use PHPUnit\Framework\TestCase;
use Skaffold\Configuration\ConfigurationRepository;

/**
 * @covers \Skaffold\Configuration\ConfigurationRepository
 */
class ConfigurationRepositoryTest extends TestCase
{
    public function test_it_can_create_empty_repository()
    {
        $repo = new ConfigurationRepository;

        $this->assertEmpty($repo->all());
    }

    public function test_it_can_create_repository_with_items()
    {
        $repo = new ConfigurationRepository([
            'test' => 'Hello world!'
        ]);

        $this->assertCount(1, $repo->all());
    }

    public function test_it_can_get_items()
    {
        $repo = new ConfigurationRepository([
            'test' => 'Hello world!'
        ]);

        $this->assertTrue($repo->has('test'));
        $this->assertFalse($repo->has('does not exist'));

        $this->assertEquals('Hello world!', $repo->get('test'));
        $this->assertEquals('fallback', $repo->get('does not exist', 'fallback'));
        $this->assertNull($repo->get('does not exist'));
    }

    public function test_it_can_delete_items()
    {
        $repo = new ConfigurationRepository([
            'test' => 'Hello world!'
        ]);

        $this->assertTrue($repo->has('test'));
        $repo->delete('test');
        $this->assertFalse($repo->has('test'));
    }

    public function test_it_can_flush_items()
    {
        $repo = new ConfigurationRepository([
            'test'  => 'Hello world!',
            'test2' => 'Hi there!',
        ]);

        $this->assertCount(2, $repo->all());
        $repo->flush();
        $this->assertEmpty($repo->all());
    }
}
