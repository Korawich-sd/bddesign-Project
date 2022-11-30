<link rel="stylesheet" href="assets/css/about_us.css?v=<?php echo time(); ?>" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<?php include('menu_l.php');
require_once('../config/bddesign_db.php');
error_reporting(0);

$stmt = $conn->prepare("SELECT * FROM about_us");
$stmt->execute();
$row_about_us = $stmt->fetchAll();



?>
<!-- Layout container -->


<div class="layout-container" style="position: absolute; top: 80px; z-index: 1;">
    <aside id="layout-menus" class="layout-menu menu-vertical menu bg-menu-theme"></aside>
    <div class="layout-pages">
        <div class="box-title">
            <div class="box-title-add">
                <p class="add-blog">เกี่ยวกับเรา</p>
            </div>
            <div class="box-add-blog">
                <a href="about_us_en.php"><button class="btn-blog-th">เพิ่มข้อมูลฉบับภาษาอังกฤษ</button></a>
            </div>
        </div>
        <div class="title-box">
            <?php
            for ($i = 0; $i < count($row_about_us); $i++) {
                $content[] = explode(";", $row_about_us[$i]["content"]);
                $count_content = $content[$i]; ?>

                <p><?php echo $row_about_us[$i]['title'] ?> <a href="edit_title_about_us.php?topic_id=<?php echo $row_about_us[$i]["id"] ?>"><?php if ($row_about_us[$i]["title"] == null) {
                                                                                                                                                    echo "";
                                                                                                                                                } else {
                                                                                                                                                    echo "แก้ไขที่นี่";
                                                                                                                                                } ?></a></p>
                <h4><?php echo $row_about_us[$i]['topic'] . "   " ?><a href="edit_about_us.php?topic_id=<?php echo $row_about_us[$i]["id"] ?>"><button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></a></h4>

                <?php for ($j = 1; $j < count($count_content); $j++) { ?>
                    <h6><?php echo $j . ". " . $content[$i][$j]; ?></h6>
                <?php }
                ?>
            <?php  }
            ?>
        </div>
        <?php
                if ($row_about_us[0]["title"] == null) { ?>
                    <p></p>
                <?php } else { ?>

                    <img width="100%" src="assets/about_me/<?= $row_about_us[0]["img"] ?>" alt="">
                <?php  }
                ?>

        <h4><?php //echo $content[$i] 
            ?></h4>

        <?php
        echo '<pre>';
        print_r($content[$i][$i]);
        echo '<pre>';
        ?>
    </div>
</div>