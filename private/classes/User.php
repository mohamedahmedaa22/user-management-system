<?php

namespace Classes;

use Classes\ARDatabase;

class User extends ARDatabase {

    protected $id;
    protected $name; // required to register
    protected $email; // required to register
    protected $password; // required to register
    protected $phone;
    protected $gender;
    protected $dob;
    protected $photo;
    protected $token;
    protected $token_expire;
    protected $created_at;
    protected $verified;
    protected $deleted;
    protected $table = 'users';
    protected $alog = PASSWORD_BCRYPT;
    protected $hashed_password;

    
    protected function setArgs(array $args = []) {
        foreach ($args as $property => $value) {
            $this->$property = $this->sanitizeRecord($value);
        } 
    }
    
    public function createUser(array $args = []) {
        $this->setArgs($args);
        if (!$this->user_exists($this->email)) {
            $this->insertRecord($this->table, [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->hash_password($this->password),
                'created_at' => $this->created_at
            ]);
            return [
                'status' => true,
                'user' => $this->email
            ];
        } else {
            return [
                'status' => false,
                'action' => 'Email Already Exists',
                'message' => $this->email." is already a user, please try to login instead or if you forgot your password try to recover it from reset password!"
            ];
        }
    }

    public function user_exists($email) {
        return $this->getRecords($this->table, ['email'], ['email' => $email]);
    }

    protected function hash_password($password) {
        $this->hashed_password = password_hash($password, $this->alog);
        return $this->hashed_password;
    }
}