<?php

namespace App\Entity;

use Core\Entity\Entity;

/**
 * Class UserEntity
 * @package App\Entity
 */
class UserEntity extends Entity
{

    /**
     * Get the Url for user account & pass the user id
     * @return string
     */
    public function getUrl()
    {
        return 'index.php?p=users.account&id=' . $this->id;
    }
}
