<?php
include('../Assets/Connection/Connection.php');

session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin</title>
        <!-- <link rel="icon" href="../Assets/Template/Admin/img/favicon.png" type="image/png"> -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/css/bootstrap.min.css" />
        <!-- themefy CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/themefy_icon/themify-icons.css" />
        <!-- swiper slider CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/swiper_slider/css/swiper.min.css" />
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/select2/css/select2.min.css" />
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/niceselect/css/nice-select.css" />
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/owl_carousel/css/owl.carousel.css" />
        <!-- gijgo css -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/gijgo/gijgo.min.css" />
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/font_awesome/css/all.min.css" />
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/tagsinput/tagsinput.css" />
        <!-- datatable CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/datatable/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/datatable/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/datatable/css/buttons.dataTables.min.css" />
        <!-- text editor css -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/text_editor/summernote-bs4.css" />
        <!-- morris css -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/morris/morris.css">
        <!-- metarial icon css -->
        <link rel="stylesheet" href="../Assets/Template/Admin/vendors/material_icon/material-icons.css" />

        <!-- menu css  -->
        <link rel="stylesheet" href="../Assets/Template/Admin/css/metisMenu.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="../Assets/Template/Admin/css/style.css" />
        <link rel="stylesheet" href="../Assets/Template/Admin/css/colors/default.css" id="colorSkinCSS">
    </head>
    <body class="crm_body_bg">



        <!-- main content part here -->

        <!-- sidebar  -->
        <!-- sidebar part here -->
        <nav class="sidebar">
            <div class="logo d-flex justify-content-between">
                <a href="HomePage.php"><h2 align="center">Welcome<br>Admin<br><?php echo $_SESSION["lgname"]?></h2></a>
                <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div>
            </div>
            <ul id="sidebar_menu">
                <li class="side_menu_title">
                    <span>Dashboard</span>
                </li>
                <li class="mm-active">
                    <a  href="HomePage.php"  aria-expanded="false">
                        <img src="../Assets/Template/Admin/img/menu-icon/1.svg" alt="">
                        <span>Dashboard</span>
                    </a>
                   
                </li>
                <li class="side_menu_title">
                    <span>Applications</span>
                </li>
                <li class="">
                    <a   class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <img src="../Assets/Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>Location</span>
                    </a>
                    
                   <ul>
                    
                        <li><a href="District.php">District</a></li>
                        <li><a href="Place.php">Place</a></li>
                        <li><a href="KudumbaUnit.php">Unit</a></li>
                    </ul>
                </li>
                <li class="">
                    <a   class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <img src="../Assets/Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>Datas</span>
                    </a>
                    
                   <ul>
                        <li><a href="ChurchGallery.php">Church Gallery</a></li>
                        <li><a href="ServiceType.php">Service Type</a></li>
                        <li><a href="CertificateType.php">Certificate Type</a></li>                       
                        <li><a href="Category.php">Donation Type</a></li>
                        <li><a href="Auditorium.php">Auditorium</a></li>
                        <li><a href="Priest.php">Priest</a></li>
                        <li><a href="ViewServiceBookingA.php">Service Requests</a></li>
                        <li><a href="ViewCertificateRequest.php">Certificate Requests</a></li>
                        <li><a href="ViewAuditoriumRequest.php">Auditorium Requests</a></li>
                        <li><a href="ServiceReport.php">Service Report</a></li>
                        <li><a href="CertificateReport.php">Certificate Report</a></li>
                        <li><a href="ViewDirectory.php">Directory</a></li>
                    </ul>
                </li>
                <li class="">
                        <a   class="has-arrow" href="FamilyList.php" aria-expanded="false">
                            <img src="../Assets/Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Family</span>
                        </a>	
                   </li>
                   <li class="">
                    <a   class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <img src="../Assets/Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>Notification</span>
                    </a>
                    
                   <ul>
                   <li>
                        <li><a href="Event.php">Event</a></li>
                        <li><a href="News.php">News</a></li>
                        <li><a href="Ceremony.php">Ceremony</a></li>
                    </ul>
                </li>
                
                   <li class="">
                        <a   class="has-arrow" href="../Guest/Login.php" aria-expanded="false">
                            <img src="../Assets/Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Logout</span>
                        </a>	
                   </li>
            </ul>

        </nav>
        <!-- sidebar part end -->
        <!--/ sidebar  -->