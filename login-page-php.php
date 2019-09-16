<html>
    <title>Signup form</title>
    <head>
            <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="login.css">

        </head>
    <body>
    <?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
{
    header("location:main-page.html");
    exit;
}
$uname = $mail = $pwd ="";
$unmaeerr = $mailerr = $pwderr = "";
$u = $_POST["username"];
$m = $_POST["email"];
$p = $_POST["password"];

function test($data){
    $data = stripcslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
// $uname = test($_POST["username"]);
// $mail = test($_POST["email"]);
// $pwd = test($_POST["password"]);
// }
if(isset($u) && $u = null)
{
    echo $nameerr;}
else{
    $uname = test($u);}
if(isset($m) && $m = null)
{
    echo $mailerr;}
else{
    $mail = test($m);}
if(isset($p) && $p = null)
{
    echo $pwderr;}
else{
    $pwd = test($p);}
}
if(empty($nameerr) && empty($mailerr) && empty($pwderr)){
$sql = 'SELECT ids,emails,passwords FROM signup WHERE ids = :ids ';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username',$param_uname,PDO::PARAM_STRING);
$param_uname = test($u);
if($stmt->execute())
{
    if($stmt->rowCount() == 1)
    {
        if($row = $stmt->fetch())
        {
            $uname = $row["username"];
            $mail = $row["email"];
            $p_match = $row["password"];
            if(password_verify($p_match,$pwd))
            {
                session_start();
                $_SESSION["id"] = $uname;
                $_SESSION["loggedin"] = true;
                header("location:main-page.html");
            }
            else{
                $pwderr = "WRONG PASSWORD";
            }
        }
        else{
            $unameerr = "USER NOT FOUND";
        }
    }
    else{
        echo "SOMETHING WENT WRONG";
    }
    $unset($stmt);
}
$unset($conn);
}
?>



        <form>
        <div class="login-form">
            <h3><b>LOGIN</b></h3>
            <label class="labl" for="name"><p>Username</p></label>
            <br><input id="name" type="text" name="username" title="login" placeholder="USERNAME">
            <br><label class="labl" for="email"><p>Email</p></label>
           <br><input id="email"type="email" name="email" title="email" placeholder="MAIL">
            <br><label class="labl" for="password"><p>Password</p></label>
            <br><input id="password" type="password" name="password" title="password" placeholder="PASSWORD"><br><br>
            <input id="submit" type="submit" value="LOGIN">
        </div>
    </form>
    </body>
</html>