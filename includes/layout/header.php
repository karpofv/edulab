<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-blue-grey-blue gradient-shadow">
            <div class="nav-wrapper">
                <?php
                    /*<div class="header-search-wrapper hide-on-med-and-down sideNav-lock" on> <a href="javascript:void(0);" onclick="controler('dmn=14&ver=2&busc='+$('#search').val(),'ventanaVer');"><i class="material-icons">search</i></a>
                    <input id="search" type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explora Edulab" /> </div>*/
                        ?>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"> <i class="material-icons">settings_overscan</i> </a>
                    </li>
                    <?php /*
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"> <i class="material-icons">notifications_none
                    <small class="notification-badge">5</small>
                  </i> </a>
                    </li>
                  */?>                    
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                            <span class="avatar-status avatar-online">
                                <img src="<?php echo $ruta_base;?>/assets/img/avatar/<?php echo $FOTO;?>" alt="avatar">
                                <i></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <!-- profile-dropdown -->
                <ul id="profile-dropdown" class="dropdown-content">
                    <li>
                        <a href="javascript:void(0)" onclick="controler('dmn=15&ver=1','verContenido');" class="grey-text text-darken-1"> <i class="material-icons">face</i> Perfil</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="control.php?info=4" class="grey-text text-darken-1"> <i class="material-icons">keyboard_tab</i> Salir</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- END HEADER -->
<div id="main">
    <div class="wrapper">