<html>
<header>
    <title>Access</title>
</header>
<body>
<form method="post" value="login.php">
    <input type="username" name="username" required="true">
    <input type="password" name="password" required="true">
    <button action="submit">Login</button>
    <?php

    include("config.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stmt = $PDO->prepare("SELECT id,username FROM admin WHERE username=:username and password=:password LIMIT 1");

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $password = md5($_POST["password"]);
        $stmt->bindParam(':username', $_POST["username"]);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("location: index.php");
        }

    } ?>
</form>
<br>
<br>
<br>
<br>
<!---->
</body>
<footer></footer>
</html>