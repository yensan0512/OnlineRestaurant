<!DOCTYPE>

<html>
  <head>
    <title>This is Admin Panel</title>
    <link rel="stylesheet" href="../style/style.css" media="all" />

  </head>

<body>
  <div class="main_wrapper">

    <div class="header_wrapper">
        <a href="index.php"><img src="product_image/admin.jpg" style="width:1000px;height:200px">
    </div>

    <div id="right">
      <h3 style="padding:2; color: #33adff"> Manage Content</h3>
        <a href="index.php?insert_product">Insert New Product</a>
        <a href="index.php?view_products">View All Products</a>
        <a href="index.php?insert_cats">Insert New Category</a>
        <a href="index.php?view_cats">View All Categories</a>
        <a href="index.php?view_customers">View Customers</a>
        <a href="index.php?view_orders">View Orders</a>
        <a href="index.php?view_report">View Reports</a>
        <a href="logout.php?">Admin Logout</a>

    </div>
    <br></br>
    <h2 style = "color:White; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>


    <div class="products_box">


      <?php
      if(!isset($_GET['insert_product'])){
        if(!isset($_GET['view_products'])){
         if(!isset($_GET['edit_pro'])){
           if(!isset($_GET['insert_cats'])){
             if(!isset($_GET['view_cats'])){
               if(!isset($_GET['edit_cats'])){
                 if(!isset($_GET['view_customers'])){
                   if(!isset($_GET['view_report'])){
                     if(!isset($_GET['view_orders'])){
                       if(!isset($_GET['edit_order'])){


      echo "
        <h1 style='padding:10px; text-align:center; color:violet'><br>Welcome Admin!</br><br>Here is your control panel .</br>
		<br>Have A Nice Day !</br></h1>";

      }
    }
  }
  }
  }
}
}
}
}
}
       ?>

     <?php
     if(isset($_GET['insert_product'])){
       include("insert_product.php");
     }

     if(isset($_GET['view_products'])){
       include("view_products.php");
     }

     if(isset($_GET['edit_pro'])){
       include("edit_pro.php");
     }

     if(isset($_GET['insert_cats'])){
       include("insert_cats.php");
     }

     if(isset($_GET['view_cats'])){
       include("view_cats.php");
     }

     if(isset($_GET['edit_cats'])){
       include("edit_cats.php");
     }

     if(isset($_GET['view_customers'])){
       include("view_customers.php");
     }

     if(isset($_GET['view_report'])){

       include("view_report.php");
     }


     if(isset($_GET['view_orders'])){

  	include("view_orders.php");
 		}

    if(isset($_GET['edit_order'])){

     include("edit_order.php");
   }



     ?>



</div>

</body>

</html>

