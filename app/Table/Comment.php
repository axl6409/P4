<?php

namespace App\Table;

use App\App;

class Comment extends Table {

    public function getURL() {
        return 'index.php?p=comment&id=' . $this->id;
    }
}