<?php
include_once "conn.php";
if (isset($_GET["deleteId"])) {
    $targeted_id = $_GET["deleteId"];
        $deleteQuery1 = $conn->prepare("DELETE FROM orderdetails WHERE productCode = :targetedID");
        $deleteQuery2 = $conn->prepare("DELETE FROM products WHERE productCode = :targetedID");

    $deleteQuery1->bindParam(':targetedID', $_GET["deleteId"]);
    $deleteQuery2->bindParam(':targetedID', $_GET["deleteId"]);

    if ($deleteQuery1->execute()) {
        if($deleteQuery2->execute()){
        header("location:index.php");}
    } else {
        echo "Data Gagal Dihapus";
    }
}
?>