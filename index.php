<?php 
require_once 'functions.php';
session_start();
if (isset($_SESSION['loggedin']) || @$_SESSION['loggedin'] == true) {
	$_SESSION['authorized'] = is_authorized($_SESSION['email'], $_SESSION['name'], $_SESSION['picture']);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>


	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Nastaliq Urdu">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">

    <link rel="stylesheet" href="qasaid.css">



    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/13.0.1/markdown-it.min.js"
        integrity="sha512-SYfDUYPg5xspsG6OOpXU366G8SZsdHOhqk/icdrYJ2E/WKZxPxze7d2HD3AyXpT7U22PZ5y74xRpqZ6A2bJ+kQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/markdown-it-attrs@4.1.4/markdown-it-attrs.browser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>

	<style>
		#arabic {
			font-family: Amiri;
			direction: rtl;
    		font-size: 1.2rem;
		}
		#lisan {
			font-family: kanzalmarjaan;
			direction: rtl;
    		font-size: 1.2rem;
		}
		#urdu {
			font-family: Noto Nastaliq Urdu;
			direction: rtl;
    		font-size: 1.2rem;
		}
	</style>
</head>
<body>


	<div class="container-xl col-lg-8 mx-auto p-3 py-md-5">

		<header class="d-flex align-items-center pb-3 mb-5 border-bottom">
		    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
		      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
		      <span class="fs-4">Shaikh Abdeali Shaikh Qamruddin Madarwala</span>
		    </a>
		</header>
<?php include 'nav.php'; ?>

		<div class="row">
			<div class="col-md-12 col-sm-12 my-3">
				<div class="card" id="lisan">
				  <div class="card-header">
				    Featured
				  </div>

				  <?php echo getFeaturedLinks(); ?>


				</div>
			</div>
		</div>
		<!-- /row -->


		<div class="row">
			<div class="col-md-4 col-sm-12 my-3">
				<div class="card" id="arabic">
				  <div class="card-header">
				    Arabi
				  </div>
				  		<?php echo getArabiLinks(); ?>

				</div>
			</div>
			<div class="col-md-4 col-sm-12 my-3">
				<div class="card" id="lisan">
				  <div class="card-header">
				    Lisan ud Dawat
				  </div>

				  	<?php echo getLSDLinks(); ?>


				</div>
			</div>
			<div class="col-md-4 col-sm-12 my-3">
				<div class="card" id="urdu">
				  <div class="card-header">
				    Urdu
				  </div>

				  	<?php echo getURDLinks(); ?>

				</div>
			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
	
</body>
</html>