<?php include('server.php'); 

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $tasklist = mysqli_query($db, "SELECT * FROM task WHERE id=$id");
        $task = mysqli_fetch_array($tasklist);
        $name = $task['taskname'];
        $description = $task['taskdescription'];
        $id = $task['id'];

    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Crud</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body></body>
    <?php if(isset($_SESSION['message'])) :?>
        <div class="msg">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
        </div>
    <?php endif ?>
    
    <?php $results = mysqli_query($db, "SELECT * FROM task"); ?> 
    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        
        <tbody>
            <?php while ($row = mysqli_fetch_array($results)){ ?>
                <tr>
                    <td><?php echo $row['taskname']; ?></td>
                    <td><?php echo $row['taskdescription']; ?></td>
                    <td>
                        <a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
                    </td>
                    <td>
                        <a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>" >Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <form method="post" action="server.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="input-group">
            <label>Task</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="input-group">
            <label>Description</label>
            <input type="text" name="description" value="<?php echo $description; ?>">
        </div>
        <div class="input-group">
        <?php if($update == true): ?>
                <button class="btn" type="submit" name="update">Update</button>             
            <?php else: ?>
                <button class="btn" type="submit" name="save">Done</button>
            <?php endif ?>
        </div>
    </form>
</body>

</html>