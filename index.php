<?php
error_reporting(1);
session_start();
if(!isset($_SESSION['status_login'])){
//    if ($_SESSION['status_login'] == null){
        header("location:login.php");
//    }
}
//echo $_SESSION['status_login'];
//die();
$menu = '';
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
}

if (!file_exists($menu . ".php")) {
    $menu = 'not_found';
}

if (!isset($_SESSION['apriori_toko_id']) &&
    ($menu != '' & $menu != 'home' & $menu != 'tentang' & $menu != 'not_found' & $menu != 'forbidden')) {
    header("location:login.php");
}
include_once 'fungsi.php';
//include 'koneksi.php';
?>

<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
    today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
    experience this site.</p>
<![endif]-->


<!-- <section id="pageloader">
    <div class="loader-item fa fa-spin colored-border"></div>
</section> --> <!-- /#pageloader -->

<?php
include "header.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
         <div class="container-fluid">

        <?php

        $menu = ''; //variable untuk menampung menu
        if (isset($_GET['menu'])) {
            $menu = $_GET['menu'];
        }


        if ($menu != '') {
            if (can_access_menu($menu)) {
                if (file_exists($menu . ".php")) {
                    include $menu . '.php';
                } else {
                    include "not_found.php";
                }
            } else {
                include "forbidden.php";
            }
        } else {
            include "home.php";
        }
        ?>
         </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="assets/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<script src="js/vendor/jquery-1.11.0.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="scripts/bootstrap/bootstrap.min.js"></script>


<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
    $(window).load(function () { // makes sure the whole site is loaded
        $('.loader-item').fadeOut(); // will first fade out the loading animation
        $('#pageloader').fadeOut('fast'); // will fade out the white DIV that covers the website.
        $('body').css({'overflow-y': 'visible'});
    })
    //]]>
</script>


<!-- jQuery 2.1.4 -->
<!-- <script src="import/jQuery/jQuery-2.1.4.min.js"></script> -->
<!-- date-range-picker -->
<script src="import/daterangepicker/moment-cloud.min.js"></script>
<script src="import/daterangepicker/daterangepicker.js"></script>

<!-- Page script -->
<script>
    $(function () {
        //Date range picker
        $('#reservation').daterangepicker(
            {format: 'DD/MM/YYYY'}
        );
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

    });
</script>
</body>
</html>

