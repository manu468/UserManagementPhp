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
            $sql = "select * from usersHello where email='$email'";
            $statement= $connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll();
             var_dump($result);
             }catch(PDOException $error){
                echo $sql . "<br>" . $error->getMessage();
                 }
            }?>
            
 <?php   if ($result && $statement->rowCount() > 0) { ?>
                <Results>
            
              <?php foreach ($result as $row) { ?>
 <?php  echo "id            "."firstname            "."lastname             "."email            "."password             "."Age           "."Date            ";?>
                  
            <?php echo ($Id=$row["userid"]); ?>
            <?php echo ($Fname=$row["firstname"]); ?>
            <?php echo ($Lname=$row["lastname"]); ?>
            <?php echo ($Em=$row["email"]); ?>
            <?php echo ($Pass=$row["password_usr"]); ?>
            <?php echo ($ace=$row["Age"]); ?>
            <?php echo ($row["date"]); ?>
                
            <?php } ?>  
            <?php } else { ?>
            > No results found for <?php echo ($email); ?>.<?php } ?>
            <?php echo "Do You want to edit this user? ";
            $UserInput =readline("[y or n]:");
            if ($UserInput == "y"){
                echo "Plese enter the following details";
    
                $NewUserId =readline("NewUserId:");
                echo "5 more fields\n"; 
                $NewFirstName = readline("NewFirstName:");
                echo "4 more \n";
                $NewLastName = readline("NewLastName:");
                echo "2 more to go\n";
                $NewPassword =readline("NewPassword:");
                echo "1 more to go\n";
                $NewAge = readline("NewAge:");
               
            }
              else {
                  echo "nothing happends with the selected option";
              }
            

if (isset($NewUserId,$NewFirstName,$NewLastName,$NewPassword,$NewAge)){
    require "config.php";
        try{
              $connection = new PDO($dsn, $username,$password, $options);
              $sql = "update usersHello set userid ='$NewUserId',
                                            firstname='$NewFirstName',
                                            lastname='$NewLastName',
                                            password_usr='$NewPassword',
                                            Age='$NewAge' 
                                            where email ='$email'";
              $statement= $connection->prepare($sql);
              $statement->execute();
              echo "success\n";
            }catch(PDOException $error){
        echo $sql . "<br>" . $error->getMessage();
                        } 

}
            