<?php
$client = new GuzzleHttp\Client();
$response = $client->request(
    'POST',
    'https://leetcode.com/graphql',
    [
        'form_params' => [
            'operationName' => 'questionData',
            'variables' => array("titleSlug"=>"two-sum"),
            'query'=>"query questionData(\$titleSlug: String!) {\n  question(titleSlug: \$titleSlug) {\n    questionId\n    questionFrontendId\n    boundTopicId\n    title\n    titleSlug\n    content\n    translatedTitle\n    translatedContent\n   }\n}\n"
        ]
        ]);

    $headers = $response->getHeaders();
    $body = $response->getBody();
    var_dump($headers, $body);



?>



