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
  background-color: #000;
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
  background-color: #2F4F4F;
}


.content {
  width: 100%;
  height: 300px;
  background: #000;
}

.ct {
  width: 100px;
  height: auto;
  float: left;
  margin-right: 60px;
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
    <section class="content">
      <div class="container">
      </div>
    </section>
</body>