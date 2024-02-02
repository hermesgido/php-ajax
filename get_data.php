<?php

$dataFile = 'data.json';

if (file_exists($dataFile)) {
    $result = json_decode(file_get_contents($dataFile), true);

    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    echo json_encode([]);
}

