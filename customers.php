 <!DOCTYPE html>
<html>
<head>
<link rel="icon" href="bnk3.png" type="image/gif" sizes="16X16">
<script language="javascript" type="text/javascript">
function showUser(x)
{
  var str=document.getElementById(x).name;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
  {
      if(this.readyState == 4 && this.status == 200)
      {
          document.getElementById("txtHint").innerHTML=this.responseText;
      }
  } ;
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
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
    position:absolute;
    margin-top:4cm;
    left:4cm;

}
table,th,td{
    border:2px solid black;
    border-collapse:collapse;
    padding:15px;
}
th{
    background-color:rgb(203, 227, 242);
}
h2{
    position:absolute;
    margin-top:2.6cm;
    left:17cm;
    text-align:center;
    
}
.sbmt,table{
    border:none;
    
}
input{
    border-radius:8px;
    background-color:navy;
    color:white;
    width:2cm;
    height:0.8cm;
}
input:hover{
    background-color:grey;
    cursor:pointer;
    
}
</style>
</head>

</html>

 <?php

echo "<div class='header'>"."<h1>"."STATE BANK"."</h1>"."</div>";
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"bank");
$sql="SELECT * FROM customer";
$res=mysqli_query($con,$sql);
echo"<form id='txtHint' action='user_history.php' method='POST' >";
echo"<h2>"."CUSTOMER DETAIL"."</h2>";
echo"<div class='table'>";

echo"<table>";
echo"<tr>";
   echo"<th>"."CUS_ID"."</th>";
   echo"<th>"."NAME"."</th>";
   echo"<th>"."ACCOUNT NO."."</th>";
   echo"<th>"."CIF NO."."</th>";
   echo"<th>"."ACCOUNT TYPE"."</th>";
   echo"<th>"."ADDRESS"."</th>";
   echo"<th>"."PHONE NO."."</th>";
   echo"<th>"."EMAIL"."</th>";
   echo"<th>"."DOB"."</th>";
   
echo"</tr>";
while($data=mysqli_fetch_assoc($res))
{   $_SESSION['ti'] = $data['cus_id'];
    echo"<tr>";
    echo"<td>".$_SESSION['ti']."</td>";
    
    echo"<td>".$data['cus_name']."</td>";
     echo"<td>".$data['ac_no']."</td>";
    echo"<td>".$data['cif_no']."</td>";
    echo"<td>".$data['ac_type']."</td>";
    echo"<td>".$data['address']."</td>";
    echo"<td>".$data['phone']."</td>";
    echo"<td>".$data['email']."</td>";
    echo"<td>".$data['dob']."</td>";
    
    echo"<td class='sbmt'>"."<input type='button' name='".$_SESSION['ti']."' id='".$_SESSION['ti']."' value='VIEW'  onclick='showUser(this.id)'>"."</td>";
 echo"</tr>";  
}
echo"</table>";
echo"</form>";
echo"</div>";
echo "<div class='footer'>"."</div>";
?>  
