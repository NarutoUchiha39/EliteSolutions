<table class="content-table" style="margin-top:0px">
    <thead>
        <th>Question name</th>
        <th>Email</th>
        <th>Status</th>
    </thead>
    <tbody>
      @foreach ($Question as $Qts)
      <tr class="passive-row">
          <td>{{$Qts->title}}</td> 
          <td>{{$Qts->email}}</td>
          <td style="cursor: pointer;" onclick="window.location='/changeStatus/{{$Qts->title}}&{{$Qts->email}}'">{{$Qts->status}}</td>
      </tr>
      @endforeach
      
    </tbody>
</table>

