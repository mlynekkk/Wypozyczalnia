<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navBar.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/tabVinyls.css" />

</head>
<?php
include "header.php";

?>

<div class="main">
    <div class="back">
            <a class="back" href="<?php echo URLROOT. "/profileCustomer" ?>">
                <img src="<?php echo URLROOT; ?>/assets/images/arrowleft.svg">
                <h1 class="getBack">Powrót</h1>
            </a>
        </div>

    <main>
        <?php if(count($orders)>0):?>

            
            
    <table>
            <tr>
                
                <th><a href="?sortType=id_plyta">Płyta</a></th>
                <th><a href="?sortType=id_plyta">Tytuł</a></th>
                <th><a href="?sortType=data_wypozyczenia">Data Wypożyczenia</a></th>
                <th><a href="?sortType=data_oddania">Termin Oddania</a></th>
                <th><a href="?sortType=data_oddania">Data Oddania</a></th>
                <th>Status</th>
            </tr>
            <?php 

            foreach ($orders as $order){
                echo "<tr id=\"order-".$order->id_wypozyczenie."\">";
                echo "<td><img src=data:image/png;base64," . base64_encode($order->image) . " width=100%></td>";
                echo "<td>".$order->tytul."</td>";   
                echo "<td>".$order->data_wypozyczenia."</td>"; 
                echo "<td>".$order->termin_oddania."</td>"; 
                echo "<td>".$order->data_oddania."</td>"; 
                echo "<td>"; if ($order->status==1) echo "Zwrócone";
                        if ($order->status==0) echo "Wypożyzone";
                 echo "</td>";
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

