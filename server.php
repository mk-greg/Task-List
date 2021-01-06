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

    

?>