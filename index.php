<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'private' . DIRECTORY_SEPARATOR . 'initial.php';

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
    require_once(PAGES_PATH . 'home.php');
}