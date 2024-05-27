<?php 
include("../core/header.php");

if(isset($_POST['submit']) && $_POST['submit'] != ''){

    foreach($_POST as $key => $value){
        $$key = $con->real_escape_string($value);
    }
}
?>

<form action="" method="post">
    <input type="text" name="" id="">
</form>
<?php 
include("../core/footer.php");
?>