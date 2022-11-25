<link rel="stylesheet" href="assets/css/add_blog.css?v=1001" />
<?php include('menu_l.php');
require_once('../config/bddesign_db.php');

$blog_id;

if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];
    $data_blog = $conn->prepare("SELECT * FROM blog WHERE id = :id");
    $data_blog->bindParam(":id", $blog_id);
    $data_blog->execute();
    $row_data_blog = $data_blog->fetch(PDO::FETCH_ASSOC);
}



if (isset($_POST['edit-blog'])) {
    $title_blog = $_POST['title_blog'];
    $paragraph1 = $_POST['paragraph1'];
    $paragraph2 = $_POST['paragraph2'];
    $paragraph3 = $_POST['paragraph3'];
    $paragraph4 = $_POST['paragraph4'];
    $img1 = $_FILES['img1'];
    $img2 = $_FILES['img2'];
    $img3 = $_FILES['img3'];


    $allow = array('jpg', 'jpeg', 'png', 'webp');
    $extention1 = explode(".", $img1['name']); //เเยกชื่อกับนามสกุลไฟล์
    $extention2 = explode(".", $img2['name']); //เเยกชื่อกับนามสกุลไฟล์
    $extention3 = explode(".", $img3['name']); //เเยกชื่อกับนามสกุลไฟล์
    $fileActExt1 = strtolower(end($extention1)); //แปลงนามสกุลไฟล์เป็นพิมพ์เล็ก
    $fileActExt2 = strtolower(end($extention2)); //แปลงนามสกุลไฟล์เป็นพิมพ์เล็ก
    $fileActExt3 = strtolower(end($extention3)); //แปลงนามสกุลไฟล์เป็นพิมพ์เล็ก
    $fileNew1 = rand() . "." . $fileActExt1;
    $fileNew2 = rand() . "." . $fileActExt2;
    $fileNew3 = rand() . "." . $fileActExt3;
    $filePath1 = "assets/blog_upload/" . $fileNew1;
    $filePath2 = "assets/blog_upload/" . $fileNew2;
    $filePath3 = "assets/blog_upload/" . $fileNew3;

    if (empty($title_blog)) {
        $errorMsg = "กรุณากรอกชื่อเรื่อง";
    } else if (empty($paragraph1)) {
        $errorMsg = "กรุณากรอกเนื้อหาที่ 1";
    } else {
        try {
            if (in_array($fileActExt1, $allow) && in_array($fileActExt2, $allow) && in_array($fileActExt3, $allow)) {
                if ($img1['size'] > 0 && $img1['error'] == 0 && $img2['size'] > 0 && $img2['error'] == 0 && $img3['size'] > 0 && $img3['error'] == 0) {
                    if (move_uploaded_file($img1['tmp_name'], $filePath1) && move_uploaded_file($img2['tmp_name'], $filePath2) && move_uploaded_file($img3['tmp_name'], $filePath3)) {
                        $insert_blog = $conn->prepare("UPDATE blog SET title_blog = :title_blog, paragraph1 = :paragraph1,
                                                 paragraph2 = :paragraph2, paragraph3 = :paragraph3, paragraph4 = :paragraph4,
                                                  blog_img1 = :blog_img1, blog_img2 = :blog_img2, blog_img3 = :blog_img3 WHERE id = :id");

                        $insert_blog->bindParam(":title_blog", $title_blog);
                        $insert_blog->bindParam(":paragraph1", $paragraph1);
                        $insert_blog->bindParam(":paragraph2", $paragraph2);
                        $insert_blog->bindParam(":paragraph3", $paragraph3);
                        $insert_blog->bindParam(":paragraph4", $paragraph4);
                        $insert_blog->bindParam(":blog_img1", $fileNew1);
                        $insert_blog->bindParam(":blog_img2", $fileNew2);
                        $insert_blog->bindParam(":blog_img3", $fileNew3);
                        $insert_blog->bindParam(":id", $blog_id);
                        $insert_blog->execute();
                        if ($insert_blog) {
                            echo "<script>alert('แก้ไขบทความเรียบร้อยแล้ว')</script>";
                            echo "<meta http-equiv='Refresh' content='0.001; url=blog.php'>";
                        } else {
                            echo "<script>alert('มีบางอย่างผิดพลาด')</script>";
                        }
                    }
                }
            } else {
                $insert_blog = $conn->prepare("UPDATE blog SET title_blog = :title_blog, paragraph1 = :paragraph1,
                paragraph2 = :paragraph2, paragraph3 = :paragraph3, paragraph4 = :paragraph4,
                 blog_img1 = :blog_img1, blog_img2 = :blog_img2, blog_img3 = :blog_img3 WHERE id = :id");

                $insert_blog->bindParam(":title_blog", $title_blog);
                $insert_blog->bindParam(":paragraph1", $paragraph1);
                $insert_blog->bindParam(":paragraph2", $paragraph2);
                $insert_blog->bindParam(":paragraph3", $paragraph3);
                $insert_blog->bindParam(":paragraph4", $paragraph4);
                $insert_blog->bindParam(":blog_img1", $row_data_blog['blog_img1']);
                $insert_blog->bindParam(":blog_img2", $row_data_blog['blog_img2']);
                $insert_blog->bindParam(":blog_img3", $row_data_blog['blog_img3']);
                $insert_blog->bindParam(":id", $blog_id);
                $insert_blog->execute();
                if ($insert_blog) {
                    echo "<script>alert('แก้ไขบทความเรียบร้อยแล้ว')</script>";
                    echo "<meta http-equiv='Refresh' content='0.001; url=blog.php'>";
                } else {
                    echo "<script>alert('มีบางอย่างผิดพลาด')</script>";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
<!-- Layout container -->
<div class="layout-container" style="position: absolute; top: 80px; z-index: 1;">
    <aside id="layout-menus" class="layout-menu menu-vertical menu bg-menu-theme"></aside>
    <div class="layout-pages">
        <div class="box-title">
            <p class="add-blog">เเก้ไขบทความ</p>
        </div>
        <?php
        if (isset($errorMsg)) { ?>
            <div class="alert alert-danger " id="alert-blog" role="alert">
                <?php echo $errorMsg ?>
            </div>
        <?php  }
        ?>
        <div class="box-form">
            <form method="post" class="form-lo" enctype="multipart/form-data">
                <label for="title_blog" class="mt-3 title_blog">หัวข้อเรื่อง</label>
                <input type="text" name="title_blog" value="<?= $row_data_blog["title_blog"] ?>" id="title_blog" class="form-control ">
                <div class="pt">
                    <div class="box-txt-content2">
                        <label for="paragraph1" class="mt-3 paragraph1">เนื้อหาย่อหน้าที่ 1 (จำเป็น)</label>
                        <textarea type="text" name="paragraph1" id="paragraph1" class="form-control "><?= $row_data_blog["paragraph1"] ?></textarea>

                        <label for="paragraph3" class="mt-3 paragraph3">เนื้อหาย่อหน้าที่ 3 (ไม่จำเป็น)</label>
                        <textarea type="text" name="paragraph3" id="paragraph3" class="form-control "><?= $row_data_blog["paragraph2"] ?></textarea>

                        <div class="txt-img mt-4"><span>รูปภาพใหม่ (กรุณาเพิ่มทั้ง 3 รูปภาพ)</span></div>
                        <div class="pos">
                            <div class="filewrap">
                                <input name="img1" id="imgInput1" class="form-control" type="file" />
                                <img width="100%" id="previewImg1" alt="">
                            </div>
                            <div class="filewrap">
                                <input name="img2" id="imgInput2" class="form-control" type="file" />
                                <img width="100%" id="previewImg2" alt="">
                            </div>
                            <div class="filewrap">
                                <input name="img3" id="imgInput3" class="form-control" type="file" />
                                <img width="100%" id="previewImg3" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="box-txt-content1">
                        <label for="paragraph2" class="mt-3 paragraph2">เนื้อหาย่อหน้าที่ 2 (ไม่จำเป็น)</label>
                        <textarea type="text" name="paragraph2" id="paragraph2" class="form-control "><?= $row_data_blog["paragraph3"] ?></textarea>
                        <label for="paragraph4" class="mt-3 paragraph4">เนื้อหาย่อหน้าที่ 4 (ไม่จำเป็น)</label>
                        <textarea type="text" name="paragraph4" id="paragraph4" class="form-control "><?= $row_data_blog["paragraph4"] ?></textarea>

                        <div class="txt-img mt-4"><span>รูปภาพเดิม</span></div>
                        <div class="pos">
                            <?php
                            $row_img1 = explode(".",$row_data_blog["blog_img1"]);
                            $row_img2 = explode(".",$row_data_blog["blog_img2"]);
                            $row_img3 = explode(".",$row_data_blog["blog_img3"]);
                                ?>
                            <div class="filewrap">
                                <img width="100%" src="assets/blog_upload/<?php if($row_img1[1] == null){echo 'file-upload.png';}else{echo $row_data_blog['blog_img1'];}?>" alt="ไม่มีรูปภาพ">
                            </div>
                            <div class="filewrap">
                                <img width="100%" src="assets/blog_upload/<?php if($row_img2[1] == null){echo 'file-upload.png';}else{echo $row_data_blog['blog_img2'];}?>" alt="ไม่มีรูปภาพ">
                            </div>
                            <div class="filewrap">
                                <img width="100%" src="assets/blog_upload/<?php if($row_img3[1] == null){echo 'file-upload.png';}else{echo $row_data_blog['blog_img3'];}?>"alt="ไม่มีรูปภาพ">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="box-btn "> <button type="submit" name="edit-blog" class="btn-blog-submit">แก้ไขข้อมูล</button></div>
            </form>
        </div>
    </div>
</div>

<script>
    let imgInput1 = document.getElementById('imgInput1');
    let previewIm = document.getElementById('previewImg1');
    let imgInput2 = document.getElementById('imgInput2');
    let previewIm2 = document.getElementById('previewImg2');
    let imgInput3 = document.getElementById('imgInput3');
    let previewImg3 = document.getElementById('previewImg3');

    imgInput1.onchange = evt => {
        const [file] = imgInput1.files;
        if (file) {
            previewImg1.src = URL.createObjectURL(file);
        }
    }
    imgInput2.onchange = evt => {
        const [file] = imgInput2.files;
        if (file) {
            previewImg2.src = URL.createObjectURL(file);
        }
    }
    imgInput3.onchange = evt => {
        const [file] = imgInput3.files;
        if (file) {
            previewImg3.src = URL.createObjectURL(file);
        }
    }
</script>