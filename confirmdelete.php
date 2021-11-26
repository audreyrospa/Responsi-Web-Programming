<!DOCTYPE html>
<html>
<head>
    <title>Delete Confirmation</title>
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
    <h1 class="display-4" >List of Inventory</h1>
    <h1 class="display-4">EVERYTHING OFFICE</h1>
</div>

<body id="page-top">
    
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg mt-0 navbar-light" style="background-color: #C2D4D8">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="homepage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inventorylist.php">List of Inventory</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              List per Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="inventorylist.php?data=0">Buildings</a></li>
              <li><a class="dropdown-item" href="inventorylist.php?data=1">vehicles</a></li>
              <li><a class="dropdown-item" href="inventorylist.php?data=2">Office Inventory</a></li>
              <li><a class="dropdown-item" href="inventorylist.php?data=3">Electronic</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <form action="logout.php" style="padding-right:20px">
        <button style="align:right" class="btn btn-dark">Logout</button>
      </form>
    </div>
  </nav>

  <!--Content-->
  <div class="container">
    <div class="card">
    <?php
        include "connect.php";
        $item_id =$_GET['item_id'];
        $query=mysqli_query($connect,"SELECT * FROM inventory WHERE item_id = '$item_id'");
        $data=mysqli_fetch_array($query);
    ?>
        <br>
        <div style="background-color:#16174f">
            <h3 class="text-center text-white">Delete Data inventory</h3>
        </div>
        <p>Are You Sure to Delete <?php echo " " . $data['nama_barang'] . " ?<br>" ?> </p>
        <br>
            <div class="text-right">
                <a class="btn btn-dark" href=delete.php?item_id=<?php echo $data['item_id'];?> role="button">Delete</a>
                <?php echo " " ?>
                <a type="reset" class="btn btn-dark" href="inventorylist.php" role="button">Cancel</a>
            </div>
        <br>
    </div>
   </div>

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