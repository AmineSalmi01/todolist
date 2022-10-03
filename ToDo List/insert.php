<?php
include ("db_conn.php");


class task{

    public $title;
    public $status;
    Public $id;

    function __construct($id, $title, $status){
        $this->id = $id;      
        $this->title = $title;
        $this->status = $status;
    }

    function set_title($title){
        $this->title = $title;
    }
    function get_title(){
        return $this->title;
    }

    function set_status($status){
        $this->status = $status;
    }
    function get_status(){
        return $this->status;
    }

    function insertdata(){
                $todo = $GLOBALS["conn"]->query("INSERT INTO todo(title,checked) VALUES (
                    '$this->title', $this->status
                )");
                echo $todo;
    }   

    function selectFromData(){
        $sql = "SELECT title FROM todo";
        $todo = $GLOBALS["conn"]->query($sql);
        $rows=[];
        if($GLOBALS["conn"]->query($sql)->num_rows > 0){
            while($row =$todo->fetch_assoc()){
                $rows[]=$row;
            }
            return $rows;
        }
    }

    function edit(){
        $edit = $GLOBALS["conn"]->query("UPDATE todo SET
         title = '$this->title', checked = $this->status
         WHERE id = $this->id "
         );
    }

    function delete(){
        $delete = $GLOBALS["conn"]->query("DELETE FROM todo WHERE id = $this->id");
    }


}

// add in data
if(isset($_POST['submit'])){
     $todo = new task(NULL,$_POST["task"], 0);
     $todo->insertdata();
    
    echo "<script>alert('data saved successfully');document.location='index.php'</script>";
}

//edit data 
if(isset($_POST['edit'])){
    $todo = new task($_POST["id"] ,$_POST["task"], $_POST["checked"]);
    $todo->edit();
}

//delete data 
if(isset($_POST['delete'])){
    $todo = new task($_POST["id"] ,$_POST["task"], $_POST["checked"]);
    $todo->delete();
}




?>