<?php
include 'connection.php';

class RepositoryProduct extends Connection{
	public function __construct(){
        $this->conn = $this->get_connection();
    }


	public function insertProduct($productName, $price){
    	$sql = "INSERT INTO product(productName, price) VALUES('$productName', '$price')";
    	$this->conn->query($sql);
	}

	public function tampil_data(){
	    $sql = "SELECT * FROM product";
	    $bind = $this->conn->query($sql);

	    while ($obj = $bind->fetch_object()) {
	    $baris[] = $obj;
	    }
	    if(!empty($baris)){
	        return $baris;
	    }
	}

	public function edit($id)
	{
	    $sql = "SELECT * FROM product WHERE idProduct='$id'";
	    $bind = $this->conn->query($sql);
	    while ($obj = $bind->fetch_object()) {
	    $baris = $obj;
	    }
	    return $baris;
	}

	public function update($productName, $price, $idProduct)
	{
	    $sql = "UPDATE product SET productName='$productName', price='$price' WHERE idProduct='$idProduct'";
	    $this->conn->query($sql);
	}

	public function delete($productName)
	{
	    $sql = "DELETE FROM product WHERE productName='$productName'";
	    $this->conn->query($sql);
	}

}?>