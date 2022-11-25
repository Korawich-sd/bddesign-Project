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
	<link href="css/bootstrap.min.css?v=1001" rel="stylesheet" >

	<link rel="stylesheet" href="css/coreNavigation.css?v=1001" />
	<link rel="stylesheet" href="css/typography.css?v=1001" />
	<link rel="stylesheet" href="css/custom.css?v=1001" />
	<link rel="stylesheet" href="css/header.css?v=1001" />
	<link rel="stylesheet" href="css/slide.css?v=1001" />
	<link rel="stylesheet" href="css/service-section.css?v=1001" />
	<link rel="stylesheet" href="css/about-section.css?v=1001" />
	<link rel="stylesheet" href="css/portfolio-section.css?v=1001" />
	<link rel="stylesheet" href="css/blog-section.css?v=1001" />

	<link rel="stylesheet" href="css/footer.css?v=1001" />
	<link href="css/slick.min.css?v=1001" rel="stylesheet">
	<link href="css/slick-custom.css?v=1001" rel="stylesheet">

</head>
<body>
	<main>



		<?php include("header.php");?>
		<?php include("slide.php");?>


		<section id="service-section">
			<div class="container-xxl">
				<div class="text-center">
					<div class="box-head mb-5">
						<img class="img-fluid" src="images/service-icon.webp">
						<h2>บริการ</h2>
					</div>
				</div>





				<?php $Service = array ( 
					'1'=>"รับเขียนแบบบ้าน<br>ออกแบบบ้าน", 
					'2'=>"รับสร้างบ้าน – ปรับปรุงบ้าน", 
					'3'=>"ปรึกษาและประเมินราคา"
				); ?>

				<div class="row justify-content-center">


					<?php for($i=1;$i<=3;$i++){ ?> 
						<div class="col-md-6 col-lg-4">
							<a href="service-detail.php" class="item-service">
								<div class="service-img">
									<img class="lazy img-fluid" data-src="upload/service0<?=$i?>.webp" alt="<?= $Service[$i] ?>">
								</div>
								<div class="service-text">
									<h4><?= $Service[$i] ?></h4>
								</div>
							</a>
						</div>
					<?php } ?>




				</div>






			</div>
		</section>



		<section id="about-section" class="bg-parallax" style="background:url(images/about-section.webp) no-repeat top center; background-size:cover;">
			<div class="container-xxl">
				<div class="text-center">
					<div class="box-head mb-5">
						<img class="lazy img-fluid" data-src="images/about-icon.webp">
						<h2>เกี่ยวกับเรา</h2>
					</div>
				</div>


				<div class="text-center">
					<p>Busines Development And Design มีทีมงานผู้เชี่ยวชาญมากประสบการณ์ด้านงานบริการรับสร้างบ้าน<br class="d-none d-lg-block">
						ออกแบบบ้าน และเขียนแบบบ้าน เรามุ่งเน้นให้บริการดูแลลูกค้าอย่างครบวงจร ดำเนินการทุกขั้นตอนอย่างใส่ใจ<br class="d-none d-lg-block">
					มีมาตรฐาน เพื่อส่งมอบผลงานบ้านคุณภาพให้แก่คุณพร้อมการรับประกันโครงสร้างบ้านนานถึง 20 ปี</p>


					<p>บริษัทรับสร้างบ้านในกรุงเทพฯ ปริมณฑล และต่างจังหวัด ที่พร้อมเข้าสำรวจหน้างาน ประเมินราคา และให้คำปรึกษา<br class="d-none d-lg-block">
					เกี่ยวกับการออกแบบก่อสร้างบ้านครบวงจร ติดต่อเราเพื่อขอรับคำแนะนำได้เลย</p>
				</div>



			</div>
		</section>











		<section id="portfolio-section">
			<div class="container-xxl">
				<div class="text-center">
					<div class="box-head mb-5">
						<img class="img-fluid" src="images/portfolio-icon.webp">
						<h2>ผลงาน</h2>
					</div>
				</div>






				<div class="row justify-content-center portfolio_slick">


					<?php for($ii=1;$ii<=3;$ii++){ ?> 
						<?php for($i=1;$i<=3;$i++){ ?> 
							<div class="col-md-6 col-lg-4">
								<a href="portfolio-detail.php" class="item-portfolio">
									<div class="portfolio-img">
										<img class="lazy img-fluid" data-src="upload/portfolio0<?=$i?>.webp" alt="Monarch, khao-tao">
									</div>
									<div class="portfolio-text">
										<h4>Monarch, khao-tao</h4>
									</div>
								</a>
							</div>
						<?php } ?>
					<?php } ?>




				</div>

				<div class="text-center mt-5">

					<a href="portfolio.php" class="btn btn-info btn-lg rounded-pill px-5">ดูทั้งหมด >></a>

				</div>


			</div>
		</section>




		<section id="blog-section" class="bg-parallax" style="background:url(images/blog-section.webp) no-repeat top center; background-size:cover;">
			<div class="container-xxl">
				<div class="text-center">
					<div class="box-head mb-5">
						<img class="img-fluid" src="images/blog-icon.webp">
						<h2>บทความ</h2>
					</div>
				</div>


				<div class="row">


					<?php for($i=1;$i<=3;$i++){ ?> 
						<div class="col-md-6 col-lg-4">
							<a href="blog-detail.php" class="item-blog">
								<div class="blog-img">
									<img class="lazy img-fluid" data-src="upload/blog0<?=$i?>.webp" alt="Monarch, khao-tao">
								</div>
								<div class="blog-text">
									<h4>7 วัสดุปูพื้นเลือกยังไงให้เหมาะกับบ้านคุณ</h4>
									<p>นอกจากจะมีบ้านที่สวยแล้ว การเลือกพื้นบ้าน ก็เป็นสิ่งสำคัญ
										แถมยังจะช่วยทำให้บ้านดูมีเสน่ห์ สวยงาม สะดุดตา ปัจจุบัน
										วัสดุที่ใช้ในการปูพื้นมีอยู่หลายชนิดหลายแบบให้เลือกใช้ ซึ่ง
									แต่ละชนิดมีคุณสมบัติที่แตกต่างกันออกไป...</p>

									<div class="row">
										<div class="col-6 text-start">
											02/05/2555
										</div>
										<div class="col-6 text-end">
											อ่านทั้งหมด >>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>





				</div>

			</div>
		</section>




	</main>





	<?php include("footer.php");?>


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
			'load': function () {

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

	<script  src="js/lazyload.js?v=1001"></script>
</body>
</body>
</html>