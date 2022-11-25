<!DOCTYPE html>
<html lang="en" class="desktop">

<head>

	<link rel="shortcut icon" href="images/favicon.ico">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=0.85">
	<meta name="description" content="รับสร้างบ้าน ออกแบบบ้าน และเขียนแบบบ้าน เรามุ่งเน้นให้บริการดูแลลูกค้าอย่างครบวงจร">
	<meta name="keyword" content="รับสร้างบ้าน ออกแบบบ้าน และเขียนแบบบ้าน เรามุ่งเน้นให้บริการดูแลลูกค้าอย่างครบวงจร">
	<meta name="author" content="รับสร้างบ้าน ออกแบบบ้าน และเขียนแบบบ้าน เรามุ่งเน้นให้บริการดูแลลูกค้าอย่างครบวงจร">

	<title>รับสร้างบ้าน ออกแบบบ้าน และเขียนแบบบ้าน เรามุ่งเน้นให้บริการดูแลลูกค้าอย่างครบวงจร</title>


	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600;700;800;900&display=swap">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
	<link rel="stylesheet" type="text/css" href="css/fontello.css?v=1001">
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<link href="css/spinner.css?v=1001" rel="stylesheet">
	<!-- CSS only -->
	<link href="css/bootstrap.min.css?v=1001" rel="stylesheet">

	<link rel="stylesheet" href="css/coreNavigation.css?v=1001" />
	<link rel="stylesheet" href="css/typography.css?v=1001" />
	<link rel="stylesheet" href="css/custom.css?v=1001" />
	<link rel="stylesheet" href="css/header.css?v=1001" />
	<link rel="stylesheet" href="css/slide.css?v=1001" />
	<link rel="stylesheet" href="css/service-section.css?v=1001" />
	<link rel="stylesheet" href="css/about-section.css?v=1001" />
	<link rel="stylesheet" href="css/portfolio-section.css?v=1001" />
	<link rel="stylesheet" href="css/blog-section.css?v=1001" />
	<link rel="stylesheet" href="css/page-section.css?v=1001" />
	<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/footer.css?v=1001" />
	<link href="css/slick.min.css?v=1001" rel="stylesheet">
	<link href="css/slick-custom.css?v=1001" rel="stylesheet">

</head>
<?php
require_once('config/bddesign_db.php');
$page = $_GET['page'];
$blog_count = $conn->prepare("SELECT * FROM blog ");
$blog_count->execute();
$count_blog = $blog_count->fetchAll();


$rows = 6;
if($page == ""){
	$page = 1;
}
$total_data = count($count_blog);
$total_page = ceil($total_data / $rows);
$start = ($page - 1) * $rows;

$blog = $conn->prepare("SELECT * FROM blog LIMIT $start,6");
$blog->execute();
$row_blog = $blog->fetchAll();


?>

<body>
	<main>
		<?php include("header.php"); ?>
		<div class="slider">
			<div class="ps-0 pe-0">
				<div class="item-slide">
					<div class="slide-img">
						<img class="img-fluid w-100" src="upload/page.webp">
					</div>
				</div>
			</div>
		</div>
		<section id="page-section">
			<div class="container-xxl">
				<?php include("navigator.php"); ?>
				<div class="text-center mb-5">
					<div class="page-header ">
						<h2>บทความ</h2>
					</div>
				</div>
				<div class="row">

					<?php foreach ($row_blog as $row_blog) { ?>

						<div class="col-md-6 col-lg-4">
							<a href="blog-detail.php" class="item-blog">
								<div class="blog-img">
									<img class="las-img" width="416px" height="312px" src="webpanel/assets/blog_upload/<?= $row_blog['blog_img1'] ?>" alt="Monarch, khao-tao">
								</div>
								<div class="blog-text">
									<h4><?= $row_blog['title_blog'] ?></h4>
									<p><?= $row_blog['paragraph1'] ?></p>

									<div class="row">
										<div class="col-6 text-start">
											<?php
											$dateTime = $row_blog['created_blog'];
											$splitTime = explode(" ", $dateTime);
											$date = $splitTime[0];
											echo $date;
											?>
										</div>
										<div class="col-6 text-end">
											อ่านทั้งหมด >>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php

					} ?>


				</div>

				<ul class="pagination justify-content-center mt-5">
					<li <?php if($page==1){echo "class='page-item disabled'";} ?>  >
						<a class="page-link previous-page" href="blog.php?page=<?= $page-1 ?>" aria-disabled="true"><span class="material-icons">keyboard_double_arrow_left</span>ก่อนหน้า</a>
					</li>
					<?php
					for ($i = 1; $i <= $total_page; $i++) { ?>
						<li <?php if($page==$i){echo "class='page-item active'";} ?> ><a class="page-link" href="blog.php?page=<?= $i ?>"><?= $i ?></a></li>
					<?php }
					?>

					<li <?php if($page==$total_page){echo "class='page-item disabled'";} ?> >
						<a class="page-link nextpage" href="blog.php?page=<?= $page+1 ?>">ถัดไป <span class="material-icons">keyboard_double_arrow_right</span></a>
					</li>

				</ul>

			</div>
		</section>
	</main>

	<?php include("footer.php"); ?>


	<script src="js/bootstrap.bundle.min.js?v=1001"></script>
	<script src="js/jquery.min.js?v=1001"></script>
	<script src="js/coreNavigation.js?v=1001"></script>
	<script>
		$('nav').coreNavigation({
			menuPosition: "center",
			container: true,
			responsideSlide: true, // true or false
			mode: 'sticky',
			onStartSticky: function() {
				console.log('Start Sticky');
			},
			onEndSticky: function() {
				console.log('End Sticky');
			},
			dropdownEvent: 'accordion',
			dropdownEvent: 'hover',
			onOpenDropdown: function() {
				console.log('open');
			},
			onCloseDropdown: function() {
				console.log('close');
			}
		});
	</script>

	<script type="text/javascript">
		'use strict';
		var $window = $(window);
		$window.on({
			'load': function() {

				/* Preloader */
				$('.spinner').fadeOut(1500);



			},

		});
	</script>

	<script type="text/javascript" src="js/slick.min.js?v=1001"></script>
	<script type="text/javascript" src="js/slick-custom.js?v=1001"></script>


	<script type="text/javascript">
		$(document).ready(function() {
			$("a#list").click(function() {
				var list_y = $(this).attr("data-test");
				$("#show-info").fadeOut(50, function() {
					$(this).attr('src', list_y);
				}).fadeIn(500);
			});


		});
	</script>

	<script type="text/javascript" src="js/main.js?v=1001"></script>
	<!-- Vendors -->
	<script src="js/jarallax.min.js?v=1001"></script>
	<!-- Template Functions -->
	<script src="js/functions.js?v=1001"></script>

	<!-- <script src="js/lazyload.js?v=1001"></script> -->

	<script src="js/jquery.chocolat.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.view-seventh a').Chocolat();
			$('.view-seventh2 a').Chocolat();
			$('.view-seventh3 a').Chocolat();
		});
	</script>
</body>
</body>

</html>