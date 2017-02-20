<?php
    $hal = (isset($_GET['hal']) && $_GET['hal']) ? $_GET['hal'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<title>.:: Admin Framework Langit Inspirasi ::.</title>
<link rel="shortcut icon" type="image/png" href="<?php echo PATH; ?>/resource/webcamp/images/<?php echo $data["identitas"]->favicon; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Framework Langit Inspirasi Responsive Web, Bootstrap Web Langit Inspirasi Framework, Flat Web Langit Inspirasi Framework, 
Smartphone Framework Langit Inspirasi, Yosef Murya, YM Kusuma Ardhana, Yosef Murya Kusuma Ardhana" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="<?php echo PATH; ?>assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">

<!-- Custom Theme files -->
 <link href="<?php echo PATH; ?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?php echo PATH; ?>assets/admin/css/style.css" rel="stylesheet" type="text/css" media="all"/>

<!--js-->
<script src="<?php echo PATH; ?>assets/admin/js/jquery-2.1.1.min.js"></script> 

<script src="<?php echo PATH; ?>assets/admin/js/jquery.dataTables.min.js"></script>

<!-- TinyMCE JavaScript -->
<script src="<?php echo PATH; ?>resource/admin/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
    tinymce.init({
        selector: ".editor"
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $(".data-table").DataTable({

            "language": {
                "emptyTable": "Tidak ada data"
            }
        });
    });
</script>
<!--icons-css-->
<link href="<?php echo PATH; ?>assets/admin/css/font-awesome.css" rel="stylesheet"> 

<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>

<!--static chart-->
<script src="<?php echo PATH; ?>assets/admin/js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="<?php echo PATH; ?>assets/admin/js/chartinator.js" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="<?php echo PATH; ?>assets/admin/js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>  
<div class="page-container">    
   <div class="left-content">
       <div class="mother-grid-inner">
            <!--header start here-->
                <div class="header-main">
                    <div class="header-left">
                            <div class="logo-name">
                                     <a href="index.html"><h1>MONITORING JARINGAN</h1> 
                                    <!--<img id="logo" src="" alt="Logo"/>--> 
                                  </a>                              
                            </div>                          
                            <div class="clearfix"> </div>
                         </div>
                         <div class="header-right">
                            <div class="profile_details_left"><!--notifications of menu start -->
                                <div class="clearfix"> </div>
                            </div>
                            <!--notification menu end -->
                            <div class="profile_details">       
                                <ul>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <div class="profile_img">   
                                                <span class="prfil-img"><img src="<?php echo PATH; ?>/resource/admin/images/p1.png" alt=""> </span> 
                                                <div class="user-name">
                                                    <p><?php echo $data["signin"]->username; ?></p>
                                                    <span>
                                                        <?php 
                                                            if($data["signin"]->level == 'admin'){
                                                                echo "Administrator" ;
                                                            }                                                            
                                                        ?>
                                                    </span>
                                                </div>
                                                <i class="fa fa-angle-down lnr"></i>
                                                <i class="fa fa-angle-up lnr"></i>
                                                <div class="clearfix"></div>    
                                            </div>  
                                        </a>
                                        <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                                            <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
                                            <li> <a href="<?php echo PATH; ?>index.php?hal=signin&&action=logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"> </div>               
                        </div>
                     <div class="clearfix"> </div>  
                </div>
<!--heder end here-->
<!-- script-for sticky-nav -->
        <script>
        $(document).ready(function() {
             var navoffeset=$(".header-main").offset().top;
             $(window).scroll(function(){
                var scrollpos=$(window).scrollTop(); 
                if(scrollpos >=navoffeset){
                    $(".header-main").addClass("fixed");
                }else{
                    $(".header-main").removeClass("fixed");
                }
             });
             
        });
        </script>
        <!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="">
    <?php               
        $view = new View($viewName);
        $view->bind('data', $data);
        $view->forceRender();
    ?>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
     <p>© 2016 <a href="http://langitinspirasi.co.id/" target="_blank">Langit Inspirasi Framework</a>. All Rights Reserved</p>
</div>  
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
            <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
                  <!--<img id="logo" src="" alt="Logo"/>--> 
              </a> </div>         
            <div class="menu">
              <ul id="menu" >
                <li <?php if($hal=="" || $hal=="home") echo 'class="active"'; ?>  >
                    <a href="<?php echo PATH; ?>">
                        <i class="fa fa-tachometer"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li <?php if($hal=="Stasiun") echo 'class="active"'; ?>  >
                    <a href="<?php echo PATH; ?>?hal=Stasiun">
                        <i class="fa fa-building "></i>
                        <span>List Stasiun</span>
                    </a>
                </li>
                <li><a href="#"><i class="fa fa-signal"></i><span>Monitoring</span><span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul>
                        <?php foreach($data["stasiunData"] as $stasiun) { ?>
                        <li <?php if($hal=="Monitoring") echo 'class="active"'; ?>  >
                            <a href="<?php echo PATH; ?>?hal=Monitoring&&id=<?=$stasiun->id_terminal?>">
                                <i class="fa fa-server"></i>
                                <span>Monitoring <?=$stasiun->nama_terminal;?></span>
                            </a>
                        </li>   
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-cog"></i><span>Pengaturan</span><span class="fa fa-angle-right" style="float: right"></span></a>
                  <ul>
                    <li <?php if($hal=="Email") echo 'class="active"'; ?>  >
                        <a href="<?php echo PATH; ?>?hal=Email">
                            <i class="fa fa-envelope"></i>
                            <span>Log Laporan Email</span>
                        </a>
                    </li>   
                    <li <?php if($hal=="Client") echo 'id="menu-home"'; ?>  >
                        <a href="<?php echo PATH; ?>?hal=Client&&action=add">
                            <i class="fa fa-server"></i>
                            <span>Add Client</span>
                        </a>
                    </li>
                    <li <?php if($hal=="Stasiun") echo 'id="menu-home"'; ?>  >
                        <a href="<?php echo PATH; ?>?hal=Stasiun&&action=add">
                            <i class="fa fa-th-list"></i>
                            <span>Add Stasiun</span>
                        </a>
                    </li>
                    <li <?php if($hal=="Logout") echo 'id="menu-home"'; ?>  >
                        <a href="<?php echo PATH; ?>?hal=Logout">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                  </ul>
                </li>
            </div>
     </div>
    <div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>

<script src="<?php echo PATH; ?>assets/admin/js/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo PATH; ?>assets/admin/js/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
$(function () {
    $("[data-mask]").inputmask();
    });
</script>

<!--scrolling js-->
        <script src="<?php echo PATH; ?>assets/admin/js/jquery.nicescroll.js"></script>
        <script src="<?php echo PATH; ?>assets/admin/js/scripts.js"></script>
<!--//scrolling js-->
<script src="<?php echo PATH; ?>assets/admin/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                     