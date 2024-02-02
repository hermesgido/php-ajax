<?php

$dataFile = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $existingData = [];
    if (file_exists($dataFile)) {
        $existingData = json_decode(file_get_contents($dataFile), true);
    }
    $existingData[] = [
        'name' => $name,
        'email' => $email
    ];

    file_put_contents($dataFile, json_encode($existingData));

    if (file_exists($dataFile)) {
        $result = json_decode(file_get_contents($dataFile), true);
        header('Content-Type: application/json');
        echo json_encode($result);
    } else {
        echo json_encode([]);
    }
}
