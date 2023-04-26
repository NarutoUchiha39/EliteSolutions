<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Add_Questions extends Controller
{ 
    public function Add_Question(Request $request)
    {
        $Name = request('Question_Name');
        $query = <<<GRAPHQL
        {
        question(titleSlug: "$Name") {
            questionId
            title
            content
            difficulty
        }
        }
        GRAPHQL;

        // Set cURL options
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://leetcode.com/graphql");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['query' => $query]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        
        $response = curl_exec($ch);

        
        if ($response === false) {
            return(curl_error($ch));
            exit;
        }

        // Decode JSON response
        $data = json_decode($response, true);
        return($data);
        // Output question data
        $question = $data['data']['question'];
        echo "Question ID: " . $question['questionId'] . "\n";
        echo "Title: " . $question['title'] . "\n";
        echo "Difficulty: " . $question['difficulty'] . "\n";
        echo "Content: " . $question['content'] . "\n";

        // Close cURL handle
        curl_close($ch);
                

            }
}

?>