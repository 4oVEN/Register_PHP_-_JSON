<?php 
class RegisterUser{
	// Class properties
	private $username; // имя
	private $name; // login
	private $email; // email
	private $raw_password; //пароль
	private $password_confirm; // проверка пароля
	private $encrypted_password; //хишированый пароль
	public $error; // ошибка
	public $success; // успех
	private $storage = "data.json"; // хранилище
	private $stored_users; // все пользователи
	private $new_user; // array 


	public function __construct($name, $password, $password_confirm, $email, $username){

		$this->username = trim($this->username);
		$this->username = filter_var($username, FILTER_SANITIZE_STRING);

		$this->name = trim($this->name);
		$this->name = filter_var($name, FILTER_SANITIZE_STRING);

		$this->email= trim($this->email);
		$this->email = filter_var($email, FILTER_SANITIZE_STRING);

		$this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
		$this->password_confirm = filter_var(trim($password), FILTER_SANITIZE_STRING);
		$this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);
		$this->encrypted_password = password_hash($this->password_confirm, PASSWORD_DEFAULT);

		$this->stored_users = json_decode(file_get_contents($this->storage), true);

		$this->new_user = [
			"name" => $this->name,
			"password" => $this->encrypted_password,
			"password_confirm" => $this->encrypted_password,
			"email" => $this->email,
			"username" => $this->username,
		];

		if($this->checkFieldValues()){
			$this->insertUser();
		}
	}


	private function checkFieldValues(){
		if(empty($this->username) || empty($this->raw_password)){
			$this->error = "Fields are required.";
			return false;
		}else{
			return true;
		}
	}


	private function usernameExists(){
		foreach($this->stored_users as $user){
			if($this->username == $user['username']){
				$this->error = "Username already taken, please choose a different one.";
				return true;
			}
		}
		return false;
	}


	private function insertUser(){
		if($this->usernameExists() == FALSE){
			array_push($this->stored_users, $this->new_user);
			if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
				return $this->success = "Your registration was successful";
			}else{
				return $this->error = "Something went wrong, please try again";
			}
		}
	}



} // end of class