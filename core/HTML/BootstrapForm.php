<?php

namespace Core\HTML;

class BootstrapForm extends Form {

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html) {
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [], $require = false) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $req = $require ? 'required' : '';
        $label = '<label>' . $label . '</label>';
        if($type === 'textarea') {
            $input = '<textarea id="editor1" name="' . $name . '" class="form-control" '.$req.'>'. $this->getValue($name) .'</textarea>';
        } elseif($type === 'file') {
            $input = '<input type="' . $type . '" name="' . $name . '" class="form-control">';
        } elseif($type === 'message') {
            $input = '<textarea id="'. $name .'" name="' . $name . '" class="form-control"></textarea>';
        } elseif($type === 'password') {
            $input = '<input type="' . $type . '" name="' . $name . '" class="form-control" '.$req.'>';
        } else {
            $input = '<input id="'. $name .'" type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control" '.$req.'>';
        }

        return $this->surround($label . $input);
    }

    public function select($name, $label, $options = []) {
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        $input .= "<option value='0'>$label</option>";
        foreach($options as $k => $v) {
            $attributes = '';
            if($k == $this->getValue($name)) {
                $attributes = ' selected';
            }
            $input .= "<option value='$k' $attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
        var_dump($k);
        die();
    }



    /**
     * @return string
     */
    public function submit($name) {
        return $this->surround('<button type="submit" class="btn btn-primary">'. $name .'</button>');
    }
}
