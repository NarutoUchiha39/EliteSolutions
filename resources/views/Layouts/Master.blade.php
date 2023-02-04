<!DOCTYPE html>
<html lang="en">
  <html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="{{asset('/Assets/CSS/Home.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
  </head>
  <div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
        <div class="nav-title">
            <a href="index.php" >Elite Solutions</a>
        </div>
    </div>
    <div class="nav-btn">
        <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
        </label>
    </div>
    <div class="nav-links">
        <a href="solutions.php" target="_blank">Solutions</a>
        <a href="request_problem.php" target="_blank">Request Problems</a>
        <a href="contact_us.php">Contact us</a>
        <a href="/login" >Login</a>
        <a href="/signup" >Register</a>
    </div>
</div>
  
  @yield('content')
</body>
</html>