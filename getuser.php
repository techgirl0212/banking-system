<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="bnk3.png" type="image/gif" sizes="16X16">
<script language="javascript" type="text/javascript">
function show()
{
    window.open('money_transfer.php','blank');
}
function show()
{
    window.open('history.php','blank');
}
</script>


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
.table{
    
    margin-top:3cm;
    left:5cm;
    width:auto;

}
table,th,td{
    border:none;
    border-collapse:collapse;
    padding:15px;
}
th{
    text-align:left;
    background-color:none;
    
}

table{
    border:none;
    
    margin-top:0.8cm;
    
    
}

.opt{
    position:absolute;
    margin-top: 6cm;
    right:0%;
    width:6cm;
    height: auto;
    color:white;
    

}
button{
    padding: 10px;
    text-align: left;
    background-color: navy;
    border-radius: 10px;
    margin:7px;
    color:white;
}
.menu{
    position:absolute;
    margin-top: 6cm;
    right:0;
    width:5cm;
    height: auto;
    color:white;
    
}#menu1{
    padding: 10px;
    text-align: left;
    background-color: navy;
    border-radius: 10px;
    margin:7px;
}
#menu1:hover{
background-color: grey;
cursor: pointer;
}
 #menu2{
    padding: 10px;
    text-align: left;
    background-color: navy;
    border-radius: 10px;
    margin:7px;
}
#menu2:hover{
background-color: grey;
cursor: pointer;
}
a{
    color:white;
}
a:link{
    text-decoration: none;
}
.heading{
    position:absolute;
    margin-top:3cm;
    left: 25cm;
}
a{
    color:white;
}
a:link{
    text-decoration: none;
}
td{
    font-weight: bold;
}
.logo{
position:absolute;
margin-top:7cm;
left:17cm;
}
</style>

</head>
</html>
<?php

echo"<form id='money'>";
$q=$_GET['q'];

echo "<div class='header'>"."<h1>"."STATE BANK"."</h1>"."</div>";
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"bank");
$sql="SELECT * FROM customer where cus_id='$q'";
$res=mysqli_query($con,$sql);
echo"<form id='gu' action='user_history.php' method='POST'>";
echo"<div class='heading'>";
echo"<table>";
echo"<tr>";
echo"<td>STATE BANK</td>";
echo"</tr>";
echo"<tr>";
echo"<td>Near Petrol Pump, Kanker(C.G.)</td>";
echo"</tr>";
echo"<tr>";
echo"<td></td>";
echo"</tr>";
echo"<tr>";
echo"<td></td>";
echo"</tr>";
echo"<tr>";
echo"<td>Phone : 23455634</td>";
echo"</tr>";
echo"<tr>";
echo"<td>Email : statebank@gamil.com</td>";
echo"</tr>";
echo"<tr>";
echo"<td>Branch Code : 00004</td>";
echo"</tr>";
echo"<tr>";
echo"<td>IFSC : EXAMPLE00034</td>";
echo"</tr>";
echo"</table>";
echo"</div>";
echo"<div class='logo'><image src='cus1.jpg'></div>";

echo"<div class='table'>";

echo"<table>";
while($data=mysqli_fetch_assoc($res))
{   $i = $data['cus_id'];
    echo"<tr>";
    echo"<td>"."CUS_ID :"."</td>"."<td>".$i."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."NAME :"."</td>"."<td>".$data['cus_name']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."ACCOUNT NO. :"."</td>"."<td>".$data['ac_no']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."CIF NO. :"."</td>"."<td>".$data['cif_no']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."ACCOUNT TYPE :"."</td>"."<td>".$data['ac_type']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."ADDRESS :"."</td>"."<td>".$data['address']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."PHONE NO. :"."</td>"."<td>".$data['phone']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."EMAIL :"."</td>"."<td>".$data['email']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."DOB :"."</td>"."<td>".$data['dob']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."BALANCE :"."</td>"."<td>".$data['balance']."</td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td>"."TRANSACTION ID :"."</td>"."<td>".$data['trans_id']."</td>";
    echo"</tr>";
}
echo"</table>";
echo"</div>";
echo"<div class='menu'>";
echo"<div id='menu1'>";
echo'<a href="money_transfer.php?tt='.urlencode($i).'">'."TRANSFER MONEY</a>";

echo"</div>";
echo"<div id='menu2'>";
echo'<a href="user_history.php?ti='.urlencode($i).'">'."SHOW HISTORY</a>";
echo"</div>";
echo"</div>";
echo "<div class='footer'>"."</div>";
echo"</form>";
?>