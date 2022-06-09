<nav class="header">
    <div class="left">
        <img class="menu-icon" src="<?php echo URLROOT;?>/assets/images/menu.svg" alt="Menu"  onclick="openNav()">
    </div>
    <h1 class="logo">
        <a href="<?php echo URLROOT?>">ELVIS</a>
    </h1>
    <h1 class="logo-small">
        <a href="<?php echo URLROOT?>">ELVIS</a>
    </h1>
                <div class="right flex-row">
                    <?php if  (isset($_SESSION['userData'])||(isset($_SESSION['pracownikData']))) :?>
                        <a href="<?php echo URLROOT."/index/logout"?>">WYLOGUJ</a>
                    <?php else:?>
                        <a href="<?php echo URLROOT."/login"?>">ZALOGUJ</a>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['userData'])) :?>
                        <strong>|</strong>
                    <a href="<?php echo URLROOT."/profileCustomer"?>">
                        <img class="menu-icon" src="<?php echo URLROOT;?>/assets/images/user-icon.svg" alt="Profil"></span>
                    </a>
                    <?php elseif(isset($_SESSION['pracownikData'])) :?>
                        <strong>|</strong>
                        <a href="<?php echo URLROOT."/profileAdmin"?>">
                        <img class="menu-icon" src="<?php echo URLROOT;?>/assets/images/user-icon.svg" alt="Profil"></span>
                    </a>
                    <?php endif; ?>
                </div>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?php echo URLROOT;?>">Wszystko</a>
        <?php foreach($kategorie as $kategoria){ ?>
        <a href="<?php echo URLROOT.'?group='.$kategoria->id_kategoria;?>"><?php echo $kategoria->nazwa ?> </a>
        <?php } ?>
    </div>
</nav>
<script>
        //Sidebar
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>