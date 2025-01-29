<?php 
include 'admin/connection.php';
$sql="SELECT* FROM banner where status=1";
$query=mysqli_query($conn,$sql);

while($data=mysqli_fetch_assoc($query)){
  $result[]=$data;
}

$sql="SELECT* FROM product where status=1";
$query=mysqli_query($conn,$sql);
$product=array();
while($data=mysqli_fetch_assoc($query)){
  $product[]=$data;
}
// print_r($result);die;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>organic:food</title>
    <!--font awesome cdn :css stra rating(w3school.com)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--cdn js:::jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <header class="header">
        <a href="admin/login.php" class="logo"><i class=" img/logo fa fa-shopping-basket"></i> Fresh food</a>
        <nav class="navbar">
            <a href="#home"> home</a>
            <a href="#features">feature</a>
            <a href="#products">products</a>
            <a href="#categories"> categories</a>
            <a href="admin/contactus.php">contact-us</a>
        </nav>

        <div class="icons">
            <div class="fa fa-bars" id="menu-btn"></div>
            <a href="search.php">
                <div id="search-btn" class="fa fa-search"> </div>
            </a>
            <div class="fa fa-shopping-cart" id="cart-btn"></div>

            <?php if((!isset($_SESSION['custid']) || empty($_SESSION['custid']))){ ?>

            <div class="fa fa-user" id="login-btn" data-toggle="modal" data-target="#userslogin"></div>
            <?php }else{ ?>
            <div class="fa fa-truck" id="cart-btn" type="button" data-toggle="modal" data-target="#order_window"></div>

            <a href="user_logout.php">
                <div class=" fa  fa-right-from-bracket"> </div>

            </a>
            <span id="showemail" style="color:#10acea;"> Welcome <?php echo $cust_name ?></span>

            <?php }?>
        </div>
        
        

    </header>

    <!--banner section-->
    <div id="carouselExampleIndicators"  class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <?php $i=0; foreach($result as $vl){ $i++;
        if($i==1){ ?>
  <div class="carousel-item active">
  <img src="admin/<?php echo $vl['banner_image'] ?>" alt="...">
  <div class="carousel-caption d-none d-md-block">
    <h1><?php echo $vl['banner_name'] ?></h1>
    <p><?php echo $vl['banner_desc'] ?></p>
  </div>
</div>
<?php }else{ ?>
    <div class="carousel-item ">
  <img src="admin/<?php echo $vl['banner_image'] ?>" alt="...">
  <div class="carousel-caption d-none d-md-block">
    <h1><?php echo $vl['banner_name'] ?></h1>
    <p><?php echo $vl['banner_desc'] ?></p>
  </div>
</div>
<?php }} ?>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   

    <!--product section-->
    <section class="products" id="products">
        <h1 class="heading"><span>Products</span></h1>
        <div class="package-content">

        <?php foreach($product as $vll){ ?>
            <div class="box">
                <div class="thum">
                    <img src="admin/<?php echo $vll['img'] ?>">
                </div>
                <div class="dest-content">
                    <div class="location">
                        <h3><?php echo $vll['item_name'] ?></h3>
                        <p>Rs: <?php echo $vll['price'] ?></p>
                        <button data-pname="<?php echo $vll['item_name'] ?>" data-pprice="<?php echo $vll['price'] ?>" class="btn btn-success buyk" data-toggle="modal" data-target="#buynow">Buy Now</button>

                        <div class="stars">
                            <a href="#"><i class='bx bxs-star'></i></a>
                            <a href="#"><i class='bx bxs-star'></i></a>
                            <a href="#"><i class='bx bxs-star'></i></a>
                            <a href="#"><i class='bx bxs-star'></i></a>
                            <a href="#"><i class='bx bxs-star'></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

           

        </div>
    </section>

    <section class="features" id="features">
        <h1 class="heading"> <span>Features</span></h1>

        <div class="box-container">
            <div class="box">
                <img src="img/feature.png">
                <h3>fresh and organic</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
            <div class="box">
                <img src="img/payment.jpg">
                <h3>Easy & Simple Payment</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
            <div class="box">
                <img src="img/feature_delivery.png">
                <h3>free dilivery</h3>
                <a href="#" class="btn">Shop Now</a>
            </div>
        </div>

    </section>

    <!--product categories-->
    <Section class="categories" id="categories">
        <h1 class="heading"><span>categories</span></h1>
        <div class="box-container">
            <div class="box">
                <img src="img/veg.jpg">
                <h3>vegetables</h3>
                <p>upto 50% off</p>
                <a href="#products" class="btn">shop now</a>
            </div>

            <div class="box">
                <img src="img/fruites.jpg">
                <h3>fresh fruits</h3>
                <p>upto 50% off</p>
                <a href="#products" class="btn">shop now</a>
            </div>

            <div class="box">
                <img src="img/health.jpeg">
                <h3>Dry Fruits</h3>
                <p>upto 50% off</p>
                <a href="#products" class="btn">shop now</a>
            </div>

            <div class="box">
                <img src="img/daily_use.webp">
                <h3>daily products</h3>
                <p>upto 50% off</p>
                <a href="#products" class="btn">shop now</a>
            </div>
        </div>
    </Section>

    

    <!--footer section-->
    <Section class="footer" id="footer">
        <div class="box-container">
            <div class="box">
                <h3>Fresh food<i class="fa fa-shopping-basket"></i></h3>
                <p>feel free to follow us on our social media handies all the links are given below...</p>

                <div class="share">
                    <a href="https://facebook.com/ujjwalraj" class="fa fa-facebook"></a>
                    <a href="https://google.com" class="fa fa-google"></a>
                    <a href="https://instagram.com/iamstrangerforyou" class="fa fa-instagram"></a>
                    <a href="https://twitter.com" class="fa fa-twitter"></a>
                </div>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#" class="links"><i class="fa fa-phone"></i>+91 8586742390</a>
                <a href="#" class="links"><i class="fa fa-phone"></i>+91 5638908900</a>
                <a href="#" class="links"><i class="fa fa-envelope"></i>sneharani@gmail.com</a>
                <a href="#" class="links"><i class="fa fa-map-marker"></i>chatra,jharkhand india</a>
            </div>

            <div class="box">
                <h3>Quick Links</h3>
                <a href="#" class="links"><i class="fa fa-arrow-right"></i>home</a>
                <a href="#" class="links"><i class="fa fa-arrow-right"></i>features</a>
                <a href="#" class="links"><i class="fa fa-arrow-right"></i>products</a>
                <a href="#" class="links"><i class="fa fa-arrow-right"></i>categories</a>
                <a href="#" class="links"><i class="fa fa-arrow-right"></i>team</a>
            </div>
        </div>

    </Section>
    <!-- Modal -->
<div class="modal fade" id="buynow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="admin/action.php" enctype="multipart/form-data">

<div class="form-group">
    <label for="exampleInputEmail1">Item Name(Fruit/vegitable)</label>
    <input type="text" name="item_name" value="" class="form-control"
        id="pname_m" aria-describedby="emailHelp" Required readonly>
</div>


<div class="form-group">
    <label for="exampleFormControlFile1">Price</label>
    <input type="number" name="price" class="form-control-file" id="pprice_m" readonly="readonly">
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Enter QTY</label>
    <input type="number" name="qty" class="form-control-file" id="BannerImage" required>
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Total</label>
    <input type="number" name="total" class="form-control-file" id="BannerImage" required>
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">customer name</label>
    <input type="text" name="customer" class="form-control-file" id="BannerImage" required>
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">mobile</label>
    <input type="text" name="mobile" class="form-control-file" id="BannerImage" required>
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">address</label>
    <input type="text" name="address" class="form-control-file" id="BannerImage" required>
</div>

<center><button type="submit" name="place_order" value="place_order"
        class="btn btn-primary">place Order</button></center>

</form>
      </div>
      
  </div>
</div>
</body>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {

$('.buyk').click(function() {
    var pname = $(this).attr('data-pname');
    var pprice = $(this).attr('data-pprice');
//    alert(pprice);

    $('#pname_m').val(pname);
    $('#pprice_m').val(pprice);

 


});


});
    </script>

</html>