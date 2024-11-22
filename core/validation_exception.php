<?php

class ValidationException extends Exception {
    protected $validationResult;
    protected $errors;

    public function __construct(array $errors) {
        $this->errors = $errors;
    }

    public function getErrors() {
        return $this->errors;
    }
}