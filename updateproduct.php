<?php
include_once'conn.php';
$targeted_id = $_GET["updateId"];
$populateQuery = "SELECT * from products WHERE productCode='$targeted_id';";
$populateData=$conn->query($populateQuery);
$row = $populateData->fetch(PDO::FETCH_ASSOC)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add A New Product</title>
</head>

<body>
    <a href="index.php">Back to Main Menu</a>
    <form method="post">
        <table>
            <tr>
                <td>ProductCode</td>
                <td><input type="text" name="productCode" value="<?php echo $row['productCode']; ?>"></td>
            </tr>
            <tr>
                <td>ProductName</td>
                <td><input type="text" name="productName" value="<?php echo $row['productName']; ?>"></td>
            </tr>
            <tr>
                <td>ProductLine</td>
                <td><select name="productLine" id="product line">
                        <?php

                        $productline = $conn->query("SELECT productLine from productlines;");
                        foreach ($productline as $choice) {
                            echo "<option value='" . $choice["productLine"] . "'>" . $choice["productLine"] . "</option>";
                        }
                        ?>

                    </select></td>
            </tr>
            <tr>
                <td>ProductScale</td>
                <td><input type="text" name="productScale" value="<?php echo $row['productScale']; ?>"></td>
            </tr>
            <tr>
                <td>ProductVendor</td>
                <td><input type="text" name="productVendor" value="<?php echo $row['productVendor']; ?>"></td>
            </tr>
            <tr>
                <td>ProductDescription</td>
                <td><input type="text" name="productDescription" value="<?php echo $row['productDescription']; ?>"></td>
            </tr>
            <tr>
                <td>quantityInStock</td>
                <td><input type="number" name="quantityInStock" value="<?php echo $row['quantityInStock']; ?>"></td>
            </tr>
            <tr>
                <td>buyPrice</td>
                <td><input type="number" name="buyPrice" step=0.01 value="<?php echo $row['buyPrice']; ?>"></td>
            </tr>
            <tr>
                <td>MSRP</td>
                <td><input type="number" name="MSRP" step=0.01 value="<?php echo $row['MSRP']; ?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">SUBMIT</button></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $add_query = $conn->prepare("UPDATE products SET productCode=:productCode, productName=:productName, productLine=:productLine, productScale=:productScale, productVendor=:productVendor, productDescription=:productDescription, quantityInStock=:quantityInStock, buyPrice=:buyPrice, MSRP=:MSRP WHERE productCode=:targetedID");
            
            $add_query->bindParam(":targetedID", $targeted_id);

            $add_query->bindParam(":productCode", $_POST["productCode"]);
            $add_query->bindParam(":productName", $_POST["productName"]);
            $add_query->bindParam(":productLine", $_POST["productLine"]);
            $add_query->bindParam(":productScale", $_POST["productScale"]);
            $add_query->bindParam(":productVendor", $_POST["productVendor"]);
            $add_query->bindParam(":productDescription", $_POST["productDescription"]);
            $add_query->bindParam(":quantityInStock", $_POST["quantityInStock"]);
            $add_query->bindParam(":buyPrice", $_POST["buyPrice"]);
            $add_query->bindParam(":MSRP", $_POST["MSRP"]);
        if($add_query->execute()){
        echo "Data has been updated.";
    }else{
        echo "Failed to update data.";
    }
        
    }
    ?>
</body>

</html>