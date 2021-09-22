<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/userstyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
.navbar{
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    text-align: center;
}
nav{
    display: flex; 
    position: relative;
    justify-content: space-around;
    align-items: center;
    padding: 10px 10px;
    background:rgba(50, 58, 58, 0.9);
}
.logo img{
    width: 70px;
    height: 70px;
    cursor: pointer;
    margin-right: 80px;
    border-radius:10px;
}
.nav_link{
    width: 70%;
    text-transform: uppercase;
    display: flex;
    list-style: none;
}
.nav_link li a{
    margin-left: 60px;
    letter-spacing: 2px;
    text-decoration: none;
    color: white;
    font-size: large;
    padding: 0 20px;
    right: 10%;
}
.nav_link li a:hover{
    border-right: 2px solid white;
    border-left: 2px solid white;
}


.main_div
{
    width:100%;
    height:20vh;
    background:white;
 
}
input
  {
      margin-top:10px;
      width:230px;
      height:40px;
      border-radius:10px;
      outline:none;
  }
 ::placeholder
 {
     padding:10px;
     
 }
button
{
    color:black;
    background:white;
    border-color:white;
   padding: 14px 20px;
  cursor: pointer;
  width: 100%;   
}
button:hover
 {
    
     background:green;
     border:none;
     opacity:0.8;
 }

 .card-body{
    background-image: url('visa.jpeg');
    background-size:cover;
    box-shadow: 5px 10px rgb(224,224,224);
     color:black;
     border-radius:20px;
 }
#button1
{
    width:50%;
    margin-left:30px;
}
label
{
    font-weight:bold;
}
 </style>
</head>
<body>
<div class="main_div">
<header>
            <nav class="navbar">
                <div class="logo">
                    <img src="liefde.jpeg" alt="not available">
                </div>
                <ul class="nav_link">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="customer.php">Customer</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="gallery.html">Photogallery</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </nav>
        </header>
     </div>
<div class="container">
        <div class="row">

          <div class="col-sm-6">
              <div class="card text-center" style=" border-radius:20px;margin-top:76px;color:white">
 <form method="POST">                                             
 <?php
 include 'connection.php';
 $ids=$_GET['idtransfer'];
 $showquery="select * from `users` where id=($ids) ";
 $showdata=mysqli_query($con,$showquery);
 if (!$showdata) {
 printf("Error: %s\n", mysqli_error($con));
 exit();
 }
 $arrdata=mysqli_fetch_array($showdata);
 ?> 
 <div class="card-body" style="height:372px;"> 
  <h3>SENDER DETAIL</h3>
  <label>Name:</label>
  <input type="text"  name="name1" value="<?php echo $arrdata['name']; ?>" required placeholder="Enter your name"/><br><br>
  <label>Email:</label>
  <input type="text" name="email1" value="<?php echo $arrdata['email']; ?>" required placeholder="Enter email id"/><br><br>
  <label>Amount:</label>
  <input type="text" name="amount1" value="" style="width:210px;" required placeholder="Enter amount"/><br><br>
 </div>
</div>
          </div>
          <div class="col-sm-6">
                <div class="card text-center" style="border-radius:20px;margin-top:75px;height:372px;">
                   
                   <div class="card-body">
                   <centre><h3>RECIEVER DETAIL</h3></centre>
                  
                        <label>Name</label>
                        <input type="text"  name="name2" value="" required placeholder="Enter your name"/><br><br>
                        <label>Email</label>
                        <input type="text" name="email2" value="" required placeholder="Enter email id"/><br><br>
                   
                        <button id="button1" name="submit" style="margin-top:20px";>Proceed to Pay</button>
                   </div>
                   </div>
          </div>
       </div>
    </div>
</div>
</form> 
<?php

include 'connection.php';

if(isset($_POST['submit']))
{
    
  
    $Sender_name=$_POST['name1'];
    $Sender_email=$_POST['email1'];
    $Sender=$_POST['amount1'];
    $Receiver_name=$_POST['name2'];
    $Receiver_email=$_POST['email2'];
     
  

    $ids=$_GET['idtransfer'];
    $senderquery="select * from `users` where id=$ids ";
    $senderdata=mysqli_query($con,$senderquery);
    error_reporting(0);
    if (!$senderdata)
    {
     printf("Error: %s\n", mysqli_error($con));
     exit();
    }
    $arrdata=mysqli_fetch_array($senderdata);   
    $receiverquery="select * from `users` where email='$Receiver_email' ";
    $receiver_data=mysqli_query($con,$receiverquery);
   
    if (!$receiver_data)
    {
     printf("Error: %s\n", mysqli_error($con));
     exit();
    }
    $receiver_arr=mysqli_fetch_array($receiver_data);
    $id_receiver=$receiver_arr['id'];
    if($arrdata['balance'] >= $Sender)
    {
      $decrease_sender=$arrdata['balance'] - $Sender;
      $increase_receiver=$receiver_arr['balance'] + $Sender;
       $query="UPDATE `users` SET `id`=$ids,`balance`= $decrease_sender  where `id`=$ids ";
       $rec_query="UPDATE`users` SET `id`=$id_receiver,`balance`= $increase_receiver where  `id`=$id_receiver ";
       $res= mysqli_query($con,$query);
       $rec_res= mysqli_query($con,$rec_query);
     
       if($res && $rec_res)
      {
       ?>
       <script>
       swal("Done!", "Transaction Successful!", "success");
        </script> 
      <?php
      }
      else
      {


      ?>
           <script>
       swal("Error!", "No such person exist", "error");
        </script> 
      <?php
      }
    }
  else
 {
  ?>
    <script>
       swal("Insufficient Balance", "Transaction Not  Successful!", "warning");
    </script> 
  <?php
   
 } 
}
?>
</body>
</html>