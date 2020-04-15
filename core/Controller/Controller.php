<?php

namespace Core\Controller;

/**
 * Class Controller
 * @package Core\Controller
 */
class Controller {

    protected $viewPath;
    protected $template;

    /**
     * Render the view
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
     * Manage Forbidden access with 403 code
     */
    protected function forbidden() {
        header('HTTP/1.0 403 Forbidden');
        die('Acces Interdit !');
    }

    /**
     * Manage NotFound with 404 code
     */
    protected function notFound() {
        header('HTTP/1.0 404 Not Found');
        die('Page Introuvable');
    }
}
