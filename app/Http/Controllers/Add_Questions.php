<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\type;
use function Symfony\Component\VarDumper\Dumper\esc;

class Add_Questions extends Controller
{
    public function login(Request $request)
    {
        $name = $request->email;
        $password = $request->password;
        $res = DB::select("select * from admin where email_id = '$name' and password='$password'");
        

        if(count($res)==0)
        {
            return back()->withErrors(['Incorrect email or password try again !!']);
        }

        else
        {
            Session::put('Admin','Admin');
            return redirect('/AdminView');
        }
    }
    public function Admin_View()
    {
        $Questions = DB::select('select title,likes,dislikes from questions');
        return view('Admin.AdminTable',['Questions'=>$Questions])->render();
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
        
        
        if($type=="markdown")
        {
            $body = str_replace(array("'"), '', $request->desc["data"]); //$request->desc["data"]
        }
        else{$body=$request->desc;};
        $res = DB::select("select title from questions where title ='$title'");
        if(count($res)==0)
        { 
            DB::insert("insert into questions(DESCRIPTION,title,category,difficulty) values('$body','$title','$category','$difficulty')");
            $title = explode(" ",$title);
            $newtitle = "";
            foreach($title as $char)
            {
                $newtitle = $newtitle.$char;
            }
            
            $handle = fopen("E:\Desktop\Elite Solutions\practice\storage\\framework\Solutions\\$newtitle"."python.txt","w");
            fclose($handle);
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

        $description = str_replace(array("'"), '', $request->desc["data"]);
        $title = $request->title;
        
       if(strlen($request->type)>0 && $request->type == 'approve')
       {
            $ntitle = explode(" ",$title);
            $newtitle = "";
            $Email = $request->email;
            foreach($ntitle as $char)
            {
                $newtitle = $newtitle.$char;
            }
            
            $handle = fopen("E:\Desktop\Elite Solutions\practice\storage\\framework\Solutions\\$newtitle"."python.txt","w");
            fclose($handle);
            $description = nl2br(str_replace(array("'"), '', $request->desc["data"]));
            try
            {
                DB::insert("insert into questions(title,category,difficulty,description) values('$title','$category','$difficulty','$description')");
                DB::update("update sentquestions set status='approved' where email='$Email' and title='$title'");
                return 'success';
            }

            catch(Exception $E)
            {
                return $Email;
            }

        }
       else{
        DB::update("update questions set category = '$category', difficulty = '$difficulty', description = '$description' where title='$title'");}
       
    }
}

?>