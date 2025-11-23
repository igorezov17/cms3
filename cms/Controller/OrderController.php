<?php

class OrderController
{
    public function __construct(
        public string $name;
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
}