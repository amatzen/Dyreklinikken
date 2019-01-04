<?php
session_name('_sid');
session_start();

if($_POST['submit']){
    $_SESSION['LoggedIn'] = 1;
    $_SESSION['user'] = $_POST['brugernavn'];
}
?>

<?php
if($_SESSION['LoggedIn']):
?>
<h1>Hej <?= $_SESSION['user'] ?></h1>
<?php
else:
?>
<form action="test.php" method="post">
    <input type="text" name="brugernavn" id="brugernavn" placeholder="Brugernavn">
    <input type="hidden" name="submit" value="1">
    <input type="submit" value="Log ind">
</form>
<?php
endif;
?>
