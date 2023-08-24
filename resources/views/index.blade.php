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

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


</head>
<body>
    <nav>
       <div class="container nav_container">
    <a href="{{url('/')}}"><h4>EduSync</h4></a>
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


   
<header>
    <div class="container header_container">
    <div class="header_left">
    <h1>Grow your skills to advance your career path</h1>
    <p>
   Welcome to Edusync, the comprehensive school management system designed to streamline administrative tasks and enhance the educational experience !
    </p>
     <a href="{{url('courses')}}"  class="btn btn-primary">Get Started</a>
    </div>
    <div class="header_right">
    
    <div class="header_right-image">

        <img src="{{ asset('public/images/header3.jpg') }}" style="width:700px;" />

    
    </div>
    </div>
    </div>
    </header>
    
    

<section class="categories">
<div class ="container categories_container">
    <div class ="categories_left">
<h1>Categories</h1>
<p> 
    Science explores the natural world. Arts nurtures creativity and expression & commerce equips individuals with business acumen and financial skills.
</p>
<a href="#" class="btn">Learn More</a>
</div>
<div>
    <div class="categories_right">
<article class="category">
    <span class="category_icon"><i class="uil uil-bitcoin-circle"></i></span>
    <h5>Science</h5>
   <p>Logic & Reasoning</p> 
</article>
<article class="category">
    <span class="category_icon"><i class="uil uil-chart-bar"></i></span>
    <h5>Arts</h5>
   <p> Creativity & Visualization</p> 
</article>
<article class="category">
    <span class="category_icon"><i class="uil uil-dollar-alt"></i></span>
    <h5>Commerce</h5>
   <p> Trades & Buisness </p> 
</article>


    </div>
</div>
</section>



<section class ="courses">
    <h2>Our Popular Courses</h2>
    <div class="container courses_container">
       <article  class="course">
     <div class="course_image">
      <!-- <img src="./images/course1.jpg"> -->
      <img src="{{ asset('public/images/course1.jpg') }}">

     </div>
     <div class="course_info">
        <h4>Physics</h4>
     <p> Physics is the scientific study of matter, energy, and their interactions, exploring the fundamental laws that govern the universe.</p>
     </div>
     
        <a href="{{url('courses')}}"class="btn btn-primary">Learn More</a> 


       </article>
       <article  class="course">
        <div class="course_image">
         <!-- <img src="./images/course2.jpg"> -->
         <img src="{{ asset('public/images/course2.jpg') }}">

        </div>
        <div class="course_info">
            <h4> Calculas</h4>
            <p>Calculus is a branch of mathematics that focuses on change and motion, dealing with the concepts of limits, derivatives, and integrals.</p>
        </div>
           <a href="{{url('courses')}}"class="btn btn-primary">Learn More</a> 
        
          </article>
          <article  class="course">
            <div class="course_image">
             <!-- <img src="./images/course3.jpg"> -->
              <img src="{{ asset('public/images/course3.jpg') }}">

            </div>
            <div class="course_info">
                <h4>ICT</h4>
            <p>ICT encompasses the technologies and methods used to manage and communicate information, facilitating the storage, retrieval, and exchange of data</p>
            </div>
              <a href="{{url('courses')}}"class="btn btn-primary">Learn More</a> 
              </article>
    </div>
</section>

<footer class="footer">
<div class="container footer_container">
    <div class="footer_1">
   <a href="{{url('courses')}}"class="footer_logo"><h4>EduSync</h4></a>
<p>
   Visit the website & enjoy !
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