<?php
require_once 'vendor/autoload.php';

$path = $_SERVER["REQUEST_URI"];

if ($path !== "/favicon.ico") {
    switch ($path) {
        case "/l-a":
            include "./time-test/l-a.time.test.php";
            $city = "Los Angeles";
            break;
        case "/nsk":
            include "./time-test/nsk.time.test.php";
            $city = "Novosibirsk";
            break;
        default:
            include "./time-test/l-a.time.test.php";
            $city = "Los Angeles";
            break;
    }

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $apiKey = $_ENV['API_KEY'];
    $units = "metric";
    $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&units={$units}&appid={$apiKey}";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data["cod"] === 200) {
        $weather = $data["weather"][0]["description"];
        $temperature = $data["main"]["temp"];

        echo "<p>Weather in there: {$temperature}°C [{$weather}]</p>";
    } else {
        echo "<p>Error fetching data.</p>";
    }

    $currentDateTime = date("Y-m-d H:i:s");

    $dbName = $_ENV['DB_NAME'];
    $user = $_ENV['USER_NAME'];
    $password = $_ENV['PASSWORD'];
    $pdo = new PDO("pgsql:host=postgres;dbname={$dbName}", "{$user}", "{$password}");
    $stmt = $pdo->prepare("INSERT INTO visits (domain, visited_at) VALUES (?, ?)");
    $stmt->execute([$_SERVER["HTTP_HOST"], $currentDateTime]);

    $stmt = $pdo->query("SELECT domain, visited_at FROM visits ORDER BY id DESC LIMIT 10");
    $visits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Previous Visits:</h2>";
    foreach ($visits as $visit) {
        echo "</p>[" . $visit["domain"] . "] - " . $visit["visited_at"] . "</p>";
    }
}