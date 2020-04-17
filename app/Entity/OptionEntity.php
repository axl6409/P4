<?php


namespace App\Entity;

use Core\Entity\Entity;

class OptionEntity extends Entity {

    public function getUrl() {
        return 'index.php?p=admin.options.edit&id=' . $this->id;
    }

    public function getExcerpt() {
        $html = substr($this->value, 0, 150).'...';
        return $html;
    }

}
