<?php
    session_start();
    require 'dbconn.php';
    // echo "Helloooooooooooooooooooooooooo";

    if(isset($_POST['save_student'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $course = mysqli_real_escape_string($conn, $_POST['course']);

        $query = mysqli_query($conn, "INSERT INTO students 
                                      VALUES(NULL, '$name', '$email', '$phone', '$course' ) ");
        if($query){
            $_SESSION['message'] = "Student Added Successfuly..";
            header("Location: student-create.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Student NOT Added !!!";
            header("Location: student-create.php");
            exit(0);
        }
    }elseif(isset($_POST['update_student'])){
        
        $stu_id = mysqli_real_escape_string($conn, $_POST['id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $course = mysqli_real_escape_string($conn, $_POST['course']);

        $query = mysqli_query($conn, "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' 
                                      WHERE id='$stu_id'");
        
        if($query){
            $_SESSION['message'] = "Student Updated Successfuly..";
            header("Location: index.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Student NOT Updated !!!";
            header("Location: index.php");
            exit(0);
        }                              
        
    }elseif(isset($_GET['del'])){
        $stu_id = mysqli_real_escape_string($conn, $_GET['id']);
        $queryDel = mysqli_query($conn, "DELETE FROM students WHERE id='$stu_id'");

        if($query){
            $_SESSION['message'] = "Student Deleted Successfuly..";
            header("Location: index.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Student NOT Deleted !!!";
            header("Location: index.php");
            exit(0);
        } 
    }
?>