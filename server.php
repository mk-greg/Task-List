<?php

    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'todolist');

    $id = 0;
    $name = "";
    $description = "";
    $update = false;
    
    
    if (isset($_POST['save'])) { // if button is cliced
        $name = $_POST['name'];
        $description = $_POST['description'];
        $query = "INSERT INTO task (taskname, taskdescription) VALUES ('$name', '$description')";
        mysqli_query($db, $query);
        $_SESSION['message'] = "Task saved";
        header('location: index.php');
    }

    // To update
    if (isset($_POST['update'])) {
        $name =$_POST['name'];
        $description = $_POST['description'];
        $id = $_POST['id'];
        

        mysqli_query($db, "UPDATE task SET taskname='$name', taskdescription='$description' WHERE id=$id");
        $_SESSION['message'] = "Task updated succesfully!";
        header('location: index.php');
    }


    // Delete

    if(isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM task WHERE id=$id");
        $_SESSION['message'] = "Task Deleted!";
        header('location: index.php');
    }

  

    $results = mysqli_query($db, "SELECT * FROM task");


?>