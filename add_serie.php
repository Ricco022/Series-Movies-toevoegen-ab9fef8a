<?php

$host = '127.0.0.1';
$db   = 'netland';
$user = 'root';
$pass = 'HywtGBNiwu823@';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

var_dump($_POST);

$query = <<<EOT
                        INSERT INTO netland.series (country, description, language, rating, seasons, title)
                        VALUES (
                            '${_POST['country']}',
                            '${_POST['description']}',
                            '${_POST['language']}',
                            '${_POST['rating']}',
                            '${_POST['seasons']}',
                            '${_POST['title']}'
                        );
                    EOT
;

var_dump($query);

$result = $pdo->query($query)->fetch();

var_dump($result);
