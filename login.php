<?php
         
               
            $conn = mysql_connect('localhost','root','','kdlogin');
            
            if(! $conn )
            {
               die('Could not connect: ' . mysql_error());
            }
                        
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            //echo $name;
            //echo $username;
            mysql_select_db('kdlogin');
            
            $sql = "SELECT name FROM login WHERE username='$username' and password='$password' LIMIT 1;";
            $retval=NULL;
            $retval = mysql_query($sql );
            echo $retval;
            if(mysql_num_rows($retval)==0 )
            {
               die('SORRY WRONG USERNAME AND PASSWORD\n' );
            }
else
{
            echo "WELCOME\n";
}
            mysql_close($conn);
        ?>