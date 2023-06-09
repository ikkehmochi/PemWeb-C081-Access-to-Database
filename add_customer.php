<?php
include_once'conn.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add A New Customer</title>
</head>

<body>
    <a href="index.php">Back to Main Menu</a>
    <form method="post">
        <table>
            <tr>
                <td>customerName</td>
                <td><input type="text" name="customerName"></td>
            </tr>
            <tr>
                <td>customerLastName</td>
                <td><input type="text" name="customerLastName"></td>
            </tr>
            <tr>
                <td>customerFirstName</td>
                <td><input type="text" name="customerFirstName"></td>
            </tr>
            <tr>
                <td>phone</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td>addressLine1</td>
                <td><input type="text" name="addressLine1"></td>
            </tr>
            <tr>
                <td>addressLine2</td>
                <td><input type="text" name="addressLine2"></td>
            </tr>
            <tr>
                <td>city</td>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td>state</td>
                <td><input type="text" name="state"></td>
            </tr>
            <tr>
                <td>postalCode</td>
                <td><input type="text" name="postalCode"></td>
            </tr>
            <tr>
                <td>country</td>
                <td><input type="text" name="country"></td>
            </tr>
            <tr>
                <td>salesRepEmployeeNumber</td>
                <td><select name="salesRepEmployeeNumber" id="salesRepEmployeeNumber">
                        <?php

                        $productline = $conn->query("SELECT employeeNumber from employees;");
                        foreach ($productline as $choice) {
                            echo "<option value='" . $choice["employeeNumber"] . "'>" . $choice["employeeNumber"] . "</option>";
                        }
                        ?>

                    </select></td>
            </tr>

            <tr>
                <td>creditLimit</td>
                <td><input type="number" name="creditLimit"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">SUBMIT</button></td>
            </tr>
        </table>
    </form>
    <?php
        if (isset($_POST["submit"])) {
            $add_query = $conn->prepare("INSERT INTO customers VALUES('', :customerName, :customerLastName, :customerFirstName, :phone, :addressLine1, :addressLine2, :city, :states, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)");
            
                $add_query->bindParam(":customerName", $_POST["customerName"]);
                $add_query->bindParam(":customerLastName", $_POST["customerLastName"]);
                $add_query->bindParam(":customerFirstName", $_POST["customerFirstName"]);
                $add_query->bindParam(":phone", $_POST["phone"]);
                $add_query->bindParam(":addressLine1", $_POST["addressLine1"]);
                $add_query->bindParam(":addressLine2", $_POST["addressLine2"]);
                $add_query->bindParam(":city", $_POST["city"]);
                $add_query->bindParam(":states", $_POST["state"]);
                $add_query->bindParam(":postalCode", $_POST["postalCode"]);
                $add_query->bindParam(":country", $_POST["country"]);
                $add_query->bindParam(":salesRepEmployeeNumber", $_POST["salesRepEmployeeNumber"]);
                $add_query->bindParam(":creditLimit", $_POST["creditLimit"]);
            if($add_query->execute()){
            echo "New Data has been added.";
        }else{
            echo "Failed to add new data.";
        }
            
        }
 
    ?>
</body>

</html>