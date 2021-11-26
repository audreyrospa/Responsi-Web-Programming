<?php
if (isset($_GET['data'])) {
    switch ($_GET['data']) {
      case '0':
        $sql = "SELECT * FROM inventory WHERE category = 'Buildings'";
        break;
      case '1':
      $sql = "SELECT * FROM inventory WHERE category = 'Vehicles'";
        break;
      case '2':
      $sql = "SELECT * FROM inventory WHERE category = 'Office Inventory'";
        break;
      case '3':
      $sql = "SELECT * FROM inventory WHERE category = 'Electronic'";
        break;
      default:
      $sql = "SELECT * FROM inventory";
        break;
    }
} else {
    $sql = "SELECT * FROM inventory";
}

function convert($value) {
    $result = "Rp. " . number_format($value, 2, ',', '.');
    return $result;
}

include "connect.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory | Inventory List</title>
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

?>
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
              List per category
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
  <div class="mt-3 no-gutters top-0 start-50">
        
  </div>

  <form action="add.php" style="padding-bottom:30px">
    <button class="btn btn-dark" style="float:left; background-color:#16174f">+ Add</button>
  </form>

  <center>
  <br>
  <table class="table table-bordered">
        <tr>
            <td> No </td>
            <td> ID  </td>
            <td> Item Name  </td>
            <td> Amount </td>
            <td> Unit </td>
            <td> Coming Date </td>
            <td> Category </td>
            <td> Status </td>
            <td> Unit Price </td>
            <td> Total Price </td>
            <td> action </td>
        </tr>

        <?php
            $number=0;
            $total = 0;

            $result = $connect -> query($sql);
            if ($result -> num_rows > 0) {
                while ($data = $result -> fetch_assoc()) {
            
                $number=$number+1;

        ?>

            <tr>
                <td> <?php echo $number?> </td>
                <td> <?php echo $data['item_id']; ?> </td>
                <td> <?php echo $data['item_name']; ?> </td>
                <td> <?php echo $data['amount']; ?> </td>
                <td> <?php echo $data['unit']; ?> </td>
                <td> <?php echo $data['arrival_date']; ?> </td>
                <td> <?php echo $data['category']; ?> </td>
                <td> <?php echo $data['item_status']; ?> </td>
                <td> <?php echo convert($data['price']); ?> </td>
                <td> <?php echo convert($data['price'] * $data['amount']);?> </td>
                <td><a class="btn btn-dark" href=edit.php?item_id=<?php echo $data['item_id'];?>>edit</a>
                    <a class="btn btn-dark" href=confirmdelete.php?item_id=<?php echo $data['item_id'];?>>delete</a>
                </td>

            <?php 
                    $total = $total + ($data['price'] * $data['amount']);
                }
            }
            ?>
            </tr>

    </table>

    <h1 style="clear:both;margin-left:750px;margin-top:0px;font-size:1.2rem;"><?php echo "Total inventory = " .convert($total); ?></h1>

  </center>

      <!-- Footer -->
      <footer class="text-white p-3 mt-4" style="background-color:#16174f;">
      <div class="row">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Audrey Rosa 2021</p>
        </div>
      </div>
    </footer>

</body>
</html>