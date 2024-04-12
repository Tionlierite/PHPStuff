<?php
$path = $_SERVER["REQUEST_URI"];

if ($path !== "/favicon.ico") {
    switch ($path) {
        case "/l-a":
            include "./time-test/l-a.time.test.php";
            break;
        case "/nsk":
            include "./time-test/nsk.time.test.php";
            break;
        default:
            include "./time-test/l-a.time.test.php";
            break;
    }

    $currentDateTime = date("Y-m-d H:i:s");

    $pdo = new PDO("pgsql:host=postgres;dbname=visitsDB", "tion", "dotwrk");
    $stmt = $pdo->prepare("INSERT INTO visits (domain, visited_at) VALUES (?, ?)");
    $stmt->execute([$_SERVER["HTTP_HOST"], $currentDateTime]);

    $stmt = $pdo->query("SELECT domain, visited_at FROM visits ORDER BY id DESC LIMIT 10");
    $visits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Previous Visits:</h2>";
    foreach ($visits as $visit) {
        echo "<p>[" . $visit["domain"] . "] - " . $visit["visited_at"] . "</p>";
    }
}