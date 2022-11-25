<link rel="stylesheet" href="assets/css/blog.css?v=1001" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<?php include('menu_l.php');
require_once('../config/bddesign_db.php');
error_reporting(0);
$page = $_GET['page'];
$blog_count = $conn->prepare("SELECT * FROM blog");
$blog_count->execute();
$count_blog = $blog_count->fetchAll();


$rows = 6;
if ($page == "") {
    $page = 1;
}
$total_data = count($count_blog);
$total_page = ceil($total_data / $rows);
$start = ($page - 1) * $rows;

$blog = $conn->prepare("SELECT * FROM blog LIMIT $start,6");
$blog->execute();
$row_blog = $blog->fetchAll();


if (isset($_GET['delete_blog_id'])) {
    $delete_blog_id = $_GET['delete_blog_id'];
    $delete_blog = $conn->prepare("DELETE FROM blog WHERE id = :id");
    $delete_blog->bindParam(":id", $delete_blog_id);
    $delete_blog->execute();

    if ($delete_blog) {
        echo "<script>alert('ลบบทความเรียบร้อยแล้ว')</script>";
        echo "<meta http-equiv='Refresh' content='0.001; url=blog.php'>";
    }
}
?>
<!-- Layout container -->


<div class="layout-container" style="position: absolute; top: 80px; z-index: 1;">
    <aside id="layout-menus" class="layout-menu menu-vertical menu bg-menu-theme"></aside>
    <div class="layout-pages">
        <div class="box-title">
            <p class="add-blog">บทความทั้งหมด
                <a href="add_blog.php"><button class="btn-add-blog">เพิ่มบทความ</button></a>
            </p>

        </div>
        <table class="table">
            <thead>
                <tr align="center">
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">รูปหน้าปก</th>
                    <th scope="col">ชื่อบทความ</th>
                    <th scope="col">วันที่สร้าง</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody> <?php
                    $i = 1;
                    if (!$row_blog) {
                        echo "ยังไม่มีบทความ";
                    } else {

                        foreach ($row_blog as $row_blog) { ?>
                        <tr align="center">
                            <!-- <th scope="row"><?=  $i  ?></th> -->
                            <td><img width="80px" src="assets/blog_upload/<?= $row_blog['blog_img1'] ?>" alt=""></td>
                            <td><?= $row_blog["title_blog"] ?></td>
                            <td><?= $row_blog["created_blog"] ?></td>
                            <td>
                                <a href="edit_blog.php?blog_id=<?= $row_blog['id'] ?>"><button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></a>
                                <a href="blog.php?delete_blog_id=<?= $row_blog['id'] ?>" onclick="return confirm('คุณต้องการลบบทความนี้ใช่ไหม')"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                            </td>
                        </tr>
                <?php $i++; } 
                    }
                ?>
            </tbody>

        </table>
        <ul class="pagination justify-content-center mt-5">
            <li <?php if ($page == 1) {
                    echo "class='page-item disabled'";
                } ?>>
                <a class="page-link previous-page" href="blog.php?page=<?= $page - 1 ?>" aria-disabled="true">ก่อนหน้า</a>
            </li>
            <?php
            for ($i = 1; $i <= $total_page; $i++) { ?>
                <li <?php if ($page == $i) {
                        echo "class='page-item active'";
                    } ?>><a class="page-link" href="blog.php?page=<?= $i ?>"><?= $i ?></a></li>
            <?php }
            ?>

            <li <?php if ($page == $total_page) {
                    echo "class='page-item disabled'";
                } ?>>
                <a class="page-link nextpage" href="blog.php?page=<?= $page + 1 ?>">ถัดไป </a>
            </li>

        </ul>

    </div>
</div>