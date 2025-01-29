<?php

 include 'connection.php';

 if(isset($_POST['login_admin'])){
        $email=$_POST['email'];
    $password=$_POST['password'];
    // print_r($_POST);die;
    $sql="SELECT * FROM loginpannel where email='$email' AND password='$password'";
    $query=mysqli_query($conn,$sql);
    // print_r($query);die;
    // mysqli_result Object ( [current_field] => 0 [field_count] => 4 [lengths] => [num_rows] => 1 [type] => 0 )
    $result=mysqli_fetch_assoc($query);
    //  print_r($result);die;
    //  Array ( [id] => 3 [email] => rani [password] => 123456 [status] => 1 )
    if(!empty($result['email']) && !empty($result['password'])){
        session_start();
        $_SESSION['email']=$result['email'];
        echo "<script LANGUAGE='javascript'>
        window.alert('LOgin successfully');
        window.location.href='dashboard.php';
        </script>";
    }else{
        echo "<script LANGUAGE='javascript'>
        window.alert('Invalid Credential');
        window.location.href='login.php';
        </script>";

    }


 }

//  if(isset($_POST['login_admin']){
//     $email=$_POST['email'];
//     $password=$_POST['password'];
//     print_r($_POST);die;

        
// }
// if(isset($_POST["banner"])){
//       $name_banner=$_POST['banner_name'];
       
//      $img=$_FILES['banner_img'];
//      $imgname=$img['name'];
//      $imgpath=$img['tmp_name'];
//      $error=$img['error'];
     
//      if($error==0){
//         $final_img='img/'.$imgname;
//         move_uploaded_file($imgpath,$final_img);
//      }

//      $sql="INSERT INTO banner(`title` ,`image`) values('$name_banner','$final_img')";
//      $response=mysqli_query($conn,$sql);

//      if($response == true){
//         echo '<script LANGUAGE="javascript">
//         window.alert("Saved Successfully!");
//         window.location.href="addbanner.php";
//         </script>';
//     }
//     else{
//         echo '<script LANGUAGE="javascript">
//         window.alert("Data Not Saved!");
//         window.location.href="addbanner.php";
//         </script>';
//     }
// }
if(isset($_POST["save_banner"])){

    // print_r($_POST);die;
    // Array ( 
        // [banner_name] => Banner3 
        // [banner_desc] => desc3 
        // [save_banner] => save_banner 
        // )

    $banner_name=$_POST["banner_name"];
    $banner_desc=$_POST["banner_desc"];

    // print_r($_FILES['img']);die;
    // Array ( 
    //     [name] => Hulk3.jpg 
    //     [type] => image/jpeg 
    //     [tmp_name] => C:\xampp\tmp\phpDCF6.tmp 
    //     [error] => 0 
    //     [size] => 67820 
    //     )

    $img=$_FILES['img'];
    $imgname=$img['name'];          // Uesd to store image Name i.e Captain1.jpg
    $imgpath=$img['tmp_name'];      // C:\xampp\tmp\phpD1CA.tmp
    $error=$img['error'];           // 0
    if($error==0){
        $final_img='img/'.$imgname;     // where img is folder Name
        move_uploaded_file($imgpath,$final_img);
    }

    $sql="INSERT INTO banner (`banner_name`,`banner_desc`,`banner_image`) values('$banner_name', '$banner_desc', '$final_img')";
    $response= mysqli_query($conn,$sql);

    if($response == true){
        echo '<script LANGUAGE="javascript">
        window.alert("Saved Successfully!");
        window.location.href="addbanner.php"
        </script>';
    }
    else{
        echo '<script LANGUAGE="javascript">
        window.alert("Data Not Saved!");
        window.location.href="addbanner.php"
        </script>';
    }
}

if(isset($_POST["save_item"])){
    $item_name=$_POST["item_name"];
    $desc=$_POST["desc"];
    $price=$_POST["price"];

    // print_r($_FILES['img']);die;
    // Array ( 
    //     [name] => Hulk3.jpg 
    //     [type] => image/jpeg 
    //     [tmp_name] => C:\xampp\tmp\phpDCF6.tmp 
    //     [error] => 0 
    //     [size] => 67820 
    //     )

    $img=$_FILES['img'];
    $imgname=$img['name'];          // Uesd to store image Name i.e Captain1.jpg
    $imgpath=$img['tmp_name'];      // C:\xampp\tmp\phpD1CA.tmp
    $error=$img['error'];           // 0
    if($error==0){
        $final_img='img/'.$imgname;     // where img is folder Name
        move_uploaded_file($imgpath,$final_img);
    }

    $sql="INSERT INTO product (`item_name`,`desc`,`img`,`price`) values('$item_name', '$desc', '$final_img','$price')";
    $response= mysqli_query($conn,$sql);

    if($response == true){
        echo '<script LANGUAGE="javascript">
        window.alert("Saved Successfully!");
        window.location.href="addproducts.php"
        </script>';
    }
    else{
        echo '<script LANGUAGE="javascript">
        window.alert("Data Not Saved!");
        window.location.href="addproducts.php"
        </script>';
    }
}

if(isset($_POST["place_order"])){
    // Array ( [item_name] => Fresh Mango
    //  [price] => 50.00 [qty] => 1 [total] => 50
    //   [customer] => mano
    //  [mobile] => 8989898989 [address] => ranchi 
    //  [place_order] => place_order )
    // print_r($_POST);die;

    $item_name=$_POST["item_name"];
  
    $price=$_POST["price"];
    $qty=$_POST["qty"];
    $total=$_POST["total"];
    $customer=$_POST["customer"];
    $mobile=$_POST["mobile"];
    $address=$_POST["address"];
      
    $sql="INSERT INTO orders (`item_name`,`price`,`qty`,`total`,`customer`,`mobile`,`address`) 
    values('$item_name', '$price', '$qty','$total','$customer','$mobile','$address')";
//    print_r($sql);die;
   $response= mysqli_query($conn,$sql);

    if($response == true){
        echo '<script LANGUAGE="javascript">
        window.alert("Order Successfully!");
        window.location.href="../index.php"
        </script>';
    }
    else{
        echo '<script LANGUAGE="javascript">
        window.alert("Data Not Saved!");
        window.location.href="../index.php"
        </script>';
    }
}
  ?>