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
     * Get the account url with user ID
     * @return string
     */
    public function getUrl()
    {
        return 'index.php?p=users.account&id=' . $this->id;
    }
}
