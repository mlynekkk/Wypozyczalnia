<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/tabVinyls.css" />

</head>
<?php
include "header.php";

?>

<div class="main">
    <div class="back">
        <a class="back" href="<?php echo URLROOT . "/profileAdmin" ?>">
            <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
            <h1 class="getBack">Powrót</h1>
        </a>
    </div>

    <main>
        <?php if (count($customers) > 0) : ?>



            <table>
                <tr>
                    <th> <a href="?sortType=id_klient">Id Klient</a></th>
                    <th><a href="?sortType=login">Login</a></th>
                    <th><a href="?sortType=email">Email</a></th>
                </tr>
                <?php

                foreach ($customers as $customer) {
                    echo "<tr id=\"customer-" . $customer->id_klient . "\">";
                    echo "<td>" . $customer->id_klient . "</td>";
                    echo "<td>" . $customer->login . "</td>";
                    echo "<td>" . $customer->email . "</td>";
                    if(isset($_SESSION['admin'])){
                    echo '<td>
                    <a href="' . URLROOT . '/editCustomer?id_klient=' . $customer->id_klient . '"> Edytuj </a>
                    /
                    <a href="' . URLROOT . '/tabCustomers/deleteCustomer/' . $customer->id_klient . '"> Usuń </a>
                    </td>';}
                    echo "</tr>";
                } ?>
            </table>

        <?php endif; ?>
    </main>
</div>