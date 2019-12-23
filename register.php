<html>
<header>
    <title>Register</title>
</header>
<body>
<form method="post" value="register.php">
    <input type="username" name="username" required="true">
    <input type="password" name="password" required="true">
    <button action="submit">Register</button>
    <?php
    include("config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $query = "INSERT INTO admin(username,password) values(:username,:password)";
        $statement = $PDO->prepare($query);
        $params = array(
            'username' => $_POST["username"],
            'password' => md5($_POST["password"])
        );
        $statement->execute($params);
        $user_data = $statement->fetch();

        header("location: index.php");
    }
    ?>
</form>
<br>
<br>
<br>
<br>
</body>
<footer></footer>
</html>