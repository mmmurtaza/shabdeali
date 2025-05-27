<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link"  href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="others.php">Others</a>
  </li>
<?php 
if (isset($_SESSION['loggedin']) || @$_SESSION['loggedin'] == true) { ?>

  <li class="nav-item">
    <a class="nav-link" href="addnew.php">Add New</a>
  </li>

<?php } ?>
  <li class="nav-item">
		<div class="nav-link ">
			
			<?php 
			if (isset($_SESSION['loggedin']) || @$_SESSION['loggedin'] == true) {
				echo '<a href="logout.php">';
				echo $_SESSION['name']; ?>
			<img style="vertical-align: top;" class="img-fluid" src="<?php echo $_SESSION['picture'];?>" alt="" srcset=""></a>
			<?php } else { ?>
				<button type="button" class="btn btn-success"
					onclick="window.location.href='login.php'">
					Login with Google
				</button>
			<?php } ?>
		</div>
  </li>
</ul>