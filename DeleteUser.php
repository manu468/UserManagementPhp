<?php

$val = getopt("e:");
if ($val !== false) {
   // echo var_export($val, true);
}
else {
    echo "Could not get value of command line option\n";
}

$email = array_shift($val);
if (isset($email)){
    require "config.php";
    try{
        $connection = new PDO($dsn, $username,$password, $options);
        $sql = "delete from usersHello where email= '$email'";
        $statement= $connection->prepare($sql);
        $statement->execute();
        echo "user succesfully deleted";
        }catch(PDOException $error){
        echo $sql . "<br>" . $error->getMessage();
         }
    }?>