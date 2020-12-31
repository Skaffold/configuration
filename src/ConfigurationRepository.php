<?php

namespace Skaffold\Configuration;

use Atomastic\Arrays\Arrays;

class ConfigurationRepository implements ConfigurationRepositoryInterface
{
    protected Arrays $storage;

    public function __construct()
    {
        $this->storage = new Arrays;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(string $key): void
    {
        $this->storage->delete($key);
    }

    /**
     * {@inheritdoc}
     */
    public function fill(array $items): void
    {
        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function flush(): void
    {
        $this->storage->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function get(?string $key = null, $default = null)
    {
        if (! $key) {
            return $this->storage->all();
        }

        return $this->storage->get($key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function has(string $key): bool
    {
        return $this->storage->has($key);
    }

    /**
     * {@inheritdoc}
     */
    public function set(string $key, $value): void
    {
        $this->storage->set($key, $value);
    }
}
