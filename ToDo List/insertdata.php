<?php
if(isset($_POST['submit'])){
    require_once ("insert.php");
    $todo = new task(NULL,"title1", 0);
    echo $todo->title;

    $todo->insertdata();
    
    // echo "<script>alert('data saved successfully');document.location='index.php'</script>";
}
?>