<?php

namespace App\Table;

use Core\Table\Table;

class UserTable extends Table {

    protected $table = 'users';

    public function infos($id) {
        return $this->query("
            SELECT *
            FROM users
            WHERE users.id = ?
        ", [$id]);
    }

    public function regUsers() {
        return $this->query("
            SELECT *
            FROM users
            WHERE role_id = 2
        ");
    }


}
