<link rel="stylesheet" href="<?php echo URLROOT;?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/authorization.css" />

</head>
<?php
    include "header.php";
?>
<main>
<div class="loginArea">
<h2>DLA KLENTÓW</h2>
<form class ="login" action="<?php echo URLROOT."/login/tryToLoginKlient"?>" method="post">

        <input type="email" <?php if(isset($_SESSION['errorEmptyLogin'])||isset($_SESSION['errorBadAuthorize']))echo "class='error'";?> id="email" name="email" placeholder="E-mail"><br>
        <input type="password" <?php if(isset($_SESSION['errorEmptyLogin'])||isset($_SESSION['errorBadAuthorize']))echo "class='error'";?> id="haslo" name="haslo" placeholder="Hasło"><br>
        <input type="submit" value="Zaloguj">
</form>
<?php
    if (isset($_SESSION['errorEmptyLogin']))echo $_SESSION['errorEmptyLogin'];
    if (isset($_SESSION['errorBadAuthorize']))echo $_SESSION['errorBadAuthorize'];
    ?>
    <div class="seperator"></div>
    Jeśli nie masz jeszcze założonego konta<br>
    <a href="<?php echo URLROOT."/register"?>">kliknij tutaj</a>
   
</div>

<div class="loginAreaAdmin">
<h2>DLA PRACOWNIKÓW</h2>
<form class ="login" action="<?php echo URLROOT."/login/tryToLoginPracownik"?>" method="post">

        <input type="text" <?php if(isset($_SESSION['errorEmptyLogin'])||isset($_SESSION['errorBadAuthorize']))echo "class='login'";?> id="login" name="login" placeholder="Login"><br>
        <input type="password" <?php if(isset($_SESSION['errorEmptyLogin'])||isset($_SESSION['errorBadAuthorize']))echo "class='error'";?> id="haslo" name="haslo" placeholder="Hasło"><br>
        <input type="submit" value="Zaloguj">
</form>
<?php
    if (isset($_SESSION['perrorEmptyLogin']))echo $_SESSION['perrorEmptyLogin'];
    if (isset($_SESSION['perrorBadAuthorize']))echo $_SESSION['perrorBadAuthorize'];
    ?>
</div>
</main>