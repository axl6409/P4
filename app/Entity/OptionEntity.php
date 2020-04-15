<?php


namespace App\Entity;

use Core\Entity\Entity;

/**
 * Class OptionEntity
 * @package App\Entity
 */
class OptionEntity extends Entity {

    /**
     * Get Option Url with the ID
     * @return string
     */
    public function getUrl() {
        return 'index.php?p=admin.options.edit&id=' . $this->id;
    }

    /**
     * Get the Option excerpt and limit to 150 caract
     * @return string
     */
    public function getExcerpt() {
        $html = substr($this->value, 0, 150).'...';
        return $html;
    }

}
