<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSync</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles.css') }}">


    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="./css/styles.css">
<link rel="stylesheet" href="./css/About.css"> -->
<link rel="stylesheet" href="{{ asset('public/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/About.css') }}">


</head>
<body>
    <nav>
       <div class="container nav_container">
       <a href="{{url('/')}}" ><h4>EduSync</h4></a>
        <ul class="nav_menu">
        
 <li><a href="{{url('/')}}">Home</a></li>
 <li><a href="{{url('courses')}}">Courses</a></li>

 <li><a href="{{url('about')}}">About</a></li>
 
    <li><a href="{{url('login')}}">Enter</a></li>

        </ul>
        <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
        <button id="close-menu-btn"><i class="uil uil-multiply"></i></i></button>

       </div>
    </nav>
      <section class="about_achievements">
        <div class="container about_achievements-container">
        <div class="about_achievements-left">
        <!-- <img src="./images/about1.jpg" style="width:600px;"> -->
        <img src="{{ asset('public/images/about1.jpg') }}" style="width:600px;">

        </div>
        <div class="about_achievements-right">
            <h1>Acheivements</h1>
            
            <p>
            Discover our remarkable achievements and accomplishments, showcasing our expertise and dedication.Experience a legacy of excellence, as we celebrate our notable achievements and significant contributions.
            </p>
            <div class="achievements_cards">
            <article class="achievement_card">
            <span class="achievement_icon">
            <i class="uil uil-video"></i>
            </span>
            <h3>450+</h3>
            <p>Courses</p>
            </article>
            <article class="achievement_card">
            <span class="achievement_icon">
            <i class="uil uil-users-alt"></i>
            </span>
            <h3>79,000+</h3>
            <p>Students</p>
            </article>
            <article class="achievement_card">
            <span class="achievement_icon">
            |<i class="uil uil-trophy"></i>
            </span>
            <h3>26+</h3>
            <p>Awards</p>
            </article>
            
            </div>
            </div>
            </div>
            </section>

  
    
<footer class="footer">
    <div class="container footer_container">
        <div class="footer_1">
        <a href="{{url('/')}}"class="footer_logo"><h4>EduSync</h4></a>
    <p>
        Lorem ipsum dolor sit amet consectetur 
    </p>
    </div>
            <div class="footer_2">
            <h4>Permalinks</h4>
            <ul class="Permalinks">
             <li><a href="{{url('/')}}">Home</a></li>
 <li><a href="{{url('about')}}">About</a></li>
 <li><a href="{{url('courses')}}">Courses</a></li>
  
            </ul>
    </div>
    <div class="footer_3">
    <h4>Privacy</h4>
    <ul class="privacy">
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms & Conditions</a></li>
        <li><a href="#">Refund Policy</a></li>
    </ul>
    </div>
    <div class="footer_4">
        <h4>Contact us</h4>
        <div>
            <p>+011111111</p>
            <p>ashfaq@gmail.com</p>
        </div>
     <ul class="footer_socials">
        <li> 
            <a href="#"><i class="uil uil-facebook-f"></i></a>
        </li>
        <li> 
            <a href="#"><i class="uil uil-instagram-alt"></i></a>
        </li>
        <li> 
            <a href="#"><i class="uil uil-twitter"></i></a>
        </li>
        <li> 
            <a href="#"><i class="uil uil-linkedin-alt"></i></a>
        </li>
     </ul>
    
    </div>
    <div class="footer_copyright">
        <small>Copyright of Ashfaqur &copy;</small>
    </div>
    </footer>
    </body>
    </html> 























