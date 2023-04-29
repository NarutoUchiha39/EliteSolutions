<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\VarDumper\Dumper\esc;

class Add_Questions extends Controller
{
    public function Admin_View()
    {
        $Questions = DB::select('select title from questions');
        return view('Admin.AdminTable',['Questions'=>$Questions]);
    }
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
        $data = json_decode($response, true);
        return($data);
        $question = $data['data']['question'];
        echo "Question ID: " . $question['questionId'] . "\n";
        echo "Title: " . $question['title'] . "\n";
        echo "Difficulty: " . $question['difficulty'] . "\n";
        echo "Content: " . $question['content'] . "\n";
        curl_close($ch);
    }

    public function insert_questions(Request $request)
    {
        $title = $request->title;
        $type = $request->type;
        $difficulty = $request->difficulty;
        $category  = $request->category;
        
        if($type!='markdown')
        {
            $body = nl2br($request->desc['data']);
        }

        else
        {
            
            $body = substr($request->desc,strpos($request->desc,"<p>"));
        }

        

        $res = DB::select("select title from questions where title ='$title'");
        if(count($res)==0)
        { 
            DB::insert("insert into questions(DESCRIPTION,title,category,difficulty) values('$body','$title','$category','$difficulty')");
            return 'false';
        }
        else
        {
            return 'true';
        }
        return $res;
    }

    public function update_question(Request $request)
    {
       
        $difficulty = $request->difficulty;
        $category  = $request->category;

        $description = nl2br($request->desc["data"]);
        $title = $request->title;
        
       
        DB::update("update questions set category = '$category', difficulty = '$difficulty', description = '$description' where title='$title'");
       
    }
}

?>