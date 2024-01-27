<?php
    include ('connectdb.php');
  /*  if($connection)
    {
        echo "connection successfull"."<br>";
    }*/
    $name=$_POST['user'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $phone=$_POST['phoneno'];
    $query="CREATE TABLE details(username VARCHAR(20) UNIQUE,password VARCHAR(20) UNIQUE,phone VARCHAR(10),email VARCHAR(25));";
   if(mysqli_query($connection,$query))
    {
        /*echo "Table create"."<br>";*/
    }
  /*  else{
        echo "error".mysqli_error($connection);
    }*/
    $query1="INSERT INTO details(username,password,phone,email) VALUES('$name','$password','$phone','$email');";
    if(mysqli_query($connection,$query1))
    {
        echo "form submitted successfully";
    }
    else{
        echo "error:".mysqli_error($connection);
    }

?>