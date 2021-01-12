<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="task_details";
$con=mysqli_connect($host,$user,$password,$db);
function insert($tname,$description)
{
   $sql="insert into tasks(Tname,Descrption) values ($tname,$description);"
   $result=  mysqli_query($con,$sql);
}
function update($tname,$description,$id)
{
   $sql="update tasks set Tname='".$tname."' Descrption='".$description."' where tid = '".$id."'";
   $result=  mysqli_query($con,$sql);
}
function delete($tid)
{
   $sql_delete="insert into deleted_task select * from tasks where tid = '".$id."'";

   $sql="delete from tasks where tid = '".$id."'";
   $result=  mysqli_query($con,$sql);
}
function completed($tid)
{
   $sql_complete="insert into completed_task select * from tasks where tid = '".$id."'";

   $sql="delete from tasks where tid = '".$id."'";
   $result=  mysqli_query($con,$sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <form method="POST">
   
   </form>
</body>
</html>