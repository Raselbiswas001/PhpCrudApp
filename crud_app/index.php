<?php

include("function.php");

$objCrudAdmin = new crudapp();

if (isset($_POST['add_info'])) {
    $return_msg = $objCrudAdmin->add_data($_POST);
}

$students = $objCrudAdmin->display_data();

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'delete') {
        $delete_id = $_GET['id'];
        $del_msg = $objCrudAdmin->delete_data($delete_id);
    }

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
            <h2><a style="text-decoration: none;" href="index.php">Student Database</a></h2>

            <?php if (isset($return_msg)) {
                echo $return_msg;
            } ?>

            <form action="" class="was-validated" method="post" enctype="multipart/form-data">
                <?php if (isset($del_msg)) {
                echo $del_msg;
            } ?>
                <div class="col-md-12 mb-3 mt-3">
                    <label for="uname" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="std_name"
                        required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <label for="std_email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="uemail" placeholder="Enter Your Email" name="std_email"
                        required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <label for="std_age" class="form-label">Age:</label>
                    <input type="number" class="form-control" id="uage" placeholder="Enter Your Age" name="std_age"
                        required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-md-12 mb-3 mt-3">
                    <label for="uage" class="form-label">Course Name:</label>
                    <select class="form-select" id="ucourse" name="std_course" required>
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

                    <input type="radio" class="form-check-input" id="male" name="gender" value="male" checked> Male
                    <label class="form-check-label" for="male"></label>
                    <input type="radio" class="form-check-input" id="female" name="gender" value="female"> Female
                    <label class="form-check-label" for="female"></label>
                    <input type="radio" class="form-check-input" id="other" name="gender" value="Other"> Other
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
                    <input type="file" class="form-control" id="ur_img" name="std_img" required>



                </div>
                <div class="col-md-12 mb-3">
                    <input type="submit" class="btn btn-primary" value="Add Information" name="add_info">
                </div>
            </form>
        </div>
        <div class="container my-4 p-4 shadow">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Course Name</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($student = mysqli_fetch_assoc($students)) { ?>
                    <tr>
                        <td>
                            <?php echo $student['id']; ?>
                        </td>
                        <td>
                            <?php echo $student['std_name']; ?>
                        </td>
                        <td>
                            <?php echo $student['std_email']; ?>
                        </td>
                        <td>
                            <?php echo $student['std_age']; ?>
                        </td>
                        <td>
                            <?php echo $student['std_course']; ?>
                        </td>
                        <td>
                            <?php echo $student['std_gender']; ?>
                        </td>
                        <td><img style="height: 100px;" src="upload/<?php echo $student['std_img']; ?>"></td>
                        <td>
                            <a class="btn btn-success"
                                href="edit.php?status=edit&&id=<?php echo $student['id']; ?>">Edit</a>
                            <a class="btn btn-warning"
                                href="?status=delete&&id=<?php echo $student['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>