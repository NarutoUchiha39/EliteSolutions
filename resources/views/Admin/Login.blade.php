@extends('Layouts.Master')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="{{asset('Assets/CSS/table.css')}}">
<link rel="stylesheet" href="{{asset('Assets/CSS/Admin.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
      .welcome-message {
  background-color: #1c1a1a;
  padding: 40px;
  border-radius: 10px;
  text-align: center;
  margin: 0 auto;
  max-width: 800px;
  color: white;
}

.welcome-message h1 {
  font-size: 36px;
  margin-bottom: 20px;
}



        pre
        {
            white-space: pre-wrap;
            font-size: 15px
        }
      .content {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
    
      header {
        background-color: #333;
        color: #fff;
        padding: 10px;
      }
      

      aside {
        background-color: #555;
        color: #fff;
        min-height: 500px;
        padding: 20px;
        width: 150px;
        
      }
      
      aside ul {
        list-style: none;
        margin: 0;
        padding: 0;
      }
      
      aside ul li {
        margin-right: 20px;
        margin-bottom: 20%;
      }
      
      aside ul li {
        color: #fff;
        text-decoration: none;
      }
      
      aside ul li:hover {
        text-decoration: underline;
      }
      
      main {
        display: flex;
        margin: 20px;
      }
      
      section {
        background-color: #1C1A1A;
        flex-grow: 1;
        margin-left: 20px;
        padding: 20px;
        height: max-content;
      }
      
      footer {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
      }
    </style>

 <div class="content">
    <header style="margin-top:4%">
      <h1>Admin Page</h1>
    </header>
    <main>
      <aside>
        <h2 style="margin-bottom: 20%">Navigation</h2>
        <ul>
          <li style="cursor: pointer" onclick="QuestionsTable()">Questions</li>
          <li style="cursor: pointer" onclick="ShowUsers()">Users</li>
          <li style="cursor: pointer" onclick="SentQuestions()">User sent Questions</li>

        </ul>
      </aside>
      <section id="dynamic-content">
        <div class="welcome-message">
            <div class="welcome-message">
                <h1>Welcome back, Admin!</h1>
                
              </div>
              
          </div>
      </section>
    </main>
    <footer>
      <p>&copy; 2023 Elite Solutions. All rights reserved.</p>
    </footer>
 </div>
<script>
    function AddQuestion()
    {
        window.location = '/QuestionAdd'
    }
    function delete1(element)
    {
        let val = confirm(`Do you really want to delete ${element.id} ?`)
        if(val){
            let name = element.id
            axios.post('/Deleteqts',{question:name}).then((response)=>
            {
                alert("Question deleted successfully !!")
            })
        }
        
    }
    function QuestionsTable() 
    {
        axios.post('/QuestionsTable',{val:true}).then((response)=>
        {
            document.querySelector("#dynamic-content").innerHTML = response.data
        })
        
    }

    function ShowUsers()
    {
        axios.post('/Users',{val:true}).then((response)=>
        {
            document.querySelector("#dynamic-content").innerHTML = response.data
        })
    }

    function SentQuestions()
    {
      axios.post('/sentquestions',{val:true}).then((response)=>
        {
            document.querySelector("#dynamic-content").innerHTML = response.data
        })
    }
</script>
@endsection