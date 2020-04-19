<?php

namespace Core\Entity;

/**
 * Class Entity
 * @package Core\Entity
 */
class Entity {

    /**
     * Magic PHP method __get | uses for the entities to get there functions
     * @param $key
     * @return mixed
     */
    public function __get($key) {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}
