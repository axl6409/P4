<?php

namespace App\Table;

use App\App;

class Categorie extends Table {

    public function getURL() {
        return 'index.php?p=category&id=' . $this->id;
    }
}