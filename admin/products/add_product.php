<?php
    include('../core/header.php');

if(isset($_POST['submit']) && $_POST['submit'] != ''){

    foreach($_POST as $key => $value){
        $$key = $con->real_escape_string($value);
    }

    prettyDump($_FILES);

    exit();

    // $product_name = $_POST['product_name'];
    $sql = "INSERT INTO products (product_name, product_description, product_price) VALUES (?,?,?);";
    $insertqry = $con->prepare($sql);
    if($insertqry === false) {
       
        echo mysqli_error($con);
    } else{
        $insertqry->bind_param('sss',$product_name,$product_description,$product_price);
        // $insertqry->bind_result($product_id, $email, $datetime);
        if($insertqry->execute()){
            echo "<div class='alert alert-success'>OK is gelukt! voor id:".$insertqry->insert_id. "</div><br>";

            $product_id = $insertqry->insert_id;

            // prettyDump($_FILES);

            if(!empty($_FILES) && isset($_FILES["product_photo1"]['name'])  && $_FILES["product_photo1"]['name'] != "" && $_FILES["product_photo1"]['size'] != ""){


                $photo1 = $_FILES["product_photo1"]['name'];
                move_uploaded_file($_FILES["product_photo1"]['tmp_name'], ABSOLUTE_HREF."upload/products/".$photo1);


                $sqlphoto1 = "INSERT INTO product_photos (url, product_id) VALUES (?,?);";
                $photo1qry = $con->prepare($sqlphoto1);
                if($photo1qry === false) {
                    echo mysqli_error($con);
                } else{
                    $photo1qry->bind_param('ss',$photo1,$product_id);
                    if($photo1qry->execute()){
                        echo "<div class='alert alert-success'>OK photo 1 geupload</div><br>";
                    }else{
                        echo mysqli_error($con); 
                    }
                }
                $photo1qry->close();

            }
            if(!empty($_FILES) && isset($_FILES["product_photo2"]['name'])  && $_FILES["product_photo2"]['name'] != "" && $_FILES["product_photo2"]['size'] != ""){
                
                $photo2 = $_FILES["product_photo2"]['name'];

                move_uploaded_file($_FILES["product_photo2"]['tmp_name'], ABSOLUTE_HREF."upload/products/".$photo2);

                $sqlphoto2 = "INSERT INTO product_photos (url, product_id) VALUES (?,?);";
                $photo2qry = $con->prepare($sqlphoto2);
                if($photo2qry === false) {
                    echo mysqli_error($con);
                } else{
                    $photo2qry->bind_param('ss',$photo2,$product_id);
                    if($photo2qry->execute()){
                        echo "<div class='alert alert-success'>OK photo 2 geupload</div><br>";
                    }else{
                        echo mysqli_error($con); 
                    }
                }
                $photo2qry->close();
            }
            if(!empty($_FILES) && isset($_FILES["product_photo3"]['name'])  && $_FILES["product_photo3"]['name'] != "" && $_FILES["product_photo3"]['size'] != ""){
                
                $photo3 = $_FILES["product_photo3"]['name'];

                move_uploaded_file($_FILES["product_photo3"]['tmp_name'], ABSOLUTE_HREF."upload/products/".$photo3);

                $sqlphoto3 = "INSERT INTO product_photos (url, product_id) VALUES (?,?);";
                $photo3qry = $con->prepare($sqlphoto3);
                if($photo3qry === false) {
                    echo mysqli_error($con);
                } else{
                    $photo3qry->bind_param('ss',$photo3,$product_id);
                    if($photo3qry->execute()){
                        echo "<div class='alert alert-success'>OK photo 3 geupload</div><br>";
                    }else{
                        echo mysqli_error($con); 
                    }
                }
                $photo3qry->close();
            }
            if(!empty($_FILES) && isset($_FILES["product_photo4"]['name'])  && $_FILES["product_photo4"]['name'] != "" && $_FILES["product_photo4"]['size'] != ""){
                
                $photo4 = $_FILES["product_photo4"]['name'];

                move_uploaded_file($_FILES["product_photo4"]['tmp_name'], ABSOLUTE_HREF."upload/products/".$photo4);

                $sqlphoto4 = "INSERT INTO product_photos (url, product_id) VALUES (?,?);";
                $photo4qry = $con->prepare($sqlphoto4);
                if($photo4qry === false) {
                    echo mysqli_error($con);
                } else{
                    $photo4qry->bind_param('ss',$photo4,$product_id);
                    if($photo4qry->execute()){
                        echo "<div class='alert alert-success'>OK photo 4 geupload</div><br>";
                    }else{
                        echo mysqli_error($con); 
                    }
                }
                $photo4qry->close();
            }

        }else{
            echo mysqli_error($con);
        }
        $insertqry->close();
    }
}
?>

<div class="row">
    <div class="col-12">
        <h1>Product toevoegen</h1>
    </div>
    <div class="col-6">
        <form action="<?php echo BASEURL_CMS;?>products/add_product.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="basic-url" class="form-label">Product naam</label>
                <input type="text" class="form-control" name="product_name" placeholder="Product naam">
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Product prijs</label>
                <input type="text" class="form-control" name="product_price" placeholder="14.99">
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Product omschrijving</label>
                <textarea class="form-control" name="product_description" id="product_description"></textarea>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Product foto's</label>
                <input type="file" class="form-control" name="product_photo1[]" multiple >
                <input type="file" class="form-control" name="product_photo2" >
                <input type="file" class="form-control" name="product_photo3" >
                <input type="file" class="form-control" name="product_photo4" >
            </div> 
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-danger" name="submit" value="Opslaan">
            </div>

        </form>
    </div>
</div>

<?php
    include('../core/footer.php');
?>