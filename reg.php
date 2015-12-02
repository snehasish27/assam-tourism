<?php
         
               
            $conn = mysql_connect('localhost','root','','kdlogin');
            
            if(! $conn )
            {
               die('Could not connect: ' . mysql_error());
            }
                        
            
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            //echo $name;
            //echo $username;
            mysql_select_db('kdlogin');
            
            $sql = " INSERT INTO login (name,username,emailid,password)
VALUES('$name','$username','$email','$password');";
            
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval )
            {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";
            
            mysql_close($conn);
        ?>