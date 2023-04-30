
<div class="button" style="display:flex;align-items:center;justify-content:center;margin-top:-10%">
    <button style="position: relative;top:100px;border: none;outline:none;background-color:#FF4500;border-color:#FF8C66;padding:5px;border-radius:10px;color:white;cursor: pointer;" onclick="AddQuestion()"> <p style="font-size:15px">Add question</p></button>
</div>

<table class="content-table" style="margin-top:120px">
    <thead>
        <th>Question name</th>
        
        <th>Likes</th>
        <th>Dislikes</th>
        <th >Admin options</th>
    </thead>
    <tbody>
      @foreach ($Questions as $Question)
        <tr class="passive-row">
              <td style="text-align:left;padding:10px">{{$Question->title}}</td>
              <td>{{$Question->likes}}</td>
              <td>{{$Question->dislikes}}</td>
              <td><i class="fa fa-trash" aria-hidden="true" style="color: red;cursor: pointer;margin-right:20%" onclick="delete1(this)" id="{{$Question->title}}"></i><i class="fa fa-refresh" aria-hidden="true" style="cursor: pointer" onclick="window.location = '/change/{{$Question->title}}'"></i></td>
              
        </tr>
      @endforeach
      
    </tbody>
</table>

