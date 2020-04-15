<?php

namespace Core\Entity;

/**
 * Class Entity
 * @package Core\Entity
 */
class Entity {

    /**
     * Get entities
     * @param $key
     * @return mixed
     */
    public function __get($key) {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}
