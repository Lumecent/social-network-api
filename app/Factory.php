<?php

namespace App;

abstract class Factory
{
    use TSingleton;

    protected $aliases = [];

    public function __construct()
    {
        $this->aliases = $this->setAliases();
    }

    /**
     * Getting single instance of the class specified in the alias
     *
     * @param string $property
     * @return mixed
     */
    public function __get(string $property)
    {
        return $this->getAlias($property)::getInstance();
    }

    /**
     * Getting path of the class on alias
     *
     * @param string $alias
     * @return mixed
     */
    protected function getAlias(string $alias)
    {
        $path = $this->aliases[$alias] ?? null;

        if ($path){
            return $path;
        }

        throw new \InvalidArgumentException("Alias [{$alias}] not found", 500);
    }

    /**
     * Load the alias map
     *
     * @return array
     */
    protected function setAliases()
    {
        return $this->aliases = $this->aliases();
    }

    abstract protected function aliases();
}
