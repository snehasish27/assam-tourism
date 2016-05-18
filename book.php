<!DOCTYPE html>
<html lang="en">
<head>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    <title>
        hotel payment
    </title>
    <style>
        body{
            font-family: Raleway;
            background-image: url(./image/book.jpg);
            text-align: center;
            background-size: cover;
        }
        .payment{
            background-color: rgba(142, 149, 145, 0.76);
            width:500px;
            margin-top:50px;
            display: inline-block;
            box-shadow: 1px 1px 3px black;
        }
        .heading{
            border:1px solid black;
            padding: 3px;
            background-color:black;
            color: white;
        }
        .title{
            text-transform: capitalize;
            font-weight: 700;
            font-size:30px;
        }
        .info{
            color:black;
            margin-top: 20px;
            margin-left: 20px;
            font-size: 17px;
        }
        .t1{
            padding: 10px;
            border-radius:3px;
            border: 1px solid rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
            outline: none;
            width: 350px;
            margin-top: 15px;
        }
        .book{
            padding: 5px;
            margin-top: 15px;
            border-radius: 3px;
            width:170px;
            border: 1px solid black;
            background-color: rgba(220, 20, 60, 0.83);
            outline: none;
            font-size:18px;
            margin-bottom: 15px;
        }
        .button{
            padding:5px;
            font-size: 18px;
            border:1px solid cadetblue;
            background-color: steelblue;
            margin:10px;
            border-radius: 5px;
            outline: none;
        }
        
    
    </style>
    <body>
        <div class="payment">
            <div class="heading">
    <h3 class="title" id="regname">PAYMENT DETAILS</h3>
  </div>
            <div class="panel-body">
                
                    <?php
         
               
            $conn = mysql_connect('localhost','root','','kdlogin');
            
            if(! $conn )
            {
               die('Could not connect: ' . mysql_error());
            }
                        
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $contact =$_POST['contact'];
            $hotel = $_POST['hotel'];
            $room = $_POST['room'];
            $add = $_POST['add'];
            $uniqueId= 'BAT_'.time();
            
            //echo $name;
            //echo $username;
            mysql_select_db('kdlogin');
            $sql_check=" SELECT rooms,rent FROM hotelroom WHERE hotelname='$hotel';";
            $retval= mysql_query($sql_check,$conn);
            if(mysql_num_rows($retval)==0)
            {
                die('Wrong Hotel Name');
            }
            $row=mysql_fetch_assoc($retval);
            $cost=$row["rent"]*$room;
            //echo $row["rooms"]," hh \n",$room;
            if($room<$row["rooms"])
            {
                $sql= " INSERT INTO bookdata VALUES('$uniqueId','$name','$email',$age,$contact,'$hotel',$room,'$add','pending')";
                $retval = mysql_query($sql,$conn);
                if(! $retval )
                {
                    die('cant update:'.mysql_error());
                }
                echo '<form name="payment" role="form" action="payment.php" method="post">';
                echo '<p class="info">Welcome : '.$name.'</p>';
                echo '<p class="info">Payment ID : '.$uniqueId.'</p>';
                echo '<p class="info">Total Cost : '.$cost.'</p><br>';
                echo '<input type="hidden" name="uid" value="'.$uniqueId.'">';
                echo '<input type="hidden" name="hname" value="'.$hotel.'">';
                echo '<input type="hidden" name="troom" value="'.$row["rooms"].'">';
                echo '<input type="hidden" name="nroom" value="'.$room.'">';
                echo ' <input class="t1" type="text" name="debitcard" id="debitcard" placeholder="Enter Your Debit card no" required pattern="[0-9]{16}">
                    <input class="t1" type="text" name="ccv" id="ccv" placeholder="Enter the CCV no" required pattern="[0-9]{3}"><br>
                    <input class="book" type="submit" name="pay" value ="Confirm payment"></form>';
            }
            else{
                echo '<p class="negetive">Sorry The no of rooms that you have aske is not present </p>';
                echo ' <div style="text-align: center;">
          <a href="book.html"><button type="button" class="button" >Re-Book</button></a></div>';
            }
            /*
            $sql = " INSERT INTO login (name,username,emailid,password)
VALUES('$name','$username','$email','$password');";
            
            $retval = mysql_query( $sql, $conn );

            
            if(! $retval )
            {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";
            */
            mysql_close($conn);
        ?>
                    
                   
                
                
            
            </div>
            
        </div>
    </body>
    
    </head>
</html>

