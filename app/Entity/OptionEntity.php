<?php


namespace App\Entity;

use Core\Entity\Entity;

/**
 * Class OptionEntity
 * @package App\Entity
 */
class OptionEntity extends Entity {

    /**
     * Get the option url for edit & pass the option id
     * @return string
     */
    public function getUrl() {
        return 'index.php?p=admin.options.edit&id=' . $this->id;
    }

    /**
     * Get the option excerpt for a preview of the option value
     * @return string
     */
    public function getExcerpt() {
        $html = substr($this->value, 0, 150).'...';
        return $html;
    }

}
