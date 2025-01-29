<?php  include 'admin/connection.php';
   session_start();
   if(isset($_SESSION['custid'])){     
  
    $cust_name=$_SESSION['custname'];
$custemail=$_SESSION['custemail'];
$cust_id= $_SESSION['custid'];
// print_r($_SESSION);die;

$sql="SELECT SUM(total_price) as totalsub FROM cart WHERE customer_id=$cust_id and status=1 and product_id!=0";
$query=mysqli_query($conn,$sql);

$carttotal=mysqli_fetch_assoc($query);
 

$sql="SELECT * FROM cart where status=1";
$query = mysqli_query($conn,$sql);

 while($data=mysqli_fetch_assoc($query)){
   $cart[]=$data;


 }  



}

$sql="SELECT * FROM additem where status=1";
$query = mysqli_query($conn,$sql);

while($data=mysqli_fetch_assoc($query)){
    $item[]=$data;
}
 

 ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>search food</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
         integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">



     <!--cdn js:::jquery-->

     <style>
     #logviacart {
         margin-top: 26px;
     }

     #input_box {

         height: 35px;
         width: 75%;
         font-size: 12px;
         border: 2px solid green;
         border-radius: 11px;
         padding: 17px;

     }

     .imageempty {
         height: 260px;
         margin-left: 25%;
     }

     #stiker {
         position: absolute;
         left: 73px;
         top: -13px;
     }

     #search_btn {

         height: 37px;
         width: 21%;
         font-size: 10px;
         border: 2px solid green;
         border-radius: 11px;
          text-align:center;
         color: white;
         background: green;
     }

     .btnn {
         border: .2rem solid var(--black);
         margin-top: 1rem;
         display: inline-block;
         padding: .8rem 3rem;
         font-size: 2.5rem;
         border-radius: .5rem;
         color: var(--black);
         cursor: pointer;
         background-color: none;
         text-align: center;
     }

     #search_btn:hover {

         background: white;
         color: green;
     }

     .withoutlogincart {
         text-align: center;

         margin-top: 16%;
         font-size: 20px;

     }

     .btn {
         position: relative;
         top: 0;
         left: 0;
         width: 100px;
         height: 40px;
         background: linear-gradient(to right, #2196f3, #e91e63);
         box-shadow: 0 2px 10px rgba(0, 0, 0, .4);
         font-size: 16px;
         color: #fff;
         font-weight: 500;
         cursor: pointer;
         border-radius: 5px;
         border: none;
         outline: none;
     }
     </style>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
         integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 </head>

 <body>
     <header class="header" style="padding:2rem 6%;">
         <a href="admin/login.php" class="logo"><i class="fa fa-shopping-basket fa-shake"></i> 
         <!-- <img src="admin/logo.png"
                 alt="FRESHFOOD" style="max-width:180px;width:24vw;"> -->
             <!--font awesome 4 icons-->
         </a>
          
         <span style="width:53%;">
             <form method="post" style="text-align:center;">
                 <input type="textbok" name="input" id="input_box" placeholder="find something ? type here..." Required>
                 <input type="submit" value="Search" name="submit" id="search_btn">
             </form>
         </span>

         <div class="icons">

               <a href="index.php"><div class="fa-solid fa-house"></div></a> 
             <div class="fa fa-shopping-cart" id="cart-btn"></div>

             <?php if((!isset($_SESSION['custid']) || empty($_SESSION['custid']))){ ?>

             <div class="fa fa-user" id="login-btn" data-toggle="modal" data-target="#userslogin"></div>
             <?php }else{ ?>
             
             <a href="user_logout.php">
                 <div class=" fa  fa-right-from-bracket"> </div>

             </a>
             <span id="showemail" style="color:#10acea;font-size:.75vw;"> Welcome <?php echo $cust_name ?></span>

             <?php }?>
         </div>



         <div class="shopping-cart">

             <?php  
            if(isset($_SESSION['custid'])){ 
                 foreach($cart as $vl)  
              if($cust_id== $vl['customer_id'] && $vl['product_price']!=0) {  ?>
             <div class="box">
                 <?php foreach($item as $vc) 
                   
               
               if($vc['product_id']== $vl['product_id']) { ?>

                 <a href="admin/action.php?delid=<?php echo $vl['id']?>&Delcart=Delcart"> <i
                         class="fa fa-trash"></i></a>
                 <img src="admin/<?php echo $vc['img'] ?>">
                 <div class="content">
                     <h3><?php echo $vc['p_name']  ?></h3>
                     <span class="price" id="prisse" style="color:green;"> <?php echo $vc['price'];  ?> </span>
                     <span class="quantity" style="font-size: 10px;"> <?php echo $vl['quantity'] ?> kg

                     </span>
                     <input readonly name="breakup" value="rs<?php echo $vl['total_price']?>" id="brokup"
                         style="width:58px;border:none;margin-left:4px;">
                 </div>
                 <?php } ?>
             </div>
             <?php } ?>

             <?php  if($carttotal['totalsub']!="" || $carttotal['totalsub']!=0){?>
             <div class="total"> total amount: <?php echo $carttotal["totalsub"] ?> </div>
             <a href="user/orderd.php" class="btn">order confirm </a>
             <?php }else{ ?>
             <div class="btnn">YOUR CART IS EMPTY NOW </div>
             <div class="imageemptyt" style="margin-top:15px ;"><img class="imageempty" src="image/empty.png" alt="">
             </div>
             <?php } ?>


             <?php } else {?>
             <div class="withoutlogincart"> <span class="loginviacart">hey! you forget to login ?</span>
                 <span><img class="png" src="admin/smilyy.png" alt="" style="height:150px;margin-top:10px;"></span>
                 <a type="button" class="btn" data-toggle="modal" data-target="#userslogin" id="logviacart"
                     style="margin-top: 15px;">Login</a>
             </div>
             <?php }?>
         </div>




     </header>

     <!-- product section  -->

     <section class="products mt-5" id="products" style="padding-top:75px;">
         <h1 class="heading"><span>Products</span></h1>



         <div class="swiper product-slider">

          <div class="swiper-wrapper"> 
                  <div class="swiper-slide box" id="fruitt">  
                     <div class="container">
                         <div class="row">


                             <?php     if(isset($_POST['submit'])){
                    $str=mysqli_real_escape_string($conn,$_POST['input']);
                    $sql="SELECT * FROM additem where p_name like '$str%'   or p_cotegory like '$str%' and status=1";
                    $res=mysqli_query($conn,$sql); ?>

                  <?php  if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){ ?>
                        
                             <div class="col mt-5" style="text-align: center;">


                                 <?php if(isset($_SESSION['custid'])) { ?>

                                 <form action="admin/action.php" method="post">
                                 <?php } ?>

                                     <input name="product_id" value="<?php echo $row['product_id'] ?>" hidden />
                                     <p id="stiker"
                                         style="background-color:green; color:white;border-radius: 16px;width:40px;">
                                         <?php echo $row['p_cotegory']?></p>
                                     <img style="height:120px;width:120px; border-radius:4px; padding: 6px;
border: 1px solid #ccc;" src="admin/<?php echo $row['img']?>">
                                     <h1 style="font-size:20px;"><?php echo $row['p_name']?> </h1>
                                     <div class="price"><input type="text" hidden name="product_price"
                                             value="<?php echo $row['price']?>" /> <?php echo $row['price']?>
                                         /<?php echo $row['scale']?>

                                     </div>
                                     <div>
                                         <?php if($row['scale']!="pis"  ){ ?>
                                         <select name="qtyy" id="quantityy">


                                             <option value=".5">half <?php echo $row['scale']?></option>
                                             <option value="1">1 <?php echo $row['scale']?></option>
                                             <option value="1.5">1.5 <?php echo $row['scale']?></option>
                                             <option value="2">2 <?php echo $row['scale']?></option>
                                             <option value="2.5">2.5 <?php echo $row['scale']?></option>
                                             <option value="5">5 <?php echo $row['scale']?></option>

                                         </select>
                                         <?php }else   {?>
                                         <select name="qtyy">
                                             <option value="1">1 <?php echo $row['scale']?></option>

                                             <option value="2">2 <?php echo $row['scale']?></option>
                                             <option value="3">3 <?php echo $row['scale']?></option>
                                             <option value="4">4 <?php echo $row['scale']?></option>
                                             <option value="5">5 <?php echo $row['scale']?></option>
                                             <option value="10">10 <?php echo $row['scale']?></option>

                                         </select>
                                         <?php }  ?>

                                     </div>

                                     <?php if(isset($_SESSION['custid'])) { ?>

                                     <button class="btn btn-success orderbutton" name="add_cartt"
                                         data-pname="<?php echo $row['p_name'] ?>"
                                         data-pprice="<?php echo $row['price'] ?>" 
                                         >Add</button>


                                     <?php  } else{ ?>
                                     <a href="#home"><button class="btn btn-success"
                                             onclick=" alert('Please login first to add product in cart');"> Add
                                         </button></a>
                                     <?php } ?>
                                     </form>

                             </div>
                             <?php  }     } else { ?>
                             <center> <span style="color:red;font-size:30px;"> No Data Found</span></center>
                             <?php  }   }?>
                         </div>

                     </div>
                  </div>  




          </div>  
          </div> 


     </section>








     <!-- modal login -->
     <div class="modal fade " id="userslogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
         <div class="modal-dialog bg-transparent modal-dialog-centered" role="document">
             <div class="modal-content " style="background-color: #fff0;border:1px solid #fff0; ">
                 <!-- <div class="modal-header " style="border-bottom:1px solid #fff0;">

                      <button type="button" class="close text-white " data-dismiss="modal" aria-label="Close"> -->
                     <!-- <span aria-hidden="true">&times;</span>  
                     </button>
                 </div> -->
                 <div class="modal-body bg-transparent">
                     <center> <?php include 'userlogin.php'?></center>
                 </div>
                 <div class="modal-footer" style="border-top:1px solid #fff0;">


                 </div>
             </div>
         </div>
     </div>

 </body>
 <script src="search.js"> </script>
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
     integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
 </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
 </script>
 <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>   -->
 <script>
 

 </html>