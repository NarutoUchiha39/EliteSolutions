<!DOCTYPE html>
<html lang="en">
  <html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="{{asset('/Assets/CSS/Home.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  </head>
  <div class="menu__bar">
    <a class="logo" href="/"  style="text-decoration:none;position: relative;margin-top:15px">Elite Solutions</a>
    <ul>
        <li>
            <a href="#">Solutions</a>
        </li>
        <li>
            <a href="">Contact us <i class="fa-solid fa-caret-down"></i></a>
            <div class="drop__down" >
                <ul>
                    <li>
                        <a href="" style="margin-bottom:40px;">Send solution</a>
                    </li>
                    <li>
                        <a href="">Request problems</a>
                    </li>
                    <li>
                        <a href="/ContactUs">Feedback</a>
                    </li>
                </ul>
            </div>
        </li>
        @if (Session::has('loginId'))
            <form action="{{route('Logout')}}" method="post">
                @csrf
            <input type="submit" value="Logout" class="inp">
            </form>
        @else
            <li>
                <a href="/login">Login</a>
            </li>
            <li>
                <a href="/signup" >register</a>
            </li>
        @endif
        
    </ul>
  </div>
   
    

  @yield('content')
</body>
</html>