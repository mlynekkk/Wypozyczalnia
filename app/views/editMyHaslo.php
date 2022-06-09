<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addVinyl.css" />

</head>
<?php
include "header.php";

?>

<form action="<?php echo URLROOT . "/editMyHaslo/EditMyHaslo/" . $_GET['id_klient'] . "" ?>" method="post">
    <div class="back">
        <a class="back" href="<?php echo URLROOT . "/myData" ?>">
            <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
            <h1 class="getBack">Powrót</h1>
        </a>
    </div>



    <div class="flex-column">
        <h2>Zmiana hasła</h2>
        <div class="dane">
        <label for="haslo"><b>Obecne hasło</b></label>
            <input type="password" maxlength="30" id="haslo" name="haslo" placeholder="Obecne hasło">
            <label for="noweHaslo"><b>Nowe hasło</b></label>
            <input type="password" maxlength="30" id="noweHaslo" name="noweHaslo" placeholder="Nowe hasło">


        </div>
    </div>

    <input type="submit" value="Zapisz">
    <?php
    if (isset($blad))
        echo "Uzupelnij wszytskie pola";
    ?>

</form>