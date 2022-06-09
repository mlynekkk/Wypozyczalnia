<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/vinyl.css" />

</head>

<body>


    <?php
    include "header.php";

    ?>

    <div class="main">
        <div class="back">
            <a class="back" href="<?php echo URLROOT ?>">
                <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
                <h1 class="getBack">Powrót</h1>
            </a>
        </div>
        <div class="plyta">
            <div class="img">
            <?php echo "<img src=data:image/png;base64," . base64_encode($plyta->image) . " >"?>
            </div>
            <div class="info">
                <div class="name"> <?php echo $plyta->tytul ?></div>
                <div class="opis"> <?php echo $plyta->opis ?></div>
                <div class="informacje">
                    <div class="flex2"> <h3>Tytuł: </h3><p><?php echo $plyta->tytul ?></p></div>
                    <div class="flex2"><h3>Wykonawca: </h3><p><?php echo $plyta->wykonawca ?></p></div>
                    <div class="flex2"><h3>Wytwórnia: </h3><p><?php echo $plyta->wytwornia ?></p></div>
                    <div class="flex2"><h3>Kategoria: </h3><p>
                        <?php
                    foreach ($kategorie as $kategoria){
                    if($kategoria->id_kategoria==$plyta->id_kategoria)
                    echo  $kategoria->nazwa ; 
                }?>
                    </p></div>
                </div>
                <div class=flex>
                    <div class="cena"><?php echo $plyta->cena ?> zł</div>
                    <div>
                        <?php if(isset($_SESSION['userData'])){?>
                    <form action="<?php echo URLROOT. "/order";?>" method="POST">
                    <input type="hidden" name="plyta" value="<?php echo $_GET['id_plyta']; ?>">
                    <input type="submit" value="Zamów">
                    </form>
                    <?php }
                    elseif(!isset($_SESSION['pracownikData'])) {?>
                    Aby zamówić płytę <a href='<?php echo URLROOT ?> /login' style='font-weight: bold; margin-right: 20px;'>ZALOGUJ SIĘ</a>
                    <?php } ?>
                    </div>
                </div>
                

            </div>


        </div>

    </div>





</body>