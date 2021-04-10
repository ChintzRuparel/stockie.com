<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dbms_project");
$output = '';
session_start();
$a=$_SESSION["table"];
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM `.$a.`
  WHERE company_name LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM `".$a."` ORDER BY company_name
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>company name</th>
     
    </tr>
 ';
 $ctr=0;
 while($row = mysqli_fetch_array($result) )
 {
  $output .= '
   <tr>
    <td class="company">'.$row["company_name"].'</td>
    
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>