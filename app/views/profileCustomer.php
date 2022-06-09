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
            <li><a href="<?php echo URLROOT . "/tabMyOrders" ?>">Moje Wypożyczenia</a></li>
            <li><a href="<?php echo URLROOT . "/myData" ?>">Moje dane</a></li>
        </ul>




    </section>


</body>