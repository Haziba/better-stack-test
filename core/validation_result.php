<?php

class ValidationResult {
    protected $valid;
    protected $errors;

    function __construct($valid, $errors = array()) {
        $this->valid = $valid;
        $this->errors = $errors;
    }

    public static function Valid() {
        return new self(true);
    }

    public static function Invalid(array $errors) {
        return new self(false, $errors);
    }

    public function isValid() {
        return $this->valid;
    }

    public function getErrors() {
        return $this->errors;
    }
}
