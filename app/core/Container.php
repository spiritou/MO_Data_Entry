<?php

namespace App\Core;

class Container
{
    private array $bindings = [];

    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function get(string $class)
    {
        if (isset($this->bindings[$class]))
            {
                return $this->bindings[$class]($this);
            }

            $reflectionClass = new \ReflectionClass($class);
            $constructor = $reflectionClass->getConstructor();

            if (!$constructor) {
                return new $class;
            }

            $dependencies =[];
            foreach ($constructor->getParameters() as $parameter) {
                $type = $parameter->getType();
                if ($type && !$type->isBuiltin()) {
                    $dependencies[] = $this->get($type->getName());
                } else {
                    throw new \Exception("Cannot resolve dependency: " . $parameter->getName());
                }
            }
            return $reflectionClass->newInstanceArgs($dependencies);
    }
}