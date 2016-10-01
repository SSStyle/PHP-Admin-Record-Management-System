
<?php
session_start();
if($_SESSION['admin']==true)
{
?>
    <html>  
    <head lang="en">  
        <meta charset="UTF-8">  
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">  
        <title>Registration</title>  
    </head>  
    <style>  
        .login-panel {  
            margin-top: 150px;  
      
    </style>  
    <body>  
      
    <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
        <div class="row"><!-- row class is used for grid system in Bootstrap-->  
            <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Registration</h3>  
                    </div>  
                    <div class="panel-body">  
                        <form role="form" method="post" action="register.php">  
                            <fieldset>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="mac" name="mac" value="mac" type="text" autofocus>  
                                </div>  
      
                                   
      
      
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >  
      
                            </fieldset>  
                        </form>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
      
    </body>  
      
    </html>  
      
<?php  

 session_start();
    echo $_SESSION['admin'];
$servername = "localhost";
$username = "u956915835_admin";
$password = "eminem2883";
$dbname = "u956915835_4ita";

    $dbcon=mysqli_connect($servername,$username,$password);  
    mysqli_select_db($dbcon,$dbname); 

    if(isset($_POST['register']))  
    {  
        $user_mac=$_POST['mac'];//here getting result from the post array after submitting the form.  
      
      
        if($user_mac=='')  
        {  
            //javascript use for input checking  
            echo"<script>alert('Please enter the mac id')</script>";  
    exit();//this use if first is not work then other will not show  
        }  
      
       
      
        
        $check_mac_query="select * from users WHERE macid='$user_mac'";  
        $run_query=mysqli_query($dbcon,$check_mac_query);  
      
        if(mysqli_num_rows($run_query)>0)  
        {  
    echo "<script>alert('macid $user_mac is already exist in our database, Please try another one!')</script>";  
    exit();  
        }  
    //insert the user into the database.  
        $insert_user="insert into users (macid,expdate) VALUES ('$user_mac',DATE_ADD(now(),INTERVAL 31 DAY))";  
        if(mysqli_query($dbcon,$insert_user))  
        {  
            echo"<script>alert('success!')</script>";  
        }  
      
      
      
    }  
      
    ?>  


     <?php
}
else
{
    echo"<script>alert('Login First !')</script>";
}
    ?>