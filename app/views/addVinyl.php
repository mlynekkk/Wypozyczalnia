<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addVinyl.css" />

</head>
<?php
include "header.php";

?>

<form action="<?php echo URLROOT . "/addVinyl/AddVinyl" ?>" method="post" enctype="multipart/form-data">
    <div class="back">
        <a class="back" href="<?php echo URLROOT . "/profileAdmin" ?>">
            <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
            <h1 class="getBack">Powrót</h1>
        </a>
    </div>



    <div class="flex-column">
        <h2>Dane płyty</h2>
        <div class="dane">
            <label for="tytul"><b>Tytuł</b></label>
            <input type="text" maxlength="50" id="tytul" required name="tytul">
            <label for="wykonawca"><b>Wykonawca</b></label>
            <input type="text" maxlength="50" id="wykonawca" required name="wykonawca">
            <label for="wytwornia" maxlength="100" ><b>Wytwórnia</b></label>
            <input type="text" maxlength="50" id="wytwornia" required name="wytwornia">
            <label for="kategoria"><b>Kategoria</b></label>
            <select name="kategoria" id="kategoria" required>
            <?php foreach($kategorie as $kategoria){ ?>
                <option value='<?php echo "$kategoria->id_kategoria"; ?>'> <?php echo $kategoria->nazwa ;?> </option>
                <?php } ?>
            </select>
            <label for="cena"><b>Cena</b></label>
            <input type="number" id="cena" required name="cena" min="1" max="1000" maxlength="4">
            <label for="img"><b>Zdjęcie</b></label>
            <input type='file' id='img' name='img' accept='mage/x-png,image/gif,image/jpeg'>
            <label for="opis"><b>Opis</b></label>
            <textarea id="opis" maxlength="250" required name="opis" placeholder="Opis" rows="5" cols="33"></textarea>

        </div>
        <div class="button">
            <input type="submit" value="Zapisz">
            <?php
            if (isset($blad))
                echo "Uzupelnij wszytskie pola";
            ?>
        </div>
    </div>



</form>