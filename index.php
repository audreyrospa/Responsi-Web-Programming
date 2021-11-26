<!DOCTYPE html>
<html>
<head>
    <title>Inventory | Staff Login</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap-->
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="fontawesome/fontawesome-free/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<div class="inventory">
    <h1 class="display-4">List of Inventory</h1>
        <h1 class="display-4">EVERYTHING OFFICE</h1>
</div>

<body id="page-top">
    <?php   
        if(isset($_GET['message'])){
            if($_GET['message'] == "failed") {
                echo "Login failed! username dan password are wrong!";
            } else if ($_GET['message'] == "logout"){
                echo "Succesfully logout";
            } else if($_GET['message'] == "not_login") {
                echo "you need permission to admin page";
            }
        }
    ?>

  <!--Content-->
  <div class="mt-5 no-gutters top-0 start-50">
        
  </div>

<form action="checklogin.php" method="POST">
<div class="container text-black font-weight-bold">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Staff Login</h3>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="input username" name="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="input password" name="password">
					</div>
					<div class="align-items-center remember">
						<input type="checkbox"> Remember Me
					</div>
					<div class="form-group">
            <button type="submit" class="btn float-right btn-dark">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</form>

      <!-- Footer -->
      <footer class="text-white p-3 mt-4" style="position:absolute; bottom: 0px; width:100%; background-color:#16174f;">
      <div class="row">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Audrey Rosa 2021</p>
        </div>
      </div>
    </footer>

</body>
</html>