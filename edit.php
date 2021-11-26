<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Inventory</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap-->
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="fontawesome/fontawesome-free/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>

<div class="Inventory">
    <h1 class="display-4">List of Inventory</h1>
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
            <a class="nav-link" href="inventorylist.php">Inventory List</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              List per Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="inventorylist.php?data=0">Buildings</a></li>
              <li><a class="dropdown-item" href="inventorylist.php?data=1">Vehicles</a></li>
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
  <div class="mt-5 no-gutters top-0 start-50">
        
  </div>

  <?php
        include 'connect.php';
        $item_id = $_GET['item_id'];
        $data = mysqli_query($connect, "SELECT * FROM Inventory WHERE item_id='$item_id'");
        while ($result = mysqli_fetch_array($data)) {
    ?>

    <br>
    <div class="container">
        <div style="background-color:#16174f">
            <h3 class="text-center text-white">Change Data Inventory</h3>
        </div>
    </div>
    <br>

    <div class="container">
      <form method="POST" action="editprocess.php">
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>Item ID</label>
                </div>
                <div class="col-md-2">
                    <input type="text" name="item_id" class="form-control" value="<?php echo $result['item_id'];?>">
                </div>
            </div>
        </div>

        <div class="form-group">
       <div class="row">
        <div class="col-md-3">
          <label>Item Name</label>
        </div>
          <div class="col-md-5">
            <input type="text" name="item_name" class="form-control" value="<?php echo $result['item_name'];?>">
          </div>
      </div>
    </div>

  <div class="form-group">
       <div class="row">
        <div class="col-md-3">
          <label>Amount</label>
        </div>
          <div class="col-md-5">
            <input type="text" name="amount" class="form-control" value="<?php echo $result['amount'];?>">
          </div>
      </div>
    </div> 
    
  <div class="form-group">
       <div class="row">
        <div class="col-md-3">
          <label>Unit</label>
        </div>
          <div class="col-md-5">
            <input type="text" name="Unit" class="form-control" value="<?php echo $result['Unit'];?>">
          </div>
      </div>
    </div> 
    

    <div class="form-group">
       <div class="row">
        <div class="col-md-3">
          <label>Arrival Date</label>
        </div>
          <div class="col-md-2">
            <input type="text" name="arrival_date" class="form-control" value="<?php echo $result['arrival_date'];?>">
          </div>
      </div>
    </div>

    <div class="form-group">
       <div class="row">
        <div class="col-md-3">
          <label>Category</label>
        </div>
          <div class="col-md-2">
            <select class="form-select" name="category">
                <?php
                $category = ["Buildings", "Vehicles", "Office Inventory", "Electronic"];
                $i=0;

                foreach($category as $value) {
                     echo "<option value=\"" . $category[$i] . "\" ";
                       if($value == $result['category']) echo "selected";
                          echo ">". $category[$i]."</option>";
                          $i = $i+1;
                        }
                 ?>
            </select>
          </div>
      </div>
    </div>

    <div class="form-group">
       <div class="row">
        <div class="col-md-3">
          <label>Status</label>
        </div>
          <div class="col-md-2">
            <input type="text" name="item_status" class="form-control" value="<?php echo $result['item_status'];?>">
          </div>
      </div>
    </div>

    <div class="form-group">
       <div class="row">
        <div class="col-md-3">
          <label>Unit Price</label>
        </div>
          <div class="col-md-2">
            <input type="text" name="price" class="form-control" value="<?php echo $result['price'];?>">
          </div>
      </div>
    </div>
    <br>
    
    <center>
    <input type="submit" class="btn btn-primary" name="submit" value="Ubah">
    <a type="reset" class="btn btn-dark" href="inventorylist.php" role="button">Cancel</a>
    </center>

    <?php } ?>

    </form>
    </div>
  

      <!-- Footer -->
      <footer class="text-white p-3 mt-4" style="background-color:#16174f">
      <div class="row">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Audrey Rosa 2021</p>
        </div>
      </div>
    </footer>

</body>
</html>