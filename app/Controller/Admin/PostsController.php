<?php


namespace App\Controller\Admin;
use \DateTime;
use \DateTimeZone;
use Core\HTML\BootstrapForm;
use Core\HTML\Upload;

/**
 * Class PostsController
 * @package App\Controller\Admin
 */
class PostsController extends AppController {

    /**
     * PostsController constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('PostsImage');
    }

    /**
     * Display all Posts on main admin page
     *@uses \App\Table\PostTable
     */
    public function index() {
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    /**
     * Let the admin to add a new Post
     * @uses DateTime
     * @uses \Core\HTML\BootstrapForm
     * @uses \Core\HTML\Upload
     * @uses \App\Table\PostsImageTable
     * @return string|void
     * @throws \Exception
     */
    public function add() {

        $date = new DateTime(null, new DateTimeZone('Europe/Paris'));
        $form = new BootstrapForm($_POST);
        $upload = new Upload();
        $images = $this->PostsImage->extract('id','name');

        if (!empty($_POST)) {

            if (!empty($_FILES)) {

                if ($_FILES['image']['error'] === 4) {

                    if (!empty($_POST['image_slct'])) {

                        $resultPost = $this->Post->create([
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content'],
                            'date'          => $date->format('Y-m-d'),
                            'image_id'      => $_POST['image_slct']
                        ]);

                        if ($resultPost) {
                            return $this->index();
                        }

                    } else {

                        $resultPost = $this->Post->create([
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content'],
                            'date'          => $date->format('Y-m-d')
                        ]);

                        if ($resultPost) {
                            return $this->index();
                        }

                    }

                } elseif ($_FILES['image']['error'] === 0) {

                    $start = $upload->startUpload();

                    if ($upload->uploadOk === false) {

                        $this->render('admin.posts.edit', compact( 'form', 'images', 'start'));
                        return $start;

                    } elseif ($upload->uploadOk === true) {

                        $resultImage = $this->PostsImage->create([
                            'name'     => $_FILES['image']['name']
                        ]);

                        $imageId = $this->PostsImage->findByName($_FILES['image']['name']);

                        $resultPost = $this->Post->create([
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content'],
                            'date'          => $date->format('Y-m-d H:i:s'),
                            'image_id'      => $imageId->id
                        ]);

                        if ($resultImage && $resultPost) {
                            return $this->index();
                        }

                    }
                }
            }
        }

        $this->render('admin.posts.edit', compact( 'form', 'images'));
    }

    /**
     * Let the admin to edit an existing post
     * @uses \App\Table\PostTable
     * @uses \App\Table\PostsImageTable
     * @uses \Core\HTML\BootstrapForm
     * @uses \Core\HTML\Upload
     * @return string|void
     */
    public function edit() {

        $post = $this->Post->find($_GET['id']);
        $images = $this->PostsImage->extract('id','name');
        $form = new BootstrapForm($post);
        $upload = new Upload();
        $postImage = $this->PostsImage->find($post->image_id);

        if (!empty($_POST)) {

            if (!empty($_FILES)) {

                if ($_FILES['image']['error'] === 4) {

                    if (!empty($_POST['image_id'])) {

                        $resultPost = $this->Post->update($_GET['id'], [
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content'],
                            'image_id'      => $_POST['image_id']
                        ]);

                        if ($resultPost) {
                            return $this->index();
                        }

                    } else {

                        $resultPost = $this->Post->update($_GET['id'], [
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content']
                        ]);

                        if ($resultPost) {
                            return $this->index();
                        }

                    }

                } elseif ($_FILES['image']['error'] === 0) {

                    $start = $upload->startUpload();

                    if ($upload->uploadOk === false) {

                        $this->render('admin.posts.edit', compact( 'post','form', 'postImage', 'images','start'));
                        return $start;

                    } elseif ($upload->uploadOk === true) {

                        $resultImage = $this->PostsImage->create([
                            'name'     => $_FILES['image']['name']
                        ]);

                        $imageId = $this->PostsImage->findByName($_FILES['image']['name']);

                        $resultPost = $this->Post->update($_GET['id'], [
                            'title'         => $_POST['title'],
                            'content'       => $_POST['content'],
                            'image_id'      => $imageId->id
                        ]);

                        if ($resultImage && $resultPost) {
                            return $this->index();
                        }

                    }
                }
            }

        }

        $this->render('admin.posts.edit', compact( 'post','form', 'postImage', 'images'));

    }

    /**
     * Let the admin to delete a post
     * @uses \App\Table\PostTable
     */
    public function delete() {

        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            header('Location: index.php?p=admin.posts.index');
        }

    }

}
