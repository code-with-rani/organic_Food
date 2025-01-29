<?php 
session_start(); 
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){ 
  header("location:login.php"); 
} 
include 'connection.php';
$sql="SELECT* FROM orders where status=1";
$query=mysqli_query($conn,$sql);

while($data=mysqli_fetch_assoc($query)){
  $result[]=$data;
}
 
 
?> 
 
<html> 
 
<head> 
    <title>dashboard</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> 
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    
</head> 
<style> 
body { 
    background-color: #fbfbfb; 
} 
 
@media (min-width: 991.98px) { 
    main { 
        padding-left: 240px; 
    } 
} 
 
/* Sidebar */ 
.sidebar { 
    position: fixed; 
    top: 0; 
    bottom: 0; 
    left: 0; 
    padding: 58px 0 0; 
    /* Height of navbar */ 
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%); 
    width: 240px; 
    z-index: 600; 
} 
 
@media (max-width: 991.98px) { 
    .sidebar { 
        width: 100%; 
    } 
} 
 
.sidebar .active { 
    border-radius: 5px; 
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%); 
} 
 
.sidebar-sticky { 
    position: relative; 
    top: 0; 
    height: calc(100vh - 48px); 
    padding-top: 0.5rem; 
    overflow-x: hidden; 
    overflow-y: auto; 
} 
</style> 
 
<body> 
    <?php include 'sidebar.php' ?> 
    <!--Main layout--> 
    <main style="margin-top: 58px;"> 
        <div class="container pt-4">
        <div class="row">
                
                <div class="col-md-12">
                    <div class="card" style="border-shadow: red">
                        <div class="card-body">
                            <table class="table table-hover" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">S_No</th>
                                        <th scope="col">Customer name</th>
                                        <th scope="col">mobile</th>
                                        <th scope="col">address</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">qty</th>
                                        <th scope="col">total</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $vl){
    ?>
                                    <tr>
                                        <th scope="row"><?php echo $vl['id'] ?></th>
                                        <td><?php echo $vl['customer'] ?></td>
                                        <td><?php echo $vl['mobile'] ?></td>
                                        <td><?php echo $vl['address'] ?></td>
                                        <td><?php echo $vl['item_name'] ?></td>
                                        <td><?php echo $vl['price'] ?></td>
                                        <td><?php echo $vl['qty'] ?></td>
                                        <td><?php echo $vl['total'] ?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

</body>

<!-- Js cdn -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
</script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function () {
      $('#myTable').DataTable();

    });
    </script>
</html>