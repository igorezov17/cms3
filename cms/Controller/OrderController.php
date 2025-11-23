<?php

class OrderController
{
    public function __construct(
        public string $name,
        private int $age
    )
    {}

    public function setName(string $name):void
    {
        $thid->name = $name;
    }

    public function getName():OrderController
    {
        return $this->name;
    }

    private function has()
    {
        return $this->name ?? null;
    }

    public function setAge():void
    {
        $this->age = $age;
    }
}