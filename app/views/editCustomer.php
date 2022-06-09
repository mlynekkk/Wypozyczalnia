<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addVinyl.css" />

</head>
<?php
include "header.php";

?>

<form action="<?php echo URLROOT . "/editCustomer/editCustomer/" . $_GET['id_klient'] . "" ?>" method="post">
    <div class="back">
        <a class="back" href="<?php echo URLROOT . "/tabCustomers" ?>">
            <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
            <h1 class="getBack">Powrót</h1>
        </a>
    </div>



    <div class="flex-column">
        <h2>Dane Klienta</h2>
        <div class="dane">
            <label for="login"><b>Login</b></label>
            <input type="text" maxlength="30" id="login" required name="login" value="<?php if ($user) {
                                                                            echo $user->login;
                                                                        } ?>" placeholder="Login">
            <label for="email"><b>E-mail</b></label>
            <input type="text" maxlength="30" id="email" required name="email" value="<?php if ($user) {
                                                                            echo $user->email;
                                                                        } ?>" placeholder="Email">
            <label for="haslo"><b>Nowe hasło</b></label>
            <input type="password" maxlength="30" id="haslo" name="haslo" placeholder="Hasło">

        </div>
    </div>

    <input type="submit" value="Zapisz">
    <?php
    if (isset($blad))
        echo "Uzupelnij wszytskie pola";
    ?>

</form>