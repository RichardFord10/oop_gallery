<?php require_once("includes/init.php") ?>

<?php $session->logout($user);
redirect("login.php");
?>

