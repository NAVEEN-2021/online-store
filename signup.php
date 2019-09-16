<?php
require('configure.php');
?>
<html>
    <title>
        SIGNUP
    </title>
    <head>
        <link rel="stylesheet" href="signup.css">
        
    </head>
    <body>
        <?php
        $uname = $_POST['uname'];
        $name  = $_POST['name'];
        $mail = $_POST['mail'];
        $pwd = $_POST['pwd'];

        try{
        $sql = 'INSERT INTO signup (unames,names,emails,pwds) VALUES(?,?,?,?)'; 
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$uname,$name,$mail,$pwd]);
        
        echo 'successful';           
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        ?>
        <script src="signup.js">
            </script>
        <div class="main-c">
            <div class="img-c">
                <p>WELCOME TO<br>LOCAL<br>ONLINE<br>STORE</p>
            </div>
            <div class="s-c">
                    <p id="p">Registration Form</p>
            <div class="form-c">
                <form method="POST" action="signup.php">
                    <div class="ip">
                        <label class="lbl">USERNAME</label>
                        <input type="text" placeholder="USERNAME" name="uname">
                    </div>
                    <div class="ip">
                        <label class="lbl">NAME</label>
                        <input type="text" placeholder="NAME" name="name">
                    </div>
                    <div class="ip">
                        <label class="lbl">MAIL</label>
                        <input type="email" placeholder="MAIL" name="mail">
                        </div>
                    <div class="ip">
                        <label class="lbl">PASSWORD</label>
                        <input type="password" placeholder="PASSWORD" name="pwd">
                        </div>
                        <div class="ip">
                            <label class="lbl">CONFIRM-PASSWORD</label>
                            <input type="password" placeholder="CONFIRM-PASSWORD" name="pwd">
                            </div>
                    <div class="sup">
                        <button type="submit">SIGNUP</button>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </body>
</html>