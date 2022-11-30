<link rel="stylesheet" href="assets/css/add_blog.css?v=1001" />
<?php include('menu_l.php');
require_once('../config/bddesign_db.php');

if(isset($_GET['topic_id'])){
    $topic_id = $_GET['topic_id'];

    $stmt = $conn->prepare("SELECT * FROM about_us_en WHERE id = :id");
    $stmt->bindParam(":id",$topic_id);
    $stmt->execute();
    $row_about_us = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['edit-about-submit'])){
    $topic = $_POST['topic'];
    $content = $_POST['content'];

    $edit = $conn->prepare("UPDATE about_us_en SET topic = :topic, content = :content WHERE id = :id");
    $edit->bindParam(":topic",$topic);
    $edit->bindParam(":content",$content);
    $edit->bindParam(":id",$topic_id);
    $edit->execute();
    
    if($edit){
        echo '<script>alert("แก้ไขข้อมูลสำเร็จ")</script>';
        echo "<meta http-equiv='Refresh' content='0.001; url=about_us_en.php'>";
    }else {
        echo '<script>alert("มีบางอย่างผิดพลาด")</script>';
    }
}
?>
<!-- Layout container -->
<div class="layout-container" style="position: absolute; top: 80px; z-index: 1;">
    <aside id="layout-menus" class="layout-menu menu-vertical menu bg-menu-theme"></aside>
    <div class="layout-pages">
        <div class="box-title">
            <p class="add-blog">แก้ไขเกี่ยวกับเรา (ภาษาไทย)</p>
        </div>
        <?php
        if (isset($errorMsg)) { ?>
            <div class="alert alert-danger " id="alert-blog" role="alert">
                <?php echo $errorMsg ?>
            </div>
        <?php  }
        ?>
        <div class="box-form">
            <form method="post" class="form-lo">
                <!-- <label for="title_blog" class="mt-3 title_blog">เกริ่นนำ</label>
                <textarea name="title" class="form-control" id="title"></textarea> -->
                <div class="pt">
                    <div class="box-txt-content2">
                        <label for="paragraph1" class="mt-3 paragraph1">หัวข้อ</label>
                        <input type="text" name="topic" value="<?= $row_about_us["topic"]?>" class="form-control ">

                        <label for="paragraph3" class="mt-3 paragraph3">เนื้อหา (ถ้าขึ้นบรรทัดใหม่ให้ใส่ ; ข้างหลัง)</label>
                        <textarea type="text" name="content" id="paragraph3" class="form-control "><?= $row_about_us['content']?></textarea>
                    </div>
                </div>
                <!-- <div class="txt-img mt-4"><span>รูปภาพ</span></div> -->
                <!-- <div class="pos">
                    <div class="filewrap">
                        <input name="img1" id="imgInput1" class="form-control" type="file" />
                        <img width="100%" id="previewImg1" alt="">
                    </div>
                </div> -->
                <div class="box-btn "> <button type="submit" name="edit-about-submit" class="btn-blog-submit">บันทึกข้อมูล</button></div>
            </form>
        </div>
    </div>
</div>

<script>
    let imgInput1 = document.getElementById('imgInput1');
    let previewIm = document.getElementById('previewImg1');

    imgInput1.onchange = evt => {
        const [file] = imgInput1.files;
        if (file) {
            previewImg1.src = URL.createObjectURL(file);
        }
    }
</script>