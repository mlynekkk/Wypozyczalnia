<link rel="stylesheet" href="<?php echo URLROOT;?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/authorization.css" />

</head>
<?php
    include "header.php";
?>


<body>    
    
<div class="registerArea">
    
<h2>
        REJESTRACJA KLIENTA
    </h2>
    
    <form class ="register" action="<?php echo URLROOT."/register/registerKlient"?>" method="post">
        <input type="email" maxlength="30" <?php if(isset($_SESSION['errorEmptyRegister'])||isset($_SESSION['errorTakenRegister']))echo "class='error'";?> id="email" name="email" placeholder="E-mail" required><br>
        <input type="text" maxlength="30" <?php if(isset($_SESSION['errorEmptyRegister'])||isset($_SESSION['errorTakenRegister']))echo "class='error'";?> id="login" name="login" placeholder="Login" required><br>
        <input type="password" maxlength="30" <?php if(isset($_SESSION['errorEmptyRegister'])||isset($_SESSION['errorTakenRegister']))echo "class='error'";?> id="haslo" name="haslo" placeholder="Hasło" required><br>
        <input type="password" maxlength="30" <?php if(isset($_SESSION['errorEmptyRegister'])||isset($_SESSION['errorTakenRegister']))echo "class='error'";?> id="confirmPassword" name="confirmPassword" placeholder="Powtórz hasło" required><br>
        <input type="submit" value="Zarejestruj">
    </form>
    <?php
    if (isset($_SESSION['errorEmptyRegister']))echo $_SESSION['errorEmptyRegister'];
    if (isset($_SESSION['errorTakenRegister']))echo $_SESSION['errorTakenRegister'];
    ?>
<div class="seperator"></div>
    Jeśli masz już założone konto<br>
    <a href="<?php echo URLROOT."/login"?>">kliknij tutaj</a>

    </div>
</body>