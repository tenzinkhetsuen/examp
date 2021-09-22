<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body
{
    background-image: url("penny.jpeg");
    background-repeat: no-repeat;
    background-size:cover;
    opacity:0.9;
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


.display_table
{
   
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content: center;
}


h1
{
    color:black;
    text-align:center;
    margin-top:-20px;
    margin-bottom:20px;
}
table
{
    border-collapse:collapse;
    opacity:0.8;
    margin:auto;
    background-color:#f0f0f0;
}
th,td
{
  border:1px solid black;
   padding:10px 30px;
  text-align:center;
}
th{
    text-transform:uppercase;
    
}
td
{
    font-size:16px;
}

</style>
</head>
<body>
<div>
 
    <div>
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

      
           
          <div class="display_table">
                 <h1>Customer Details</h1>
                
               <div>
                    <table>
                    <thead>
                     <tr>
                     <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                       <th>Amount</th>
                    
                      <th colspan="2">operation</th>
                    </tr>
                    </thead>
                   <tbody>
                  </div>
          <?php
          include 'connection.php';
          $selectquery = "select * from users";
          $query = mysqli_query($con,$selectquery);
          $numofrows = mysqli_num_rows($query);

           while($res = mysqli_fetch_array($query))
          {
            ?>
               <tr>
               <td><?php  echo $res['id']; ?></td>
               <td><?php echo $res['name']; ?></td>
               <td><?php echo $res['email']; ?></td>
               <td><?php echo $res['balance']; ?></td>
              <td><a href="transfer.php?idtransfer=<?php  echo $res['id']; ?>" ><i class="fa fa-meh-o " aria-hidden="true" style="color:red;"></i></a></td>
               </tr>
             <?php
          }
           ?>


</tbody>
</table>
</div>


</div>
 </div>

</body>
</html>


    



















