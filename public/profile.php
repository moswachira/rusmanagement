<head>
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>

*{
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}

body{
  /* background-image: url(/assets/img/test1.jpg); */
  background-size: cover;
  opacity: 1;
}
nav{
  
  display: flex;
  justify-content: space-around;
  align-items: center;
  min-height: 8vh;
  background-color: #203556;
  font-family: 'Poppins', sans-serif;
  height: 90px;
}

.logo{
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 5px;
  font-size: 20px;
}

.menu{
  display: flex;
  justify-content: space-around;
  width: 35%;
}

.menu li{
  list-style: none;
}

.menu a{
  color: #fff;
  text-decoration: none;
  letter-spacing: 3px;
  font-size: 15px;
}

.menu li {
  display: inline-block;
  transition: 0.8s all;
  line-height: 100px;
  width: 150px;
  text-align: center;
}

.menu li:hover{
  background-color: #0009;
}

.carousel-inner{
  background-image: url(/assets/img/test1.jpg);

}
.content1{
  font-family: 'Poppins', sans-serif;
  font-size: 20px;
  text-align: center;
  padding: 50px;
}

p{
  font-size: 20px;
}

.photo{
  padding: 100px;
}

.footer{
  background-color: #04091e;
}



</style>
<body>
  <nav>
    <div class="logo">
      <h4>Street & Snap</h4>
    </div>
        <ul class="menu">
          <li>
            <a href="#">Home</a>
          <li>
            <a href="#">Content</a>
          </li>
          <li>
            <a href="#">Abount</a>
          </li>
          <li>
            <a href="#">Contact</a>
          </li>
        </ul>
  </nav>
  <div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="/assets/img/photo.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="/assets/img/photo1.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="/assets/img/photo2.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

  <section class="content1">
      <h1>บริการทัวร์</h1>
      <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day.</p>
  </section>
  <section class="photo">
  <div class="container" style="padding-botton: 100px;">
    <div class="row">
        <div class="col-lg-4">
  <img src="/assets/img/photo.jpg" width="350px" height="197">
        </div>
        <div class="col-lg-4">
  <img src="/assets/img/photo1.jpg" width="350px">
        </div>
        <div class="col-lg-4">
  <img src="/assets/img/photo2.jpg" width="350px" height="197">
        </div>
    </div>
  </div>
  </section>
  <section class="content1" >
      <h1>Popular Destinations</h1>
      <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day.</p>
  </section>
  <section class="photo">
  <div class="container" style="padding-botton: 100px;">
    <div class="row">
        <div class="col-lg-4">
  <img src="/assets/img/photo.jpg" width="350px" height="197">
        </div>
        <div class="col-lg-4">
  <img src="/assets/img/photo1.jpg" width="350px">
        </div>
        <div class="col-lg-4">
  <img src="/assets/img/photo2.jpg" width="350px" height="197">
        </div>
    </div>
  </div>
  </section>
  <footer class="footer">
  </footer>
</body>