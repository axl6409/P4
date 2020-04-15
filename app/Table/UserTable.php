<?php

namespace App\Table;

use Core\Table\Table;

/**
 * Class UserTable
 * @package App\Table
 */
class UserTable extends Table {

    protected $table = 'users';

    /**
     * Get user info by user ID
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
     * Get regular users
     * @return mixed
     */
    public function regUsers() {
        return $this->query("
            SELECT *
            FROM users
            WHERE role_id = 2
        ");
    }


}
