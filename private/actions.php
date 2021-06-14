<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'initial.php';

use Classes\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // register request
    if ($_POST['action'] == 'register') {
        $user = new User($connection);
        $register = $user->createUser([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if ($register['status']) {
            $_SESSION['email'] = $register['user'];
            $_SESSION['isLoggedIn'] = true;
        }

        echo json_encode($register);
    }
}