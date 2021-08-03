<?php
include 'RepositoryProduct.php';

session_start();
if (isset($_POST['addNewProduct'])) {
	$productName = $_POST['productName'];
	$price = $_POST['price'];

	$RepositoryProduct = new RepositoryProduct();
    $RepositoryProduct->insertProduct($productName, $price);
    header('location:index.php');

}

if (isset($_POST['submit_edit'])) {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $idProduct = $_POST['idProduct'];
    $RepositoryProduct = new RepositoryProduct();
    $RepositoryProduct->update($productName, $price, $idProduct);
    header('location:index.php');
}

if (isset($_GET['productName'])) {
    $id = $_GET['productName'];
    $RepositoryProduct = new RepositoryProduct();
    $RepositoryProduct->delete($id);
    header('location:index.php');
}
?>
