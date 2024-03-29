<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class Discussion extends Controller
{
    public function discuss()
    {
        $rooms = DB::select('select * from rooms');
        $topics = DB::select('select * from Topics');
        return view('Discussion.Discussion',['rooms'=>$rooms,'topics'=>$topics]);
    }

    public function SpecificRoom($id)
    {
        $Description = DB::select("select description from rooms where name = '$id'");
        return view('Discussion.Room',['Room_Name'=>$id,'Description'=>$Description]);
    }

    public function CreateRoom()
    {
        if(Session::has('loginId'))
        {
            return view('RequestProblem');
        }

        return redirect('/login');
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
        DB::update("update topics set total_rooms = total_rooms+1 where topic = '$Topic'");
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

        $old = DB::select("select * from rooms where Name='$id' and Host='$host'")[0];
        $oldName = $old->Name;
        $oldTopic = $old->Topic;
        $oldDecsription = $old->Description;

        if($Topic){
            DB::insert("insert ignore into topics(Topic) values('$Topic')");
            DB::update("update topics set total_rooms = total_rooms+1 where topic = '$Topic'");
            DB::update("update topics set total_rooms = total_rooms-1 where topic = '$oldTopic'");
            DB::update("delete from topics where total_rooms = 0");
        }

        
        
        if(!$Name){
            $Name = $oldName;
        }
        if(!$Topic)
        {
            $Topic = $oldTopic;
        }

       
        if(!$Description){
            $Description = $oldDecsription;
        }

        DB::update("update rooms set Name = '$Name', Topic = '$Topic', Description = '$Description' where Name='$oldName'");
        return redirect('/Discussion');
    }

    public function deleteRoom($id)
    {
        $array = explode('-',$id);
        $id = $array[0];
        $topic = $array[1];
       
        DB::update("delete from rooms where name = '$id'");
        DB::update("update topics set total_rooms = total_rooms -1 where topic = '$topic'");
        DB::update("delete from topics where total_rooms = 0");
        return redirect()->back()->with('status','Deleted room successfully !!');
    }
}