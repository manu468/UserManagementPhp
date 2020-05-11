<?php 

 $val = getopt("p:q:r:s:t:u:");
//$val = getopt(array("id:,fname:,lname:,email:,password:,age:"));
//$val = getopt(null, ["name:"]);
//var_dump($val);

if ($val !== false) {
 	 var_export($val, true);
 }
 else {
 	echo "Could not get value of command line option\n";
 }
     $userid = array_shift($val);
     $Real_name =array_shift($val);
     $First_name = array_shift($val);
     $Last_name = array_shift($val);
     $Email = array_shift($val);
     $password_usr = array_shift($val);
     //$Age = array_shift($val);

//var_dump($First_name); 
$password_hash= md5($password_usr);
 $password_hash ."\n";
$today = date("Y-m-d"); 
//echo $today . "\n";
$password_expiry =date('Y-m-d',strtotime('+30 days',strtotime($today))) . PHP_EOL;
//echo $password_expiry;

if (isset($userid,$Real_name,$First_name,$Last_name,$Email,$password_usr)){
     require "config.php";
     try{
          $connection = new PDO($dsn, $username,$password, $options);
          $sql= "insert into users (UserID,Real_name,First_name,Last_name,Email,centerID,Privilege,PSCPI,Active,Password_hash,Password_expiry) values (?,?,?,?,?,?,?,?,?,?,?)";
          $statement= $connection->prepare($sql);
          $statement->execute([$userid,$Real_name,$First_name,$Last_name,$Email,1,0,'N','N',$password_hash,$password_expiry]);
          echo "User added Successfully\n";
          }catch(PDOException $error) {
                                        echo $sql . "<br>" . $error->getMessage();
                                   }
}





                