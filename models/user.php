<?php

/**
 * User model
 */
class User extends BaseModel{
	
	// Define neccessary constansts so we know from which table to load data
	const tableName = 'users';
	// ClassName constant is important for find and findOne static functions to work
	const className = 'User';
	
	// Create getter functions
	
	public function getName() {
		return $this->getField('name');
	}
	
	public function getEmail() {
		return $this->getField('email');
	}
	
	public function getCity() {
		return $this->getField('city');
	}

	protected function validate() {
		$errors = [];

		$name = $this->getField('name');
		if (empty($name)) {
			$errors[] = "Name is required";
		}

		$email = $this->getField('email');
		if (empty($email)) {
			$errors[] = "Email is required";
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Email is not valid";
		}

		$city = $this->getField('city');
		if (empty($city)) {
			$errors[] = "City is required";
		}

		if (!empty($errors)) {
			return ValidationResult::Invalid($errors);
		}

		return ValidationResult::Valid();
	}
	
}