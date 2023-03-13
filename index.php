<?php
$conn = mysqli_connect("localhost", "root", "", "classicmodels");
$customers_data = "SELECT * FROM customers;";
$customers_result = $conn->query($customers_data);
$products_data = "SELECT * FROM products;";
$products_result = $conn->query($products_data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>ACCESSING DATA TO DATABASE</title>
</head>

<body>
    <ul>
        <li>
            <a href="#products">Products Table</a>
        </li>
        <li>
            <a href="#customers">Customers Table</a>
        </li>
    </ul>
    <section id="products">
        <h2>Products Table</h2>
        <table>
            <tr class="table_field">
                <td>
                    productCode
                </td>
                <td>
                    productName
                </td>
                <td>
                    productLine
                </td>
                <td>
                    productScale
                </td>
                <td>
                    productVendor
                </td>
                <td>
                    productDescription
                </td>
                <td>
                    productInStock
                </td>
                <td>
                    buyPrice
                </td>
                <td>
                    MSRP
                </td>
            </tr>
            <?php
            if ($customers_result->num_rows > 0) {
                while ($row = $products_result->fetch_assoc()) {
                    echo "<tr>
            <td>"
                        . $row["productCode"] .
                        "</td>
            <td>"
                        . $row["productName"] .
                        "</td>
            <td>"
                        . $row["productLine"] .
                        "</td>
            <td>"
                        . $row["productScale"] .
                        "</td>
            <td>"
                        . $row["productVendor"] .
                        "</td>
            <td>"
                        . $row["productDescription"] .
                        "</td>
            <td>"
                        . $row["quantityInStock"] .
                        "</td>
            <td>"
                        . $row["buyPrice"] .
                        "</td>
            <td>"
                        . $row["MSRP"] .
                        "</td>
        </tr>";
                }
            } else {
                echo "No Results";
            }
            ?>
        </table>
    </section>
    <br><br>
    <section id="customers">
        <h2>Customers Table</h2>
        <table>
            <tr class="table_field">
                <td>
                    customerCode
                </td>
                <td>
                    customerName
                </td>
                <td>
                    customerLastName
                </td>
                <td>
                    customerFirstName
                </td>
                <td>
                    phone
                </td>
                <td>
                    addressLine1
                </td>
                <td>
                    addressLine2
                </td>
                <td>
                    city
                </td>
                <td>
                    state
                </td>
                <td>
                    postalCode
                </td>
                <td>
                    country
                </td>
                <td>
                    salesRepEmployeeNumber
                </td>
                <td>
                    creditLimit
                </td>
            </tr>
            <?php
            if ($customers_result->num_rows > 0) {
                while ($row = $customers_result->fetch_assoc()) {
                    echo "        <tr>
                <td>"
                        . $row["customerNumber"] .
                        "</td>
                <td>"
                        . $row["customerName"] .
                        "</td>
                <td>"
                        . $row["contactLastName"] .
                        "</td>
                <td>"
                        . $row["contactFirstName"] .
                        "</td>
                <td>"
                        . $row["phone"] .
                        " </td>
                <td>"
                        . $row["addressLine1"] .
                        "</td>
                <td>"
                        . $row["addressLine2"] .
                        "</td>
                <td>"
                        . $row["city"] .
                        "</td>
                <td>"
                        . $row["state"] .
                        "</td>
                <td>"
                        . $row["postalCode"] .
                        "</td>
                <td>"
                        . $row["country"] .
                        "</td>
                <td>"
                        . $row["salesRepEmployeeNumber"] .
                        "</td>
                <td>"
                        . $row["creditLimit"] .
                        "</td>
            </tr>";
                }
            } else {
                echo "No Results";
            }
            ?>
        </table>
    </section>
</body>

</html>