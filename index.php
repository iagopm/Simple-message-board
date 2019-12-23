<html>
<header>
    <title>Welcome To My PHP page</title>
</header>
<body>
<pre>
    <?php

    use function Sodium\add;

    session_start();
    if (empty($_SESSION['id'])) {
        echo "<a href='access.php'>Login</a>
    <a href='register.php'>Register</a>";
    }
    if (!empty($_SESSION['id'])) {
        echo "<a href = 'closeSession.php' > Close session </a >";
    }
    ?>


</pre>

<?php
include("message.php");
include("config.php");
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $username = $_SESSION["username"];
    echo "Welcome " . $username;
    echo "<br/>";
    echo "<br><a href='newMessage.php'>New Message Panel</a>";
    echo "<br/>";

    $stmt = $PDO->prepare("SELECT * FROM messages");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $messages = $stmt->fetchAll();

    foreach ($messages as $row) {
        echo "<br/>";
        print $row["id"] . "-" . $row["username_message"] . "-" . $row["message"] . "<br/>";
    }
    echo "<br/>";

}

?>
</body>
<footer></footer>
</html>