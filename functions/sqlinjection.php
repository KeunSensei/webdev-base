<?php

include("../core/db_connect.php");

$id = $_GET['id'];

prettyDump($id);

// $escapeID = $con->real_escape_string($id);
// prettyDump($escapeID);
// //+UNION+SELECT+*+FROM+products;
// $result = mysqli_query($con, "SELECT * FROM products WHERE product_id = $id ");

// prettyDump(mysqli_num_rows($result));

// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         prettyDump($row);
//     }
// }else{
//     echo "Geen resultaten";
// }

// $sqli_query = $con->query("SELECT * FROM products WHERE product_id = $id;");
// if($sqli_query === false) {
//     echo mysqli_error($con);
// } else {
//     if($sqli_query->num_rows > 0){
//         while($row = $sqli_query->fetch_assoc()){
//             prettyDump($row);
//         }
//     } else {
//         echo "Geen resultaten";
//     }
//     $sqli_query->close();
// }


$sqli_prepare = $con->prepare("SELECT product_name,product_price FROM products WHERE product_id = ?;");
if ($sqli_prepare === false) {
    echo mysqli_error($con);
} else{
    $sqli_prepare->bind_param('i',$id);
    if ($sqli_prepare->execute()) {
        $sqli_prepare->bind_result($product_name,$product_price);
        while($sqli_prepare->fetch()){
            prettyDump($product_name);
        }
    }else{
        echo "Geen resultaten";
    }
}
$sqli_prepare->close();
