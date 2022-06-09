<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/tabVinyls.css" />

</head>
<?php
include "header.php";
?>

<table>
    <tr>
        <th> <?php echo "<img src='data:image/png;base64," . base64_encode($plyta->image) . "'>"; ?></th>
        <th><?php echo  '<h4>' . $plyta->tytul . '</h4><h5>' . $plyta->wykonawca . '</h5>'; ?></th>
    </tr>
    <tr>
        <td> <a href="<?php echo URLROOT . "/vinyl?id_plyta=" . $plyta->id_plyta . ""; ?>">Zrezygnuj z zamówienia</a> </td>
        <td>
            <form action="<?php echo URLROOT . "/order/OrderRealize?plyta=".$_POST['plyta'].""; ?>" method="POST">
                <input type="submit" value="Wyślij zamówienie">
            </form>
        </td>
    </tr>

</table>