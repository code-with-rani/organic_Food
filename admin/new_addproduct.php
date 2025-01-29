<?php 
session_start(); 
if(!isset($_SSSION['email']) && empty($_SESSION['email'])){ 
  header("location:login.php"); 
} 
include 'connection.php';
$sql="SELECT* FROM product where status=1";
$query=mysqli_query($conn,$sql);
$product=array();
while($data=mysqli_fetch_assoc($query)){
  $product[]=$data;
}
 
 
?>

<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

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
    <!--modal-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit recods</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="action.php" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Item Name</label>
                                    <input type="text" name="item_nameEdit" value="" class="form-control"
                                        id="item_nameEdit" aria-describedby="emailHelp" Required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Description</label>
                                    <input type="varchar" name="descEdit" value="" class="form-control" id="descEdit"
                                        aria-describedby="emailHelp" Required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Item Img</label>
                                    <input type="file" name="imgEdit" class="form-control-file" id="imgEdit">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Price</label>
                                    <input type="number" name="priceEdit" class="form-control-file" id="imgEdit">
                                </div>

                                <center><button type="submit" name="save_item" value="save_item"
                                        class="btn btn-primary">update</button></center>

                            </form>
        </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </div>
    </div>
  </div>
    <?php include 'sidebar.php' ?>
    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="border-shadow: red">
                        <div class="card-body">

                            <form method="POST" action="action.php" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Item Name(Fruit/vegitable)</label>
                                    <input type="text" name="item_nameEdit" value="" class="form-control"
                                        id="item_nameEdit" aria-describedby="emailHelp" Required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Description</label>
                                    <input type="varchar" name="descEdit" value="" class="form-control" id="descEdit"
                                        aria-describedby="emailHelp" Required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Item Img</label>
                                    <input type="file" name="imgEdit" class="form-control-file" id="imgEdit">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Price</label>
                                    <input type="number" name="priceEdit" class="form-control-file" id="imgEdit"

                                <center><button type="submit" name="save_item" value="save_item"
                                        class="btn btn-primary">Submit</button></center>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card" style="border-shadow: red">
                        <div class="card-body">
                            <table class="table table-hover" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">S_No</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($product as $vl){
    ?>
                                    <tr>
                                        <th scope="row"><?php echo $vl['id'] ?></th>
                                        <td><?php echo $vl['item_name'] ?></td>
                                        <td><?php echo $vl['desc'] ?></td>
                                        <td><?php echo $vl['price'] ?></td>
                                        <td> <img src="<?php echo $vl['img'] ?>" style="height:50px"></td>
                                        <td><button class="edit btn btn-sm btn-success editbutton" data-toggle="modal"
                                                data-target="#myfirstmodal" data-product_id="<?php echo $vl['id'] ?>"
                                                data-item_name="<?php echo $vl['item_name'] ?>"
                                                data-desc="<?php echo $vl['desc'] ?>"
                                                data-price="<?php echo $vl['price'] ?>">
                                                edit</button>
                                            <!-- <a href="action.php?delid=<?php echo $vl['id'] ?> &Delcust=Delcust"></a> -->
                                            <button class="btn btn-sm btn-danger">delete</button>
                                        </td>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();

});
</script>
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        item_name = tr.getElementsByTagName("td")[0].innerText;
        desc = tr.getElementsByTagName("td")[1].innerText;
        price = tr.getElementsByTagName("td")[2].innerText;
        img= tr.getElementsByTagName("td")[3].innerText;
        console.log(title,desc,price,img);
        item_nameEdit.value = item_name;
        descEdit.value = desc;
        priceEdit.value = price;
        imgEdit.value = img;
       // snoEdit.value = e.target.id;
       // console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })
    </script>

</html>