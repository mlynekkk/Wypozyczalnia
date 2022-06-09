<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addVinyl.css" />

</head>
<?php
include "header.php";

?>

<form action="<?php echo URLROOT . "/editMyData/EditMyData/" . $_GET['id_klient'] . "" ?>" method="post">
    <div class="back">
        <a class="back" href="<?php echo URLROOT . "/myData" ?>">
            <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
            <h1 class="getBack">Powrót</h1>
        </a>
    </div>



    <div class="flex-column">
        <h2>Moje dane</h2>
        <div class="dane">
            <label for="login"><b>Login</b></label>
            <input type="text" maxlength="30" id="login" required name="login" value="<?php if ($user) {
                                                                            echo $user->login;
                                                                        } ?>" placeholder="Login">
            <label for="imie"><b>Imie</b></label>
            <input type="text" maxlength="30" id="imie" required name="imie" value="<?php if ($user) {
                                                                            echo $user->imie;
                                                                        } ?>" placeholder="Imie">
             <label for="nazwisko"><b>Nazwisko</b></label>
            <input type="text" maxlength="30" id="nazwisko" required name="nazwisko" value="<?php if ($user) {
                                                                            echo $user->nazwisko;
                                                                        } ?>" placeholder="Nazwisko">
             <label for="number"><b>Numer Telefonu</b></label>
            <input type="text" maxlength="12" id="number" required name="number" value="<?php if ($user) {
                                                                            echo $user->number;
                                                                        } ?>" placeholder="Numer telefonu">

        </div>
    </div>

    <input type="submit" value="Zapisz">
    <?php
    if (isset($blad))
        echo "Uzupelnij wszytskie pola";
    ?>

</form>