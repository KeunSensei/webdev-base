<?php
    include('../core/header.php');
?>
<div class="row">


<table class="table">
    <tr>
        <th>ID2</th>
        <th>EMAIL2</th>
        <th>DATETIME2</th>
    </tr>
<?php
    $sql = "SELECT admin_user_id, email, datetime FROM admin_user;";
    $liqry = $con->prepare($sql);
    if($liqry === false) {
        echo mysqli_error($con);
    } else{
        // $liqry->bind_param('s',$email);
        $liqry->bind_result($admin_user_id, $email, $datetime);
        if($liqry->execute()){
            $liqry->store_result();
            while($liqry->fetch()){
                ?>
                <tr>
                    <td>
                        <a href="edit_user.php?user_id=<?php echo $admin_user_id;?>"><?php echo $admin_user_id;?></a>
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