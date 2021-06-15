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

    public function userLogin(array $args = []) {
        if (!empty($args)) {
            // assign the args to properties
            $this->setArgs($args);
            
            // find user in database
            $user = $this->getRecords($this->table, ['email', 'password'], [
                'email' => $args['email'],
                'deleted' => 0
            ]);
            
            // didn't found the user
            if (!$user) {
                return [
                    'status' => false,
                    'message' => 'Wrong Credintials!'
                ];
                exit;
            }

            // get first user found
            $user = $user[0];

            // check if password is correct
            if (password_verify($this->password, $user['password'])) {
                // check if remember me is checked
                if (isset($_POST['remember'])) {
                    setcookie('email', $this->email, time() + (30 * 24 * 60 * 60), '/');
                    setcookie('password', $this->password, time() + (30 * 24 * 60 * 60), '/');
                } else {
                    setcookie('email', '', time() - (30 * 24 * 60 * 60));
                    setcookie('password', '', time() - (30 * 24 * 60 * 60));
                }

                return [
                    'status' => true,
                    'action' => 'login',
                    'email' => $this->email
                ];
                exit;
            } else {
                return [
                    'status' => false,
                    'message' => 'Wrong Credintials!'
                ];
                exit;
            }
        }
    }
}