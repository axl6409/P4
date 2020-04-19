<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

/**
 * Class UsersController
 * @package App\Controller\Admin
 */
class UsersController extends AppController {

    /**
     * UsersController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->loadModel('User');
    }

    /**
     * Display all the users on the admin page
     * @uses \App\Table\UserTable
     */
    public function index(){
        $users = $this->User->regUsers();
        $this->render('admin.users.index', compact('users'));
    }

    /**
     * Let the admin to delete a user
     * @uses \App\Table\UserTable
     */
    public function delete() {
        if (!empty($_POST)) {
            $result = $this->User->delete($_POST['id']);
            header('Location: index.php?p=admin.users.index');
        }

    }


}
