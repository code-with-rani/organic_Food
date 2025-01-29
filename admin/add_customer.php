<?php 
 
// include 'connection.php'; 
// $sql="SELECT* FROM banner where status=1"; 
// $query=mysqli_query($conn,$sql); 
// $result=array(); 
// while($data=mysqli_fetch_assoc($query)){ 
//   $result[]=$data; 
// } 
 
// echo '<pre>'; 
// print_r($result);die;  
 
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Customer</title>
    <script src="https://kit.fontawesome.com/709be8e8ff.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>


<body>
    <?php include "sidebar.php"?>

    <main style="margin-top: 58px;">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="border-shadow:red">
                        <div class="card-body">
                            <form method="POST" action="action.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">user_name</label>
                                    <input type="text" name="user_name" value="" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" Required>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">password</label>
                                    <input type="number" name="password" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" Required>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>


                                <button type="submit" name="save_cust" value="save_cust"
                                    class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">S NO.</th>
                                        <th scope="col">user_name</th>
                                        <th scope="col">password</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- <php foreach($result as $vl){ 
    ?> 
    <tr> 
      <th scope="row"><?php echo $vl['id'] ?></th> 
      <td><?php echo $vl['cust_name'] ?></td> 
      <td><?php echo $vl['mobile'] ?></td> 
      <td><?php echo $vl['address'] ?></td> 
      <td> <img src="<?php echo $vl['img'] ?>" style="height:50px"></td> 
      <td><button class="btn btn-sm btn-success editbutton" data-toggle="modal" data-target="#myfirstmodal"  
      data-cust_id="<?php echo $vl['id'] ?>" 
      data-cust_name="<?php echo $vl['cust_name'] ?>" 
      data-mobile="<?php echo $vl['mobile'] ?>" 
      data-address="<?php echo $vl['address'] ?>" 
      data-img="<?php echo $vl['img'] ?>"> 
        edit</button> 
          <button class="btn btn-sm btn-danger">delete</button></td> 
    </tr> 
    <php }?> -->


                                    <!-- <tr> 
      <th scope="row">2</th> 
      <td>Suresh</td> 
      <td>6205519975</td> 
      <td>Goa</td> 
    </tr> 
    <tr> 
      <th scope="row">3</th> 
      <td>Mukesh</td> 
      <td>6205519976</td> 
      <td>Delhi</td> 
    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script> 
    -->
    <!-- Modal -->
    <div class="modal fade" id="myfirstmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Customer Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="action.php" enctype="multipart/form-data">

                        <input type="hidden" id="update_id" name="update_id" value="" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" Required>
                        <div class="form-group">
                            <label for="exampleInputEmail1">user_name</label>
                            <input type="text" id="user_name_m" name="user_name" value="" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" Required>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">password</label>
                            <input type="number" id="password_m" name="mobile" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" Required>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>

                        <button type="submit" name="update_cust" value="update_cust"
                            class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<script>
// alert('Adding Customer Details'); 
$(document).ready(function() {

    $('.editbutton').click(function() {
        var user_id = $(this).attr('data-user_id');
        var user_name = $(this).attr('data-user_name');
        // alert(cust_name); 
        var password = $(this).attr('data-password');
        // alert(img) 

        $('#update_id').val(cust_id);
        $('#user_name_m').val(user_name);

        // $('#cust_name_m').val(cust_name); 
        // $('#cust_name_m').val(cust_name); 


        // alert(cust_id); 
        // alert(cust_name); 
        // alert(mobile); 


    });


});
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>


</html>