<?php

namespace App\Table;

use Core\Table\Table;

class UserTable extends Table {

    public function getUserByID($id) {
        return $this->query("
            SELECT users.username
            FROM users
            WHERE users.id = ?
        ", [$id]);
    }


}