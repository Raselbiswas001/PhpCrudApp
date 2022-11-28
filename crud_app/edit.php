<?php

include("function.php");

$objCrudAdmin = new crudapp();

$students = $objCrudAdmin->display_data();

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'edit') {
        $id = $_GET['id'];
        $returndata = $objCrudAdmin->display_data_by_id($id);
    }
}

if(isset($_POST['update_info'])){
    $msg =$objCrudAdmin->update_data($_POST);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Crud App</title>
</head>
<style>
    .f_width {
        margin: 0 auto;


    }


    .box-element {
        margin-top: 50px;
        padding: 30px;
        border: 3px solid #ddd;
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;


    }
</style>

<body>
    <div class="container">
        <div class="f_width box-element">
            <h2><a style="text-decoration: none;" href="index.php">DarunIT Student Database</a></h2>
            <?php if (isset($msg)) { echo $msg;  } ?>
            <form action="" class="was-validated" method="post" enctype="multipart/form-data">

                <div class="col-md-12 mb-3 mt-3">
                    <label for="uname" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="uname" name="u_std_name" value="<?php echo $returndata['std_name']; ?>" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <label for="u_std_email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="u_email" name="u_std_email" value="<?php echo $returndata['std_email']; ?>" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <label for="u_std_age" class="form-label">Age:</label>
                    <input type="number" class="form-control" id="u_age" name="u_std_age" value="<?php echo $returndata['std_age']; ?>"
                        name="u_std_age" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <label for="u_std_course" class="form-label">Course Name:</label>
                    <select class="form-select" id="u_course" name="u_std_course" value="<?php echo $returndata['std_course']; ?>" required>
                        <option>Web Design</option>
                        <option>Wordpress</option>
                        <option>Shopify</option>
                        <option>Web Development</option>
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <label for="ugender" class="form-label">Gender:</label><br>

                    <input type="radio" class="form-check-input" id="male" name="u_gender" value="male" checked> Male
                    <label class="form-check-label" for="male"></label>
                    <input type="radio" class="form-check-input" id="female" name="u_gender" value="female"> Female
                    <label class="form-check-label" for="female"></label>
                    <input type="radio" class="form-check-input" id="other" name="u_gender" value="Other"> Other
                    <label class="form-check-label" for="other"></label>

                </div>

                <div class="col-md-12 mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="std_pass"
                        required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="u_img" class="form-label">Upload a file:</label>
                    <input type="file" class="form-control" id="ur_img" name="u_std_img" required>



                </div>
                
                <input type="hidden" name="std_id" value="<?php echo $returndata['id']; ?>">

                <div class="col-md-12 mb-3">
                    <input type="submit" class="btn btn-primary" value="Update Information" name="update_info">
                </div>
            </form>
        </div>

    </div>


</body>

</html>