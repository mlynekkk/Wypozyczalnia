<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/tabVinyls.css" />

</head>
<?php
include "header.php";
?>

<div class="main">
    <div class="back">
            <a class="back" href="<?php echo URLROOT. "/profileAdmin" ?>">
                <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
                <h1 class="getBack">Powrót</h1>
            </a>
        </div>

    <main>
        <?php if(count($orders)>0):?>

            
            
    <table>
            <tr>
                <th> <a href="?sortType=id_wypozyczenie">Id Wypożyczenie</a></th> 
                <th><a href="?sortType=id_klient">Id Klient</a></th>
                <th><a href="?sortType=id_plyta">Id Płyta</a></th>
                <th><a href="?sortType=data_wypozyczenia">Data Wypożyczenia</a></th>
                <th><a href="?sortType=data_oddania">Termin Oddania</a></th>
                <th><a href="?sortType=data_oddania">Data Oddania</a></th>
                <th>Status</th>
            </tr>
            <?php 

            foreach ($orders as $order){
                echo "<tr id=\"order-".$order->id_wypozyczenie."\">";
                echo "<td>".$order->id_wypozyczenie."</td>";
                echo "<td>".$order->id_klient."</td>";
                echo "<td>".$order->id_plyta."</td>";  
                echo "<td>".$order->data_wypozyczenia."</td>"; 
                echo "<td>".$order->termin_oddania."</td>"; 
                echo "<td>".$order->data_oddania."</td>"; 
                echo "<td>
                <form id='".$order->id_wypozyczenie."' method='post' action='".URLROOT."/tabOrders/updateStatusOrder'>
                    <select name='status' onchange='change".$order->id_wypozyczenie."()'>
                        <option value='1'";
                        if ($order->status==1) echo "selected";
                        echo ">Zwrócone</option>
                        <option value='0'";
                        if ($order->status==0) echo "selected";
                        echo ">Wypożyczone</option>
                    </select></td>
                    <input type='hidden' name='id_plyta' value='".$order->id_plyta."'>
                    <input type='hidden' name='id_wypozyczenie' value='".$order->id_wypozyczenie."'>
                    </form>";
                     if(isset($_SESSION['admin'])){
                echo '<td><a href="'.URLROOT .'/tabOrders/DeleteOrder/'.$order->id_wypozyczenie .'/'.$order->id_plyta.'"> Usuń </a></td>';
                     }
            echo "</tr>";
            echo "<script>
            function change".$order->id_wypozyczenie."(){
                document.getElementById('".$order->id_wypozyczenie."').submit();
            }
            </script>";
            }
            
            ?>
            
        

    </table> 
    
    

        <?php endif;?>
    </main>
</div>

