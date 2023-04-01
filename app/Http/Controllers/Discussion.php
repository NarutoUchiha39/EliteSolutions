<?php

namespace App\Http\Controllers;

use App\Models\topic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class Discussion extends Controller
{
    public function discuss()
    {
        $rooms = DB::select('select * from rooms');
       
        return view('Discussion.Discussion',['rooms'=>$rooms]);
    }

    public function SpecificRoom($id)
    {
        return view('Discussion.Room',['Room_Name'=>$id]);
    }

    public function CreateRoom()
    {
        return view('Discussion.CreateRoom');
    }

    public function RegisterRoom(Request $request)
    {
        $host = Session::get('Email');
        $Name = $request->Name;
        $Topic = $request->topic;
        $Description = $request->Description;
        $request->validate(["Name"=>"required|unique:rooms",
                            "topic"=>"required",
                            ]);
        DB::insert("insert ignore into topics(Topic)  values('$Topic')");
        DB::insert("insert into rooms(Host,Name,Topic,Description) values('$host','$Name','$Topic','$Description')");
        return redirect('/Discussion');
    }

    public function updateRoom($id)
    {
        return view('Discussion.updateRoom',["Name"=>$id]);
    }


    public function update(Request $request,$id)
    {
        if($request->Name)
        {
            $request->validate(["Name"=>"unique:rooms"]);
        }

        
        $host = Session::get('Email');
        $Name = $request->Name;
        $Topic = $request->topic;
        $Description = $request->Description;

        if($Topic){
            DB::insert("insert ignore into topics(Topic) values('$Topic')");
        }

        $old = DB::select("select * from rooms where Name='$id' and Host='$host'")[0];
        $oldName = $old->Name;
        $oldTopic = $old->Topic;
        $oldDecsription = $old->Description;
        
        if(!$Name){
            $Name = $oldName;
        }
        if(!$Topic){
            $Topic = $oldTopic;
        }

        if(!$Description){
            $Description = $oldDecsription;
        }

        DB::update("update rooms set Name = '$Name', Topic = '$Topic', Description = '$Description' where Host = '$host' and Topic = '$oldTopic' and description = '$oldDecsription'");
        return redirect('/Discussion');
    }
}