<?php
include_once "conn.php";
if (isset($_GET["deleteId"])) {
    $targeted_id = $_GET["deleteId"];
        $deleteQuery0 = $conn->prepare("DELETE FROM orderdetails WHERE orderNumber= ANY (SELECT orderNumber FROM orders WHERE customerNumber=:targetedID)");
        $deleteQuery1 = $conn->prepare("DELETE FROM orders WHERE customerNumber = :targetedID");
        $deleteQuery2 = $conn->prepare("DELETE FROM payments WHERE customerNumber = :targetedID");
        $deleteQuery3 = $conn->prepare("DELETE FROM customers WHERE customerNumber = :targetedID");

    $deleteQuery0->bindParam(':targetedID', $_GET["deleteId"]);
    $deleteQuery1->bindParam(':targetedID', $_GET["deleteId"]);
    $deleteQuery2->bindParam(':targetedID', $_GET["deleteId"]);
    $deleteQuery3->bindParam(':targetedID', $_GET["deleteId"]);

    if ($deleteQuery0->execute()) {
        $deleteQuery1->execute();
        $deleteQuery2->execute();
        $deleteQuery3->execute();
        header("location:index.php");
    }
   else {
        echo "Data Gagal Dihapus";
    }
}
?>