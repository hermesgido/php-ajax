<?php

// Task 1: File Manipulation
$fileContent = "Hello, this is a sample file content.";
$filePath = 'example.txt';

file_put_contents($filePath, $fileContent);

echo "Task 1: File created with content.\n";

// Task 2: HTTP Request
$url = 'https://api.example.com/data';

$response = file_get_contents($url);

if ($response) {
    $jsonData = json_decode($response, true);
    if ($jsonData) {
        echo "Task 2: Successfully retrieved data from the API.\n";
    } else {
        echo "Task 2: Unable to decode JSON response.\n";
    }
} else {
    echo "Task 2: Unable to fetch data from the API.\n";
}

// Task 3: Database Interaction 
$databaseHost = 'localhost';
$databaseUser = 'username';
$databasePassword = 'password';
$databaseName = 'dbname';

// Establish a database connection
$conn = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);

if ($conn->connect_error) {
    die("Task 3: Connection failed: " . $conn->connect_error . "\n");
}

// Perform a simple database query
$query = "SELECT * FROM users";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Task 3: User ID: " . $row['id'] . ", Username: " . $row['username'] . "\n";
    }
} else {
    echo "Task 3: No users found in the database.\n";
}

// Close the database connection
$conn->close();

// Task 4: Sending Email
$to = "recipient@example.com";
$subject = "Test Email";
$message = "This is a test email sent using PHP.";
$headers = "From: sender@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Task 4: Email sent successfully.\n";
} else {
    echo "Task 4: Failed to send email.\n";
}

// Task 5: CSV File Manipulation
$csvFilePath = 'example.csv';

// Writing data to a CSV file
$csvData = [
    ['Name', 'Email'],
    ['John Doe', 'john@example.com'],
    ['Jane Doe', 'jane@example.com']
];

$csvFile = fopen($csvFilePath, 'w');

foreach ($csvData as $row) {
    fputcsv($csvFile, $row);
}

fclose($csvFile);

echo "Task 5: CSV file created with data.\n";

// Task 6: REST API Interaction
$apiEndpoint = 'https://api.example.com/update';

$apiData = [
    'param1' => 'value1',
    'param2' => 'value2'
];

$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($apiData)
    ]
];

$context  = stream_context_create($options);
$response = file_get_contents($apiEndpoint, false, $context);

if ($response) {
    echo "Task 6: Successfully interacted with the REST API.\n";
} else {
    echo "Task 6: Failed to interact with the REST API.\n";
}


echo "Script completed.\n";



// Task 5: CSV File Manipulation
$csvFilePath = 'example.csv';

// Writing data to a CSV file
$csvData = [
    ['Name', 'Email'],
    ['John Doe', 'john@example.com'],
    ['Jane Doe', 'jane@example.com']
];

$csvFile = fopen($csvFilePath, 'w');

foreach ($csvData as $row) {
    fputcsv($csvFile, $row);
}

fclose($csvFile);

echo "Task 5: CSV file created with data.\n";

// Task 6: REST API Interaction
$apiEndpoint = 'https://api.example.com/update';

$apiData = [
    'param1' => 'value1',
    'param2' => 'value2'
];

$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($apiData)
    ]
];

$context  = stream_context_create($options);
$response = file_get_contents($apiEndpoint, false, $context);

if ($response) {
    echo "Task 6: Successfully interacted with the REST API.\n";
} else {
    echo "Task 6: Failed to interact with the REST API.\n";
}

// Task 7: Web Scraping with Simple HTML DOM
require_once 'simple_html_dom.php'; // Download from http://simplehtmldom.sourceforge.net/
$urlToScrape = 'https://example.com';

$html = file_get_html($urlToScrape);

if ($html) {
    // Extract information from the webpage
    $pageTitle = $html->find('title', 0)->plaintext;
    $paragraphs = $html->find('p');

    echo "Task 7: Web Scraping\n";
    echo "Title: $pageTitle\n";
    echo "Paragraphs:\n";
    foreach ($paragraphs as $paragraph) {
        echo "- " . trim($paragraph->plaintext) . "\n";
    }
} else {
    echo "Task 7: Failed to fetch HTML content.\n";
}

// Task 8: Image Download from URL
$imageUrl = 'https://example.com/image.jpg';
$destinationPath = 'downloaded_image.jpg';

$imageContent = file_get_contents($imageUrl);

if ($imageContent) {
    file_put_contents($destinationPath, $imageContent);
    echo "Task 8: Image downloaded successfully.\n";
} else {
    echo "Task 8: Failed to download image.\n";
}

// Task 9: Cron Job Scheduling
// This script can be scheduled to run at specific intervals using a cron job
// For example, run every day at midnight: 0 0 * * * /usr/bin/php /path/to/script.php
echo "Task 9: Cron Job - This script was executed by a scheduled task.\n";
