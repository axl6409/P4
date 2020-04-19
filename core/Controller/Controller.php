<?php

namespace Core\Controller;

/**
 * Class Controller
 * @package Core\Controller
 */
class Controller {

    /**
     * The path for the view to render
     * @var string
     */
    protected $viewPath;
    /**
     * The path to the template to render
     * @var string
     */
    protected $template;

    /**
     * Render the view with the template & takes variables in params
     * @param $view
     * @param array $variables
     */
    protected function render($view, $variables = []) {
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }


    /**
     * Forbidden Access, return 403 code
     */
    protected function forbidden() {
        header('HTTP/1.0 403 Forbidden');
        die('Acces Interdit !');
    }

    /**
     * NotFound, retrun 404 code
     */
    protected function notFound() {
        header('HTTP/1.0 404 Not Found');
        die('Page Introuvable');
    }
}
