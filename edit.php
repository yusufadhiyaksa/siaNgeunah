<?php
	$id = $_GET['productName'];
	include 'RepositoryProduct.php';
	$RepositoryProduct = new RepositoryProduct();
	$data = $RepositoryProduct->edit($id);
	?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<title>Edit</title>
		</head>
		<body>
		<h1>Edit Product</h1>
		<a href="index.php">Kembali</a>
		<br><br>
		<form action="prosesAddNewProduct.php" method="post">
			<label>Product Name</label>
			<br>
			<input type="text" name="productName" value="<?php echo $data->productName ?>">
			<input type="hidden" name="idProduct" value="<?php echo $id ?>">
			<br>
			<label>Price</label>
			<br>
			<input type="text" name="price" value="<?php echo $data->price ?>">
			<br><br>
			<button type="submit" name="submit_edit">Submit</button>
		</form>
		</body>
	</html>