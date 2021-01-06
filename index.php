<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Crud</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
            <button class="btn" type="submit" name="save">Done</button>
        </div>
    </form>
</body>
<?php if(isset($_SESSION['message'])) :?>
    <div class="msg">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
    </div>
<?php endif ?>
</html>