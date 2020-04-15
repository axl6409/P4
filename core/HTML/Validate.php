<?php

namespace Core\HTML;

class Validate {

    public $errors = [];

    public function validate($data, $rules) {

        $valid = true;

        foreach ($rules as $fieldname => $rule) {
            $callbacks = explode('|', $rule);

            foreach ($callbacks as $callback) {
                $value = isset($data[$fieldname]) ? $data[$fieldname] : null;
                if ($this->$callback($value, $fieldname) == false) $valid = false;
            }
        }

        return $valid;

    }

    public function email($value, $fieldname) {
        $valid = filter_var($value, FILTER_VALIDATE_EMAIL)
    }

}
