

    <?php  
     

    session_start();
if($_SESSION['admin']==true)
{ 
  $servername = "localhost";
$username = "";
$password = "";
$dbname = "";

    $dbcon=mysqli_connect($servername,$username,$password);  
    mysqli_select_db($dbcon,$dbname); 
    $delete_mac=$_GET['del'];  
    $delete_query="delete  from users WHERE  macid = '$delete_mac'";//delete query  
    $run=mysqli_query($dbcon,$delete_query);  
    if($run)  
    {  
    //javascript function to open in the same window   
        echo "<script>window.open('view_users.php?deleted=user has been deleted','_self')</script>";  
    }  
      


      }
else
{
    echo"<script>alert('Login First !')</script>";
}
    ?>  