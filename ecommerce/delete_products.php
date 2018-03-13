<?php 
include( $_SERVER['DOCUMENT_ROOT'] . '/ecommerce/includes/db.php' ); 
?>

<html>
	<head>
		<title>Deleting Product</title>
		 
	</head>
	
<body bgcolor="skyblue">
	<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="1000" border="2" bgcolor="orange">
			<tr align="center">
				<td colspan="7"><h2>Delete Product </h2>
				<a class="nav-stylehead" href="insert_products.php">Insert Products</a>
				<a class="nav-stylehead" href="customer_login.php">Logout</a></td>
			</tr>
			<tr>
			<td>
				<?php
								//$total = 0;
								$con = mysqli_connect("localhost","root","", "ecommerce1");

								//$ip = getIp();
								//$c_email = $_SESSION['customer_email'];
								//$sel_price = "select * from products ";
								//$run_price = mysqli_query($con, $sel_price);
								$i = 0;
								//while($p_price = mysqli_fetch_array($run_price))
								{
									//$pro_id = $p_price['product_id'];
									//$cart_id = $p_price['cart_id'];
									$pro_price = "select * from products";
									$run_pro_price = mysqli_query($con,$pro_price);
									while($pp_price = mysqli_fetch_array($run_pro_price)){
										//$product_price = array($pp_price['product_price']);
										$product_title = $pp_price['product_title'];
										$product_image = $pp_price['product_image'];
										$pro_id=$pp_price['product_id'];
										//$single_price = $pp_price['product_price'];
										//$values = array_sum($product_price);
										//$total += $single_price * $p_price['qty'];
										
								
								
							?>
							<tr align="center">
								<input type="hidden" name="remove[<?php echo $i ?>]" value="1" />
								<td><input type="checkbox" name="remove[<?php echo $i ?>]" value="0"/></td>
								<td><?php echo $product_title; ?><br>
								<img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
								</td>
								
								<td><?php global $con;
										if(isset($_POST['update_products'])){
											
											//$qty = $_POST['qty'][$i];
											//$cart_id = $p_price['cart_id'];
											//$update_qty = "update cart set qty='$qty' where cart_id = $cart_id";
											//$run_qty = mysqli_query($con, $update_qty);
											//$_SESSION['qty'] = $qty;
											
											//$total = $total - ($p_price['qty'] - $qty*$_POST['remove'][$i])*$pp_price['product_price'];
											if($_POST['remove'][$i]=="0")
											{
												$delete_pro = "delete from products where product_id = '$pro_id'";
												$run_qty = mysqli_query($con, $delete_pro);	
											}	
										}
										
										?>
								</td>
							</tr>	
							
					<?php
					$i = $i + 1; 
					}
					
					}
					if(isset($_POST['update_products']))
					 echo "<meta http-equiv='refresh' content='0'>";
					?>	
								
							<tr align="center">
								<td colspan="2"><input type="submit" name="update_products" value="Update Cart"/></td>
								
							</tr>
					
			</td>
			</td>
					
			</tr>
			
			
			
		</table>
	
	</form>









</body>
</html>

<?php
function getPro1(){
	
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	global $con;
	
	$get_pro = "select * from products order by RAND() LIMIT 0,20";
	$run_pro = mysqli_query($con, $get_pro);
	
	while($row_pro = mysqli_fetch_array($run_pro)){
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		
		echo "
		
				<div id='single_product'>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='180' height='180' />
					<p><b> $ $pro_price</b></p>
					
					
					<a href='delete_products.php?pro_id=$pro_id'><button style='float:right'>Delete Products</button></a>
				
				
				</div>
			
				";
				
	}
	}
	}
}
	if(isset($_POST['pro_id'])){
		global $con;
		$pro_id = $_POST['del_pro'];
		$delete_product = "delete from products where product_id='$pro_id'";
		$del_pro = mysqli_query($con, $delete_product);
		if($del_pro){
			echo "<script>alert('Product Has Been deleted!')</script>";
			echo "<script>window.open('delete_products.php','_self')</script>";
		}
	}


?>