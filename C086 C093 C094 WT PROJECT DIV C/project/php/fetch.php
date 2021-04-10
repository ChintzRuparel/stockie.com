<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dbms_project");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM company_details
  WHERE company_name LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM company_details ORDER BY company_name
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
 while($row = mysqli_fetch_array($result) AND $ctr<=4)
 {
  $output .= '
   <tr>
    <td class="company">'.$row["company_name"].'</td>
    
   </tr>
  ';
  $ctr=$ctr+1;
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>