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
        <?php if(count($plyty)>0):?>

            
            
    <table>
            <tr>
                <th> <a href="?sortType=id_plyta">Id Płyty</a></th> 
                <th><a href="?sortType=tytul">Tytuł</a></th>
                <th><a href="?sortType=wykonawca">Wykonawca</a></th>
                <th><a href="?sortType=wytwornia">Wytwórnia</a></th>
                <th><a href="?sortType=kategoria">Kategoria</a></th>
                <th><a href="?sortType=cena">Cena</a></th>
                <th>Status</th>
            </tr>
            <?php 

            foreach ($plyty as $plyta){
                echo "<tr id=\"product-".$plyta->id_plyta."\">";
                echo "<td>".$plyta->id_plyta."</td>";
                echo "<td>".$plyta->tytul."</td>";
                echo "<td>".$plyta->wykonawca."</td>";  
                echo "<td>".$plyta->wytwornia."</td>"; 
                
                foreach ($kategorie as $kategoria){
                    if($kategoria->id_kategoria==$plyta->id_kategoria)
                    echo "<td>". $kategoria->nazwa ."</td>"; 
                }
                
                echo "<td>".$plyta->cena."</td>"; 
                echo "<td>
                <form id='".$plyta->id_plyta."' method='post' action='".URLROOT."/tabVinyls/updateStatus'>
                    <select name='status' onchange='change".$plyta->id_plyta."()'>
                        <option value='1'";
                        if ($plyta->status==1) echo "selected";
                        echo ">Dostępne</option>
                        <option value='0'";
                        if ($plyta->status==0) echo "selected";
                        echo ">Nie Dostępne</option>
                    </select></td>
                    <input type='hidden' name='id_plyta' value='".$plyta->id_plyta."'>
                    </form>";
                    if(isset($_SESSION['admin'])){
                echo '<td>
                <a href="'.URLROOT .'/editVinyl?id_plyta='.$plyta->id_plyta.'"> Edytuj </a>
                /
                <a href="'.URLROOT .'/tabVinyls/DeleteVinyl/'.$plyta->id_plyta.'"> Usuń </a>
                </td>';
                
                    }
            echo "</tr>";
            echo "<script>
            function change".$plyta->id_plyta."(){
                document.getElementById('".$plyta->id_plyta."').submit();
            }
            </script>";
            }
            
            ?>
            
        

    </table> 
    
    

        <?php endif;?>
    </main>
</div>

