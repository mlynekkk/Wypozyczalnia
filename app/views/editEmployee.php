<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addVinyl.css" />

</head>
<?php
include "header.php";

?>

<form action="<?php echo URLROOT . "/editEmployee/EditEmployee/" . $_GET['id_pracownik'] . "" ?>" method="post">
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
            <input type="text" maxlength="30" id="login" required name="login" value="<?php if ($employee) {
                                                                            echo $employee->login;
                                                                        } ?>" placeholder="Login">
            <label for="haslo"><b>Nowe hasło</b></label>
            <input type="password" maxlength="30" id="haslo" name="haslo" placeholder="Hasło">

        </div>
    </div>

    <input type="submit" value="Zapisz">
    <?php
    if (isset($blad))
        echo "Uzupelnij wszytskie pola";
    ?>
<?php if(isset($_SESSION['errorTakenEdit'])){ echo $_SESSION['errorTakenEdit'];}?>
</form>