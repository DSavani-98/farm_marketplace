<?php

include 'connection.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $FarmerID = $_POST["farmerID"];
        $ProductName = $_POST["productName"];
        $ProductDescription = $_POST["productDescription"];
        $ProductPrice = $_POST["productPrice"];
        $ProductQuantity = $_POST["productQuantity"];
        $ProductImageURL = $_FILES["productImageURL"]["name"];
        $ProductCategory = $_POST["productCategory"];
        $query = "INSERT INTO `products`(`FarmerID`, `ProductName`, `ProductDescription`, `ProductPrice`, `ProductQuantity`, `ProductImageURL`, `ProductCategory`)
             VALUES ('$FarmerID','$ProductName','$ProductDescription','$ProductPrice','$ProductQuantity', '$ProductImageURL', '$ProductCategory' )";
        echo json_encode($query);
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $file = file_get_contents($_FILES["productImageURL"]["tmp_name"]);
        $root_folder = __DIR__.'/uploads/';
       
        if (!is_dir($root_folder)) {
            echo mkdir($root_folder, 0777, true);
        }
        
        file_put_contents($root_folder. $ProductImageURL, $file);
    
}
?> 