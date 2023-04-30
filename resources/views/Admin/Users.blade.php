
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{asset('Assets/CSS/table.css')}}">
<link rel="stylesheet" href="{{asset('Assets/CSS/Admin.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<table class="content-table" style="margin-top:-1%">
    <thead>
        <th>User Name</th>
        <th>Email</th>
        <th>Progress</th>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr class="passive-row" >
            <td style="padding:10px">{{$user->name}}</td>
            <td style="padding:10px">{{$user->email}}</td>
            <td>
                <div class="tot" style="display: flex;justify-content:center;align-items:center">
                    <div style="margin-right: 20px">Questions solved :</div>
                    <div class="cont" style="display: flex;flex-direction:column-reverse">
                        <progress id="file" value="{{$user->solved}}" max="{{$total->cnt}}">  </progress>( {{$user->solved}}/{{$total->cnt}} )
                    </div>
                </div>
            
            </td>
           
        </tr>
      @endforeach
      
    </tbody>
</table>

