<?php 
session_start(); 
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){ 
  header("location:login.php"); 
} 
 
 
?> 
 
<html> 
 
<head> 
    <title>dashboard</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> 
 
</head> 
<style> 
body { 
    
    background: black;
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
    /* Scrollable contents if viewport is shorter than content. */ 
} 
</style> 
 
<body> 
    <?php include 'sidebar.php' ?> 
    <!--Main layout--> 
    <main style="margin-top: 58px;"> 
        <div class="container pt-4">
            <center><H1>FRESH FOOD </H1></center>
            <h2><marquee> welcom </marquee></h2>
            
        </div> 
    </main> 
</body> 

</html>