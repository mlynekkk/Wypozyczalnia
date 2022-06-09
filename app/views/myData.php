<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/myData.css" />

</head>
<?php
include "header.php";
?>

<div class="back">
        <a class="back" href="<?php echo URLROOT . "/profileCustomer" ?>">
            <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
            <h1 class="getBack">Powrót</h1>
        </a>
    </div>

<div class="DaneOsobowe">
    <h2>Moje dane</h2>
    <div class="dane">
        <div class="box">
            <div class="kategoria">Login</div>
            <div class="opis"><?php echo $user->login; ?></div>
        </div>
        <div class="box">
            <div class="kategoria">Imię</div>
            <div class="opis"><?php if($user->imie)echo $user->imie; else echo "---"; ?></div>
        </div>
        <div class="box">
            <div class="kategoria">Nazwisko</div>
            <div class="opis"><?php if($user->nazwisko)echo $user->nazwisko; else echo "---"; ?></div>
        </div>
        <div class="box">
            <div class="kategoria">E-mail</div>
            <div class="opis"><?php echo $user->email; ?></div>
        </div>
        <div class="box">
            <div class="kategoria">Numer telefonu</div>
            <div class="opis"><?php if($user->number)echo $user->number; else echo "---"; ?></div>
        </div>
        
        <?php echo '<a href="'.URLROOT .'/editMyData?id_klient='.$user->id_klient.'"> <button>Edytuj dane</button></a>'; ?>
        <?php echo '<a href="'.URLROOT .'/editMyHaslo?id_klient='.$user->id_klient.'"> <button>Zmień hasło </button></a>'; ?>
        
    </div>
</div>