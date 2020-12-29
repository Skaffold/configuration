<?php

namespace Skaffold\Configuration;

use Atomastic\Arrays\Arrays;

class ConfigurationRepository implements ConfigurationRepositoryContract
{
    protected Arrays $storage;

    public function __construct($items = [])
    {
        $this->storage = new Arrays($items);
    }

    public function all()
    {
        return $this->storage->all();
    }

    public function delete($keys): void
    {
        $this->storage->delete($keys);
    }

    public function flush(): void
    {
        $this->storage->flush();
    }

    public function get(string $key, $default = null)
    {
        return $this->storage->get($key, $default);
    }

    public function has($keys): bool
    {
        return $this->storage->has($keys);
    }

    public function set(string $key, $value): void
    {
        $this->storage->set($key, $value);
    }
}
