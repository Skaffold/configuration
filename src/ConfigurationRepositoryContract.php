<?php

namespace Skaffold\Configuration;

interface ConfigurationRepositoryContract
{
    public function all();
    public function delete($keys): void;
    public function flush(): void;
    public function get(string $key, $default = null);
    public function has($keys): bool;
    public function set(string $key, $value): void;
}
