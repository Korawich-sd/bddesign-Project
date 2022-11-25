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
if (isset($_GET['blog'])) {
	$blog = $_GET['blog'];
	$blog_detail = $conn->prepare("SELECT * FROM blog WHERE id = :id");
	$blog_detail->bindParam(":id", $blog);
	$blog_detail->execute();
	$detail_blog = $blog_detail->fetch(PDO::FETCH_ASSOC);
}
?>
<style>
	.img-none {
		display: none;
	}
</style>

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


				<h4><?= $detail_blog["title_blog"] ?></h4>

				<span class="text-dark mb-4 d-inline-block">
					<?php
					$dateTime = $detail_blog["created_blog"];
					$splitTime = explode(" ", $dateTime);
					$date = $splitTime[0];
					echo $date;
					?>
				</span>
				<p><?= $detail_blog["paragraph1"] ?></p>
				<p><?= $detail_blog["paragraph2"] ?></p>
				<p><?= $detail_blog["paragraph3"] ?></p>
				<div class="row mt-4">
					<?php
					//ตัดนามสกุลไฟล์
					$row_img1 = explode(".", $detail_blog["blog_img1"]);
					$row_img2 = explode(".", $detail_blog["blog_img2"]);
					$row_img3 = explode(".", $detail_blog["blog_img3"]);
					?>
					<div class="col-6 col-md-4">
						<div class="view-seventh mb-4">
							<a href="webpanel/assets/blog_upload/<?= $detail_blog["blog_img1"] ?>" class="b-link-stripe b-animate-go thickbox" title="7 วัสดุปูพื้นเลือกยังไงให้เหมาะกับบ้านคุณ">
								<div class="box-gallery">
									<div class="bg-img <?php if ($row_img1[1] == null) {echo 'img-none';} ?>">
										<img class="img-fluid" src="webpanel/assets/blog_upload/<?= $detail_blog["blog_img1"] ?>" alt="7 วัสดุปูพื้นเลือกยังไงให้เหมาะกับบ้านคุณ">
									</div>

								</div>
							</a>
						</div>
					</div>
					<div class="col-6 col-md-4">
						<div class="view-seventh mb-4">
							<a href="webpanel/assets/blog_upload/<?= $detail_blog["blog_img2"] ?>" class="b-link-stripe b-animate-go thickbox" title="7 วัสดุปูพื้นเลือกยังไงให้เหมาะกับบ้านคุณ">
								<div class="box-gallery">
									<div class="bg-img <?php if ($row_img2[1] == null) {echo 'img-none';} ?>">															
										<img class="img-fluid" src="webpanel/assets/blog_upload/<?= $detail_blog["blog_img2"] ?>" alt="7 วัสดุปูพื้นเลือกยังไงให้เหมาะกับบ้านคุณ">
									</div>

								</div>
							</a>
						</div>
					</div>
					<div class="col-6 col-md-4">
						<div class="view-seventh mb-4">
							<a href="webpanel/assets/blog_upload/<?= $detail_blog["blog_img3"] ?>" class="b-link-stripe b-animate-go thickbox" title="7 วัสดุปูพื้นเลือกยังไงให้เหมาะกับบ้านคุณ">
								<div class="box-gallery">
									<div class="bg-img <?php if ($row_img3[1] == null) {echo 'img-none';} ?>">
										<img class="img-fluid" src="webpanel/assets/blog_upload/<?= $detail_blog["blog_img3"] ?>" alt="7 วัสดุปูพื้นเลือกยังไงให้เหมาะกับบ้านคุณ">
									</div>

								</div>
							</a>
						</div>
					</div>
				</div>
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



	<script type="text/javascript" src="js/main.js?v=1001"></script>
	<!-- Vendors -->
	<script src="js/jarallax.min.js?v=1001"></script>
	<!-- Template Functions -->
	<script src="js/functions.js?v=1001"></script>

	<script src="js/lazyload.js?v=1001"></script>

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