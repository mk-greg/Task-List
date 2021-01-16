<?php include('server.php'); ?>
<?php
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM task WHERE id=$id");

        if (count($record) == 1){
            $n = mysqli_fetch_array($record);
            $name = $n['name'];
            $address = $n['address'];
        }
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
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" > Edit</a>
                    </td>
                    <td>
                    <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <form method="post" action="server.php">
        <div class="input-group">
            <label>Task</label>
            <input type="text" name="name" value="">
        </div>
        <div class="input-group">
            <label>Description</label>
            <input type="text" name="description" value="">
        </div>
        <div class="input-group">
        <?php if($update == true): ?>
                <button class="btn" type="submit" name="update" style="background: $556B2F;">UPDATE</button>
            <?php else: ?>
                <button class="btn" type="submit" name="save">Done</button>
            <?php endif ?>
        </div>
    </form>
</body>

</html>