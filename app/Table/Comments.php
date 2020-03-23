<?php

namespace App\Table;

use App\App;

class Comments extends Table {

    protected static $table = 'comments';

    public function getURL() {
        return 'index.php?p=comment&id=' . $this->id;
    }
}