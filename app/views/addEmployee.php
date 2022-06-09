<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addVinyl.css" />

</head>
<?php
include "header.php";

?>

<form action="<?php echo URLROOT . "/addEmployee/AddEmployee" ?>" method="post">
    <div class="back">
        <a class="back" href="<?php echo URLROOT . "/profileAdmin" ?>">
            <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
            <h1 class="getBack">Powrót</h1>
        </a>
    </div>



    <div class="flex-column">
        <h2>Dane pracownika</h2>
        <div class="dane">
            <label for="login"><b>Login</b></label>
            <input type="text" maxlength="30" id="login" required name="login" placeholder="Login">
            <label for="haslo"><b>Hasło</b></label>
            <input type="password" maxlength="30" id="haslo" required name="haslo" placeholder="Hasło">
        </div>
    </div>

    <input type="submit" value="Zapisz">
    <?php
    if (isset($blad))
        echo "Uzupelnij wszytskie pola";
    ?>

</form>

<?php if(isset($_SESSION['errorTakenRegister'])){ echo "<h3>".$_SESSION['errorTakenRegister']."</h3>";}?>