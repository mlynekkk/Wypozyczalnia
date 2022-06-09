<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/index.css" />

</head>

<?php
include "header.php";

?>

<div class='banner'>
<h1>WYPOŻYCZALNIA</h1>
<h2>PŁYT WINYLOWYCH</h2>
<h1>ELVIS</h1>

</div>




<div class='grid'>
    <?php
     if (count($plyty) > 0) {

    foreach ($plyty as $plyta) {

        echo
        "
    <a class='plyta' href='" . URLROOT . "/vinyl?id_plyta=" . $plyta->id_plyta . "'>

    <img src='data:image/png;base64," . base64_encode($plyta->image) . "'>

     <div class='opis'>
        <span style='font-size:x-large;'>" . $plyta->tytul . "</span>
        <span style='font-size: large;'>Cena: " . $plyta->cena . "</span>
    </div>
    </a>";
    }

}?>
</div>
<?php if(count($plyty) == 0){
    echo "<h3 class='brak'>Brak płyt na stanie</h3>";
}?>