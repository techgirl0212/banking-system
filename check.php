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
.footer{
    position: fixed;
    bottom: 0;
    height:0.5cm;
    left:0;
    width:100%;
    background-color:navy;
}
h1{
    color:white;
    text-align: center;
}
.msg1{
    position:absolute;
    margin-top:5cm;
    width:16cm;
    height:4cm;
    
    left:14cm;
    border-style: solid;
  border-color:green;
}
.msg2{
    position:absolute;
    margin-top:5cm;
    width:16cm;
    height:4cm;
    
    left:14cm;
    border-style: solid;
  border-color:red;
}
h3{ margin-top:1.5cm;
    font-size:20px;
    margin-left:0.5cm;
}
.cls{
    position:absolute;
    margin-top:4cm;
    left:3cm;
    
}
input{
    background-color:navy;
    color:white;
    border-radius:10px; 
    padding:2px;
    width:2cm;
}
input:hover{
    background-color:red;
    cursor:pointer;
}

</style>
</head>
</html>
<?php 

echo "<div class='header'>"."<h1>"."STATE BANK"."</h1>"."</div>";
echo"<form action='index.html'>";
$debitor =$_POST['debitor'];
$creditor =$_POST['creditor'];
$amount=$_POST['amount'];
date_default_timezone_set("Asia/Calcutta");
$date=date("Y-m-d H:i:s");
echo "DATE :" .$date."<br>";

$con =mysqli_connect("localhost","root","");
mysqli_select_db($con,"bank");
$sql1 = "select * from customer where cus_id='$debitor'";
$sql2 = "select * from customer where cus_id='$creditor'";
$d=mysqli_query($con,$sql1);
$c=mysqli_query($con,$sql2);
while($data=mysqli_fetch_assoc($d))
{
    $damount =$data['balance'];
    $debitortransid=$data['trans_id'];
    $debitorname=$data['cus_name'];
    $sender=$data['cus_name'];
    $credit=$damount-$amount;
}
while($data=mysqli_fetch_assoc($c))
{
    $camount =$data['balance'];
    $creditorname=$data['cus_name'];
    $creditortransid=$data['trans_id'];
    $debit=$camount+$amount;
}

if($amount<=$damount )
{    
    if($debitor != $creditor)
    {
    $send ="update customer set balance ='$debit' where cus_id='$creditor'";
    $receive ="update customer set balance ='$credit' where cus_id='$debitor'";
    mysqli_query($con,$send);
    mysqli_query($con,$receive);
    $historyd="insert into transaction values('$debitortransid','$date','$creditorname','$amount','-','$credit')";
    $historyc="insert into transaction values('$creditortransid','$date','$debitorname','-','$amount','$debit')";
    mysqli_query($con,$historyd);
    mysqli_query($con,$historyc);
    echo"<div class='msg1'>";
    echo "<h3>".$sender." "."YOUR TRANSACTION IS SUCCESSFUL !"."</h3>";
    echo"<image src='t2.gif'>";
    echo"</div>";
    }
    else{
        echo"<div class='msg2'>";
    echo "<h3>"."TRANSACTION UNSUCCESSFUL ! "."<br>"."SENDER AND RECEIVER'S NAME CAN'T BE SAME."."</h3>";
    echo"<image src='f1.png'>";
    echo"</div>";
    }

}
else
{
   
    echo"<div class='msg2'>";
    echo "<h3>".$sender." "."YOU DONT HAVE ENOUGH BALANCE IN YOUR ACCOUNT !"."</h3>";
    echo"<image src='f1.png'>";
    echo"</div>";
}
echo"<div class='cls'>";
echo"<input type='submit' value='CLOSE' class='clas'";

echo"</div>";

echo "<div class='footer'>"."</div>";
?>