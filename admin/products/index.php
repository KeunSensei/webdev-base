<?php
    include('../core/header.php');
?>
<div class="row">

<div class="col-12">
    <a href="add_product.php" class="btn btn-danger">ADD product</a>
</div>
<table class="table">
    <tr>
        <th>Product ID</th>
        <th>Naam</th>
        <th>Product prijs</th>
    </tr>
<?php

    $sql = "SELECT product_id, product_name, product_price FROM products WHERE 1;";
    $liqry = $con->prepare($sql);
    if($liqry === false) {
        echo mysqli_error($con);
    } else{
        // $liqry->bind_param('s',$email);
        $liqry->bind_result($product_id, $email, $datetime);
        if($liqry->execute()){
            $liqry->store_result();
            while($liqry->fetch()){
                ?>
                <tr>
                    <td>
                        <a href="edit_user.php?user_id=<?php echo $product_id;?>"><?php echo $product_id;?></a>
                    </td>
                    <td><?php echo $email;?></td>
                    <td><?php echo $datetime;?></td>
                </tr>
                <?php
            }
        }
        $liqry->close();
    }
?>
</table>
</div>
<?php
    include('../core/footer.php');
?>