    <style>
        @media only screen and (max-width: 770px) {
            .title-container {
                display: none;
            }
        }
    </style>
    <body>
        <!--
        ==================================================
        Header Section Start
        ================================================== -->
        <header id="top-bar" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="http://seguro.movisat.com/distribuidores/index_nuevo.php4" >
                            <img src="<?php echo base_url() ?>images/logo-movisat.gif" width="200" alt="">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-0"></div>
                <div class="col-md-4 col-sm-4 col-xs-0 text-center title-container">
                    <a href="<?php echo base_url() ?>" >
                        <h1 id="title-page">Documentación</h1>
                    </a>
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <!-- <li><a href="about.html">About</a></li> -->
                            <!-- <li><a href="service.html">CREAR...</a></li> -->
                            <li class="dropdown">
                                <a href="<?php echo base_url() ?>PanelController/dashboard" class="dropdown-toggle" data-toggle="dropdown">AGREGAR... <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="<?php echo base_url() ?>PanelController/edititem">Documentación</a></li>
                                        <li><a href="<?php echo base_url() ?>PanelController/editSector">Sector</a></li>
                                        <li><a href="<?php echo base_url() ?>PanelController/editTag">Etiqueta</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- <li><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>PanelController/editTag"><i class="fa fa-reply"></i></a></li> -->
                            <li>
                                <a href="<?php echo base_url() ?>PanelController/dashboard" >IR PANEL</a>
                            </li>
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="blog-fullwidth.html">Blog Full</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog Left sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right sidebar</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="contact.html">Contact</a></li> -->
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>
        