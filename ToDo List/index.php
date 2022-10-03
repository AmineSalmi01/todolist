<?php
include ('db_conn.php');
include ('insert.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>ToDO list</title>
</head>
<body>
    <form action="insert.php" method="POST">
         <div class="input-group mb-3">
         <input type="text" name="task" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
         <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit">Button</button>
         </div>
    </form>

    <?php
        $todo = new task(NULL,NULL,NULL);
        $rows = $todo->selectFromData();
        for($i=0;$i<count($rows);$i++){
            echo "<p>".$rows[$i]["title"]."</p>";
        }
        ?>
</body>
</html>