<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addVinyl.css" />

</head>
<?php
include "header.php";

?>

<form action="<?php echo URLROOT . "/editVinyl/EditVinyl/" . $_GET['id_plyta'] . "" ?>" method="post" enctype="multipart/form-data">
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
            <input type="text" maxlength="50" id="tytul" required name="tytul" value="<?php if ($plyta) {
                                                                            echo $plyta->tytul;
                                                                        } ?>" placeholder="Tytul">
            <label for="wykonawca"><b>Wykonawca</b></label>
            <input type="text" maxlength="50" id="wykonawca" required name="wykonawca" value="<?php if ($plyta) {
                                                                                    echo $plyta->wykonawca;
                                                                                } ?>" placeholder="Wykonawca">
            <label for="wytwornia"><b>Wytwórnia</b></label>
            <input type="text" maxlength="30" id="wytwornia" required name="wytwornia" value="<?php if ($plyta) {
                                                                                    echo $plyta->wytwornia;
                                                                                } ?>" placeholder="Wytwórnia">
            <label for="kategoria"><b>Kategoria</b></label>
            <select name="kategoria" id="kategoria" required>
            <?php foreach($kategorie as $kategoria){ ?>
                <option value='<?php echo $kategoria->id_kategoria ;?> '<?php if ($plyta->id_kategoria == $kategoria->id_kategoria) echo "selected"; ?>> <?php echo $kategoria->nazwa ;?> </option>
                <?php } ?>
                
            </select>
            <label for="cena"><b>Cena</b></label>
            <input type="number" id="cena" required name="cena" min="1" max="1000" value="<?php if ($plyta) {
                                                                                    echo $plyta->cena;
                                                                                } ?>" placeholder="Cena">
            <label for="img"><b>Zdjęcie</b></label>
            <input type='file' id='img' name='img' accept='mage/x-png,image/gif,image/jpeg'>
            <label for="opis"><b>Opis</b></label>
            <textarea id="opis" maxlength="250" required name="opis" placeholder="Opis" rows="5" cols="33"><?php if ($plyta) {
                                                                                                echo $plyta->opis;
                                                                                            } ?></textarea>

        </div>
    </div>

    <input type="submit" value="Zapisz">
    <?php
    if (isset($blad))
        echo "Uzupelnij wszytskie pola";
    ?>

</form>