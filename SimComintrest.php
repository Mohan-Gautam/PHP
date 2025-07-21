<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p = $_POST['principal'];
    $r = $_POST['rate'];
    $t = $_POST['time'];

    if (isset($_POST['simple'])) {
        $interest = ($p * $r * $t) / 100;
        echo "Simple Interest: $interest<br />";
    } elseif (isset($_POST['compound'])) {
        $interest = $p * pow((1 + $r / 100), $t) - $p;
        echo "Compound Interest: $interest<br />";
    }
    exit();
}
?>

<html>
<body>
    <form action="<?php $_PHP_SELF ?>" method="POST">
        Principal: <input type="text" name="principal" /><br />
        Rate (%): <input type="text" name="rate" /><br />
        Time (years): <input type="text" name="time" /><br /><br />
        <input type="submit" name="simple" value="Simple Interest" />
        <input type="submit" name="compound" value="Compound Interest" />
    </form>
</body>
</html>