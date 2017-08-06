<?php
/* Displays user information and some useful messages */
session_start();

$connect = mysqli_connect("localhost", "root", "", "jitudelhi");
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}



?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> Online Shopping  </title>
  <script src="bootstrap.min.js"/>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>

html, body, div, span, applet, object, iframe, h1,h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, caption {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
}

.image:hover img {
    -webkit-transform:scale(1.5); /* Safari and Chrome */
    -moz-transform:scale(1.5); /* Firefox */
    -ms-transform:scale(1.5); /* IE 9 */
    -o-transform:scale(1.5); /* Opera */
     transform:scale(1.5);
}



  a{
	  
	  color:black;
	  
  }
 
  
  .cart {
    width:30px;
	height:30px;
	background:black;
	margin-right:80px;
	
}
.Button {
    width:30px;
	height:30px;
    margin-right:70px;
   float:right;
}

#w3-container{
	
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
  width: 100%;
  height:80px;
  font-weight: bold;
  font-size:170%;
  background:#1AB188 ;
	
}


</style>





</head>

<div id="w3-container" >
 <h6 align="center" > Welcome to Online Shopping  <?= $first_name.' '.$last_name ?></h6>
 
 
 
 <div class="Button" style="float:right;
  font-size:80%;">
 <a href="logout.php" class="btn btn-default">Log Out</a>
    </div>
	
	<div class="MyCart" style="width:20px;height:30px;margin-left:20px ">
 <a href="#shoppingCart" class="btn btn-default"  style="font-size:80%;">MyCart</a>
    </div>
</div>


<div class ="menu" style="float: left;
    width: 150px; 
    height: 150px;
	margin-top: 30px;
	font-weight:bold;
	font-size:170%;
	position:fixed;
	
	
	">

<ul>
  <li> <a href="#container">Electronics</a></li>
  <li> <a href="#mens">Mens</a></li>
  <li> <a href="#womens">Womens</a></li>
  <li> <a href="#sports">Sports</a></li>
 
</ul>
</div>

<div class="container" style="width:70%; margin-top:120px;">

	
    <?php
	$query = "SELECT * FROM products ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-md-4">
            <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
            <div style="border: 2px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px; height: 400px;
    width: 260px;" >
           

		   
          <div class="image" style="margin:0 auto">
		   <img src="img/<?php echo $row["image"]; ?>" class="img-responsive">
		   </div>
		   
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">Rs. <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" style="margin-top:5px; background:#6CB886" class="btn btn-default" value="Add to Bag">
            </div>
            </form>
            </div>
            <?php
		}
	}
	?>
   
    </div>
 <div id="mens"   style="width:70%;margin:0 auto; position:relative;">
    
    <?php
	$query = "SELECT * FROM mens ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-md-4">
            <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
            <div style="border: 2px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px; height: 470px;
    width: 260px;" >
            
			<div class="image" style="margin:0 auto">
		   <img src="img/<?php echo $row["image"]; ?>" class="img-responsive">
		   </div>
		   
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">Rs. <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" style="margin-top:5px;background:#6CB886;" class="btn btn-default" value="Add to Bag">
            </div>
            </form>
            </div>
            <?php
		}
	}
	?>
 </div>
 
 
 <div id="womens"   style="width:70%;margin:0 auto;">
    
    <?php
	$query = "SELECT * FROM womens ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-md-4">
            <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
            <div style="border: 2px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px; height: 470px;
    width: 260px;" >
            <div class="image" style="margin:0 auto">
		   <img src="img/<?php echo $row["image"]; ?>" class="img-responsive">
		   </div>
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">Rs. <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" style="margin-top:5px;background:#6CB886;" class="btn btn-default" value="Add to Bag">
            </div>
            </form>
            </div>
            <?php
		}
	}
	?>
 </div>
 
 <div id="sports"   style="width:70%;margin:0 auto;">
    
    <?php
	$query = "SELECT * FROM products ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-md-4">
            <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
            <div style="border: 2px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px; height: 500px;
    width: 260px;" >
            <div class="image" style="margin:0 auto">
		   <img src="img/<?php echo $row["image"]; ?>" class="img-responsive">
		   </div>
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">Rs. <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" style="margin-top:5px;background:#6CB886;" class="btn btn-default" value="Add to Bag">
            </div>
            </form>
            </div>
            <?php
		}
	}
	?>
 </div>
 
 
    </div>
	
	
	
	
	<div style="clear:both" ></div>
    <div id="shoppingCart" align='center' >
    <h2 style="font-weight:bold;
	font-size:170%;">My Shopping Bag</h2>
    <div class="table-responsive" align='center' style="margin-bottom:30px">
    <table class="table table-bordered" align='center' style="width:70%;">
    <tr>
    <th width="40%">Product Name</th>
    <th width="10%">Quantity</th>
    <th width="20%">Price Details</th>
    <th width="15%">Order Total</th>
    <th width="5%">Action</th>
    </tr>
    <?php
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
            <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"] ?></td>
            <td>Rs. <?php echo $values["product_price"]; ?></td>
            <td>Rs. <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
            <td><a href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>
            </tr>
            <?php 
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		?>
        <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">Rs. <?php echo number_format($total, 2); ?></td>
        <td></td>
        </tr>
        <?php
	}
	?>
    </table>
	
	
	</div>

	<div class="Button" style="float:right;
   width:20% ;background:#6CB886; ">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#add_data_Modal">Proceed To Shipping</button>
    </div>
	
	
	

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Fill in Shipping Details</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Enter Address</label>
     <textarea name="address" id="address" class="form-control"></textarea>
     <br />
     <label>Select Gender</label>
     <select name="gender" id="gender" class="form-control">
      <option value="Male">Male</option>  
      <option value="Female">Female</option>
     </select>
     <br />  
     <label>Enter Mobile.</label>
     <input type="tel" name="mobile" id="mobile" class="form-control" />
     <br />  
     <label>Enter Pin</label>
     <input type="text" name="pin" id="pin" class="form-control" />
     <br />
     <input type="submit" name="Make Payment" id="Make Payment" value="Make Payment" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Employee Details</h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#address').val() == '')  
  {  
   alert("Address is required");  
  }  
  else if($('#designation').val() == '')
  {  
   alert("Designation is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });




 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>

	
	
	
	
	
 </body>

</html>
