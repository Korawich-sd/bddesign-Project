<link rel="stylesheet" href="assets/css/index.css" />
<?php include('menu_l.php');
require_once('../config/bddesign_db.php');

if(!isset($_SESSION['admin_login'])){
    header("location: login.php");
}

?>
<!-- Layout container -->
<div class="layout-container" style="position: absolute; top: 80px; z-index: -1;">
    <aside id="layout-menus" class="layout-menu menu-vertical menu bg-menu-theme"></aside>
    <div class="layout-pages">
        <p>หน้าหลัก</p>
    </div>
</div>