Name: {{Session::get('Name')}} <br><br><br>
Email: {{Session::get('Email')}} <br><br><br>
<h1>Intuition:</h1> <br>
 {{\Illuminate\Support\Str::of($intution)->markdown();}}
<br>
<br>
<br>
Code: 
<pre>
    <code>
        {{$Code}}
    </code>
</pre>
