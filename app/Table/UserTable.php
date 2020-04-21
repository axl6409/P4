<?php

namespace App\Table;

use Core\Table\Table;

/**
 * Class UserTable
 * @package App\Table
 */
class UserTable extends Table {

    /**
     * BDD Table - Users
     * @var string
     */
    protected $table = 'users';

    /**
     * Get User Informations
     * @param $id
     * @return mixed
     */
    public function infos($id) {
        return $this->query("
            SELECT *
            FROM users
            WHERE users.id = ?
        ", [$id]);
    }

    /**
     * Get only regular users (status : 2) Informations
     * @return mixed
     */
    public function regUsers() {
        return $this->query("
            SELECT *
            FROM users
            WHERE role_id = 2
        ");
    }

    /**
     * Find a result in a table by the name
     * @param $name
     * @return mixed
     */
    public function findByName($name) {
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$name], true);
    }


}
