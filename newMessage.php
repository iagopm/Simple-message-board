<html>
<header>
    <title>Register</title>
</header>
<body>
<form method="post" value="newMessage.php">
    <input type="text" name="message" required="true">
    <button action="submit">Send</button>
    <?php
    include("config.php");
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $query = "INSERT INTO messages(user_id,username_message,message) values(:user_id,:username_message,:message)";
        $statement = $PDO->prepare($query);
        $params = array(
            'user_id' => $_SESSION["id"],
            'username_message' => $_SESSION["username"],
            'message' => $_POST["message"]
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