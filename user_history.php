<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="bnk3.png" type="image/gif" sizes="16X16">
<style type="text/css">
.header{
position:absolute;
top:0;
height:2cm;
width:100%;
left:0;
background-color:navy;
}
h1{
    color:white;
    text-align: center;
}

.footer{
    position: fixed;
    bottom: 0;
    height:0.5cm;
    left:0;
    width:100%;
    background-color:navy;
}
table,th,td{
    border:2px solid black;
    border-collapse:collapse;
    padding:10px;
}
.table{
    position:absolute;
    margin-top:2.5cm;
    margin-bottom:3cm;
    width:20cm;
    left:10cm;
}
.cls{
    position:absolute;
    margin-top:2.5cm;
    left:1cm;
    
}
input{
    background-color:navy;
    color:white;
    border-radius:10px; 
    padding:2px;
    width:2cm;
}
input:hover{
    background-color:grey;
    cursor:pointer;
}
th{
    background-color:rgb(203, 227, 242);
}
</style>
<?php
$ti=$_GET['ti'];
echo"<form action='index.html'>";
echo "<div class='header'>";
echo"<h1>"."STATE BANK"."</h1>";
echo"</div>";

$con= mysqli_connect("localhost","root","");
mysqli_select_db($con,"bank");
$sql1="select * from customer where cus_id='$ti'";
$res1=mysqli_query($con,$sql1);
while($getid=mysqli_fetch_assoc($res1))
{
    $trans_id = $getid['trans_id'];
}
$sql="select * from transaction where trans_id='$trans_id'";
$res=mysqli_query($con,$sql);
echo"<table class='table'>";
echo"<tr>";
echo"<th> DATE</th>";
echo"<th> NAME</th>";
echo"<th> WITHDRWALS</th>";
echo"<th> DEPOSITE</th>";
echo"<th> BALANCE</th>";
echo"</tr>";
while($data=mysqli_fetch_assoc($res))
{
 echo"<tr>";
 echo"<td>".$data['dot']."</td>";
 echo"<td>".$data['name']."</td>";
 echo"<td> ".$data['withdrawls']."</td>";
 echo"<td> ".$data['deposite']."</td>";
 echo"<td> ".$data['balance']."</td>";
 echo"</tr>";
}
echo"</table>";
echo"<div class='cls'>";
echo"<input type='submit' value='CLOSE' class='clas'";

echo"</div>";
echo"<div class='logo'><image src='t.jpg'></div>";
echo "<div class='footer'>"."</div>";
echo"</form >";
?>