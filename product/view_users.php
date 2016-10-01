
<?php
session_start();
if($_SESSION['admin']==true)
{
?>
    <html>  
    <head lang="en">  
        <meta charset="UTF-8">  
        <link type="text/css" rel="stylesheet" href="bootstrap.css"> <!--css file link in bootstrap folder-->  
        <title>View Users</title>  
    </head>  
    <style>  
        .login-panel {  
            margin-top: 150px;  
        }  
        .table {  
            margin-top: 50px;  
      
        }  
      
    </style>  
      
    <body>  
      
      <a href="register.php"><button class="btn btn-success">Insert</button></a>
      <a href="logout.php"><button class="btn btn-danger">log out</button></a>

    <div class="table-scrol">  
        <h1 align="center">All the Users</h1>  
      
    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
      
      
        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
            <thead>  
      
            <tr>  
      
                <th>User Mac</th>  
                <th>User Expiry</th>  
                
            </tr>  
            </thead>  
      
     
            <?php  

   
  $servername = "localhost";
$username = "";
$password = "";
$dbname = "";

    session_start();
    echo $_SESSION['admin'];
    $dbcon=mysqli_connect($servername,$username,$password);  
    mysqli_select_db($dbcon,$dbname); 
            $view_users_query="select * from users";//select query for viewing users.  
            $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.  
      
            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
            {  
                $user_mac=$row[0];  
                $user_expiry=$row[1];  
                
      
      
      
            ?>  
      
            <tr>  
    <!--here showing results in the table -->  
                <td><?php echo $user_mac;  ?></td>  
                <td><?php echo $user_expiry;  ?></td>  
               
                <td><a href="delete.php?del=<?php echo $user_mac ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
            </tr>  
      
            <?php } ?>  
      
        </table>  
            </div>  
    </div>  
      
      
    </body>  
      
    </html>  

    <?php
}
else
{
    echo"<script>alert('Login First !')</script>";
}
    ?>