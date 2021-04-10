
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Place Order</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 90%;
}
</style> 

</head>
 <body>
 <div class="tradingview-widget-container">
  <div id="tradingview_bfd7b"></div>
  <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/BSE-SENSEX/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": 980,
  "height": 610,
  "symbol": "BSE:SENSEX",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "1",
  "locale": "in",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "container_id": "tradingview_bfd7b"
}
  );
  </script>
</div>
<br><br>
<center>
 <form action="" method="POST">
  <div class="container">
  <label for="country" style="font-size: 30px;">Script Name</label>

   <br />
   <br />
   <div class="form-group">
    <div class="input-group">
   
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Company Name" class="form-control" height="200px"/>
    </div>
   </div></form>
   <br />
   <div id="result"></div>


  <br>
    <label for="fname">Quantity:</label>
    <input style="height: 45px;" type="number" id="quantity" name="quantity" placeholder="Buy Quantity....." required="">
    <br><br>

    <label for="lname">Upper Limit</label>
    <input style="height: 45px;" type="number" id="ulimit" name="ulimit" placeholder="Upper Limit....." required="">
    <br><br>


    <label for="lname">Lower Limit</label>
    <input style="height: 45px;" type="number" id="llimit" name="llimit" placeholder="Lowwe Limit....." required="">
    <br><br>

    <label for="subject">Secure Key</label>
    <input style="height: 45px;" type="password" placeholder="Enter Secure Key" name="secure_key"  required>
    <br><br>
    <input type="submit" value="Place Order" id="submit" name="submit">
    <BR></BR>
                <?php   if(isset($_GET['error']) && $_GET['error'] == 1){ ?>
        <h3 >*Enter Valid Secure Key*</h3>    
       <?php } ?>
       <?php   if(isset($_GET['error']) && $_GET['error'] == 2){ ?>
        <h3 >*You have exceeded your quantity of stocks*</h3>    
       <?php } ?>
        
            <br><BR>
  </form></center></div>
 </body>
</html>
<script>
$(document).ready(function(){

 load_data();
 

 function load_data(query)
 {
  $.ajax({
   url:"fetch2.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
    $(".company").on("click", function(){
        var thisElement = $(this).index();
        console.log("This element's data", $(this).text())
        $("#search_text").val($(this).text())
    })
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

<?php
include("connection.php");
session_start();
$a=$_SESSION["table"];

if(isset($_POST['submit'])){
  $secure_key = $_POST['secure_key'];
  $quantity =$_POST['quantity'];
  $ulimit =$_POST['ulimit'];
  $llimit =$_POST['llimit'];
  $company_name=$_POST['search_text'];
  echo $company_name;
  
  $byprice=($ulimit+$llimit)/2;
  if($a == $secure_key)
  {
    $query1 = "select * from `".$a."` where company_name='$company_name'";
    $data1 = mysqli_query($conn, $query1);
    $totalrows1 = mysqli_num_rows($data1);
    $row1 = mysqli_fetch_assoc($data1);
    mysqli_begin_transaction($conn);
           
    if($totalrows1==1){
    if ($row1['quantity']>=$quantity){
      try{
        if ($row1['byprice']<$byprice)
        {
          $pl="P";
        }
        else{
          $pl="L";
        }
        $addition = $quantity*$byprice;
        $query2="update `".$a."` set quantity=quantity-'$quantity',sell_quantity=sell_quantity+'$quantity',date_of_transaction=CURDATE(),profit_loss='$pl' where company_name='$company_name'";
         mysqli_query($conn, $query2);
         $query3="update user_account set limit_available=limit_available + '$addition' where secure_key='$secure_key'";
         mysqli_query($conn, $query3);
         header('location:homepage.php');
    mysqli_commit($conn);
  }catch (mysqli_sql_exception $exception) {
      mysqli_rollback($conn);
  
      throw $exception;
  }}
  
    else{
        echo "Failed to Login";
        header('location:sellform.php?error=2');
    }}

  }
  else{
    echo "Failed to Login";
    header('location:sellform.php?error=1');
}
}
else{
//echo "Failed to Login ";
}
?>