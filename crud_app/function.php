<?php

Class CrudApp{
    private $conn;

    public function __construct(){
        
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "crud_app";

        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if(!$this->conn){
            die("Database Connection Error!");

        }
    }

    public function add_data($data){
        $std_name = $data['std_name'];
        $std_email = $data['std_email'];
        $std_age = $data['std_age'];
        $std_course = $data['std_course'];
        $std_gender = $data['gender'];
        $std_img = $_FILES['std_img']['name'];
        $tmp_name = $_FILES['std_img']['tmp_name'];

        $query = "INSERT INTO students(std_name,std_email,std_age,std_course,std_gender,std_img) VALUE('$std_name','$std_email',$std_age,'$std_course','$std_gender','$std_img')";

        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name,'upload/'.$std_img);

            return "Information Added Successfully";

        }



    }
    public function display_data(){
        $query = "SELECT * FROM students";
        if(mysqli_query($this->conn, $query)){
            $returndata = mysqli_query($this->conn, $query);
            return $returndata;
        }
    }
    public function display_data_by_id($id){
        $query = "SELECT * FROM students WHERE id=$id";
        if(mysqli_query($this->conn, $query)){
            $returndata = mysqli_query($this->conn, $query);
            $studentdata = mysqli_fetch_assoc($returndata);
            return $studentdata;
        }
    }

    public function update_data($data){
        $std_name = $data['u_std_name'];
        $std_email = $data['u_std_email'];
        $std_age = $data['u_std_age'];
        $std_course = $data['u_std_course'];
        $std_gender = $data['u_gender'];
        $idno = $data['std_id'];
        $std_img = $_FILES['u_std_img']['name'];
        $tmp_name = $_FILES['u_std_img']['tmp_name'];

        $query = "UPDATE students SET std_name='$std_name', std_email='$std_email', std_age=$std_age, std_course='$std_course',std_gender='$std_gender', std_img='$std_img' WHERE id=$idno";

        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name,'upload/'.$std_img);

            return "Updated Successfully";

        }



    }


    public function delete_data($id){
        $catch_img = "SELECT * FROM students WHERE id=$id";
        $delete_std_info = mysqli_query($this->conn, $catch_img);
        $std_infoDle = mysqli_fetch_assoc($delete_std_info);
        $deleteImg_data = $std_infoDle['std_img'];
        $query = "DELETE  FROM students WHERE id=$id";
    if(mysqli_query($this->conn, $query)){
        unlink('upload/'.$deleteImg_data);
        return "Deleted Successfully";
    }

    }


}

?>