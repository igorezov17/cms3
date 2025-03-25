<?php

namespace Engine\DI;

class DI 
{
    private $container = [];
    
    public function set($key, $value): DI
    {
        $this->container[$key] = $value;

        return $this;
    }

    public function get($key)
    {
        return $this->has($key);
    }

    private function has($key): mixed
    {
        return $this->container[$key] ? $this->container[$key] : null;
    }
}