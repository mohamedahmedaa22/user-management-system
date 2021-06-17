<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'private' . DIRECTORY_SEPARATOR . 'initial.php';

if (isset($_POST['logout'])) {
    session_destroy();
}

if (!isset($_SESSION) || !$_SESSION['isLoggedIn']) {
    header('Location: /pages/auth/login.php');
}

?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
    <input type="submit" name="logout" value="Logout">
</form>