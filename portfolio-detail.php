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
	<link rel="stylesheet" href="css/page-section.css?v=1001" />
	<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/footer.css?v=1001" />
	<link href="css/slick.min.css?v=1001" rel="stylesheet">
	<link href="css/slick-custom.css?v=1001" rel="stylesheet">

</head>
<?php
require_once('config/bddesign_db.php');
session_start();
?>
<body>
	<main>



		<?php include("header.php");?>
		


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

				<?php include("navigator.php");?>
				<div class="text-center mb-5">
					<div class="page-header ">
						<h2>Monarch, khao-tao</h2>
					</div>
				</div>




				<div class="row align-items-center">

					<div class="col-md-6">



						<img id="show-info" class="img-fluid mb-4" src="upload/portfolio01.webp" width="100%">




						<div class="row portfolio_slick_detail">
							<?php for($i=1;$i<=3;$i++){ ?>
								<div class="col-12">
									<a href="javascript:void(0)" id="list" data-test="upload/portfolio0<?=$i?>.webp"><img class="img-fluid" data-image="original" src="upload/portfolio0<?=$i?>.webp" alt="Monarch, khao-tao"></a>
								</div>
							<?php } ?>       

						</div>

					</div>


					<div class="col-md-6">
						<h3 class="my-4">Construction</h3>

						<table class="table table-bordered">

							<tbody>


								<tr>
									<td class="text-white bg-dark"><b>Project</b></td>

									<td>Monarch, khao-tao</td>

								</tr>


								<tr>
									<td class="text-white bg-dark"><b>Location</b></td>

									<td>Prachuap Khiri Khan</td>

								</tr>


								<tr>
									<td class="text-white bg-dark"><b>Type</b></td>

									<td>Estate</td>

								</tr>


								<tr>
									<td class="text-white bg-dark"><b>Value</b></td>

									<td>96 M</td>

								</tr>




							</tbody>
						</table>

						<p>บริการยื่นขออนุญาต ยื่นกู้ธนาคาร ตลอดจนกระบวนการก่อสร้างที่ได้ มาตรฐานตามหลักวิศวกรรม โดยมีวิศวกรควบคุม มีการรับประกันหลัง ส่งมอบบ้าน แม้ว่าจะเป็นการสร้างบ้านหลังแรกหรือหลังที่เท่าไหร่ เราก็มี ทีมงานคุณภาพที่พร้อมให้คำปรึกษาเหมือนเป็นทีมก่อสร้างของคุณเอง</p>
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

	<script  src="js/lazyload.js?v=1001"></script>

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