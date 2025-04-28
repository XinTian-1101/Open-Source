<?php

$apiKey = "pub_83460ce3e0d212fcc2021aaef7a133ccaeaba"; 
$apiUrl = "https://newsdata.io/api/1/news?apikey=$apiKey&q=environmental&category=environment"; 
$response = @file_get_contents($apiUrl);

if ($response === FALSE) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Failed to fetch news."]);
    exit;
}

// Decode JSON
$data = json_decode($response, true);

// Filter out duplicate articles based on the title
$seenTitles = [];
$uniqueArticles = [];

if (isset($data['results'])) {
    foreach ($data['results'] as $article) {
        if (!in_array($article['title'], $seenTitles)) {
            $seenTitles[] = $article['title'];
            $uniqueArticles[] = $article;
        }
    }
}

header('Content-Type: application/json');
echo json_encode(["results" => $uniqueArticles]);
?>
