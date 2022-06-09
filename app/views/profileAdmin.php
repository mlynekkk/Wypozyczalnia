<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile.css" />

</head>

<body>


    <?php
    include "header.php";

    ?>


    <div class="back">
        <a class="back" href="<?php echo URLROOT ?>">
            <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
            <h1 class="getBack">Powrót</h1>
        </a>
    </div>

    <section class="boxed">

        <ul>
            <li><a href="<?php echo URLROOT . "/tabOrders" ?>">Wypożyczenia</a></li>
            <li><a href="<?php echo URLROOT . "/tabVinyls" ?>">Płyty</a></li>
            <?php  if(isset($_SESSION['admin'])){?>
            <li><a href="<?php echo URLROOT . "/addVinyl" ?>">Dodaj płytę</a></li>
            <?php }?>
            <li><a href="<?php echo URLROOT . "/tabCustomers" ?>">Klienci</a> </li>
            <li><a href="<?php echo URLROOT . "/tabEmployees" ?>">Pracownicy</a> </li>
            <?php  if(isset($_SESSION['admin'])){?>
            <li><a href="<?php echo URLROOT . "/addEmployee" ?>">Dodaj pracownika</a> </li>
            <li><a href="<?php echo URLROOT . "/addKategoria" ?>">Dodaj kategorie</a> </li>
            <?php }?>
        </ul>




    </section>


</body>