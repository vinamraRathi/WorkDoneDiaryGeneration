<?php
    session_start();
    $Username=$_SESSION['Username'];
?>
<link rel="stylesheet" type="text/css"  href="et.css">
<head> 
      <title>Enter Leave</title>
      <body>
        <h3> Enter Leave Details </h3>
         <div class="loginbox1"> 
          <form method="POST" autocomplete="off"> <br>
            <p> Date: </p>
            <input type="text" name="date" placeholder="Your answer" required> <br>
            <p> Reason: </p>
            <input type="text" name="reason" placeholder="Your answer" required> <br>
            <a href="http://localhost/Dashboard.php">Return to dashboard!</a><br><br>
            <input type="submit" name="" value="Submit">
            </div>
        </form>
        <?php
            $conn = new mysqli('localhost','root','','diaryportal');
            if($conn->connect_error){
                die('Connection failed : '. $conn->connect_error);
            }
            else{
                $stmt = $conn->prepare("insert into leaves(Username,LDate,Reason) 
                values(?,?,?)");
                $stmt->bind_param("sss",$Username,$_POST['date'],$_POST['reason']);
                $stmt->execute();
                $stmt->close();
                $conn->close();
            }
        ?>
     </body>
  </head>
</html>