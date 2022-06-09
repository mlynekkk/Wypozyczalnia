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
        <?php if (count($employees) > 0) : ?>



            <table>
                <tr>
                    <th> <a href="?sortType=id_klient">Id Pracownika</a></th>
                    <th><a href="?sortType=login">Login</a></th>
                    <th><a href="?sortType=email">Rola</a></th>
                </tr>
                <?php

                foreach ($employees as $employee) {
                    echo "<tr id=\"employee-" . $employee->id_pracownik . "\">";
                    echo "<td>" . $employee->id_pracownik . "</td>";
                    echo "<td>" . $employee->login . "</td>";
                    echo "<td>";
                    if(isset($_SESSION['admin'])&&!($_SESSION['pracownikData']->id_pracownik==$employee->id_pracownik)){
                    echo "<form id='" . $employee->id_pracownik . "' method='post' action='" . URLROOT . "/tabEmployees/updateRole'>
                    <select name='rola' onchange='change" . $employee->id_pracownik . "()'>
                        <option value='1'";
                    if ($employee->id_rola == 1) echo "selected";
                    echo ">Admin</option>
                        <option value='2'";
                    if ($employee->id_rola == 2) echo "selected";
                    echo ">Pracownik</option>";
                    }else{
                        if($employee->id_rola==1) echo "Admin";
                        if ($employee->id_rola == 2) echo "Pracownik";
                    }
                    echo "</select></td>
                    <input type='hidden' name='id_pracownik' value='" . $employee->id_pracownik . "'>
                    </form>";
                    if(isset($_SESSION['admin'])){
                    echo '<td>
                <a href="' . URLROOT . '/editEmployee?id_pracownik=' . $employee->id_pracownik . '"> Edytuj </a>';
                if(!($_SESSION['pracownikData']->id_pracownik==$employee->id_pracownik)){
                    echo '/ <a href="' . URLROOT . '/tabEmployees/deleteEmployee/' . $employee->id_pracownik . '"> Usuń </a>';
                }
               echo ' </td>';}
                    echo "</tr>";
                    echo "<script>
            function change" . $employee->id_pracownik . "(){
                document.getElementById('" . $employee->id_pracownik . "').submit();
            }
            </script>";
                } ?>
            </table>

        <?php endif; ?>
    </main>
</div>