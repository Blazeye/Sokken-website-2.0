<?php

class Database_Model
{
  static public function ServerLogIn()
  {
    $servername = "localhost";
    $username = "cooldog";
    $password = "6supercool4";
    $database = "website";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error)
    {
        throw new Exception("connection failed ". mysqli_connect_error());
    }
    return $conn;
  }

  static public function findUserByEmail($email)
    {
      $conn = self::serverLogIn();
      try
      {
           $email = mysqli_real_escape_string($conn, $email);

           $sql = "SELECT * FROM users WHERE email='".$email."'";
           $result = mysqli_query($conn, $sql);
           if($result==false)
           {
             throw new Exception("query failed ". $sql . "Err" . mysqli_error($conn));
           }
           return mysqli_fetch_assoc($result);
       }
      finally
      {
           mysqli_close($conn);
      }
    }

  static public function storeUser($name, $email, $password)
  {
    $conn = self::serverLogIn();
    try
    {
      $name = mysqli_real_escape_string($conn, $name);
      $email = mysqli_real_escape_string($conn, $email);
      $password = mysqli_real_escape_string($conn, $password);

      $sql = "INSERT INTO users (email, name, password)
              VALUES ('$email', '$name', '$password')";
      $result = mysqli_query($conn, $sql);
      if($result==false)
      {
         throw new Exception("query failed ". $sql . "Err" . mysqli_error($conn));
      }
    }
      finally
      {
         mysqli_close($conn);
      }
    }
  }
?>
