<?php

namespace Core\HTML;

/**
 * Class Form
 * Allow to generate a form quickly and easily
 */

class Form {

    /**
     * @var array Data used by the form
     */
    private $data;

    /**
     * @var string Tag used to surround the fields
     */
    public $surround = 'p';

    /**
     * @param array $data Data used by the form
     */
    public function __construct($data = array()) {
        $this->data = $data;
    }


    /**
     * @param $html string HTML code to surround
     * @return string
     */
    protected function surround($html) {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
     * @param $index string Index of the value to recover
     * @return string
     */
    protected function getValue($index) {
        if(is_object($this->data)) {

            return $this->data->$index;
        }

        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * Create an input field
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<input type="' . $type . '" name"' . $name . '" value="' . $this->getValue($name) . '">'
        );
    }


    /**
     * Create a submit field
     * @return string
     */
    public function submit($name) {
        return $this->surround('<button type="submit">'. $name .'</button>');
    }


}
