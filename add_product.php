<?php
$conn = mysqli_connect("localhost", "root", "", "classicmodels");
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
                <td><input type="text" name="productCode"></td>
            </tr>
            <tr>
                <td>ProductName</td>
                <td><input type="text" name="productName"></td>
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
                <td><input type="text" name="productScale"></td>
            </tr>
            <tr>
                <td>ProductVendor</td>
                <td><input type="text" name="productVendor"></td>
            </tr>
            <tr>
                <td>ProductDescription</td>
                <td><input type="text" name="productDescription"></td>
            </tr>
            <tr>
                <td>quantityInStock</td>
                <td><input type="number" name="quantityInStock"></td>
            </tr>
            <tr>
                <td>buyPrice</td>
                <td><input type="number" name="buyPrice" step=0.01></td>
            </tr>
            <tr>
                <td>MSRP</td>
                <td><input type="number" name="MSRP" step=0.01></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">SUBMIT</button></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        mysqli_query($conn, "INSERT INTO products VALUES(
       ' $_POST[productCode]',
        '$_POST[productName]',
            '$_POST[productLine]',
            '$_POST[productScale]',
            '$_POST[productVendor]',
            '$_POST[productDescription]',
            '$_POST[quantityInStock]',
            '$_POST[buyPrice]',
            '$_POST[MSRP]')
        ");
        echo "New Data has been added.";
    }
    ?>
</body>

</html>