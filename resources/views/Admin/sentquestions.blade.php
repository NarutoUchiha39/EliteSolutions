<table class="content-table" style="margin-top:0px">
    <thead>
        <th>Question name</th>
        <th>Email</th>
        <th>Status</th>
    </thead>
    <tbody>
      @foreach ($Question as $Qts)
      <tr class="passive-row" >
          <td style="padding:10px">{{$Qts->title}}</td> 
          <td>{{$Qts->email}}</td>
          @if ($Qts->status=='approved')
                <td>{{$Qts->status}}</td>
                @else
                <td style="cursor: pointer;" onclick="window.location='/changeStatus/{{$Qts->title}}&{{$Qts->email}}'">{{$Qts->status}}</td>
          @endif
          
      </tr>
      @endforeach
      
    </tbody>
</table>

