<!-- Load font awesome icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  /* The navigation menu */
.navbar {
  overflow: hidden;
  background-color: #333;
}

/* Navigation links */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* The subnavigation menu */
.subnav {
  float: left;
  overflow: hidden;
}

/* Subnav button */
.subnav .subnavbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

/* Add a red background color to navigation links on hover */
.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: red;
}

/* Style the subnav content - positioned absolute */
.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: red;
  width: 100%;
  z-index: 1;
}

/* Style the subnav links */
.subnav-content a {
  float: left;
  color: white;
  text-decoration: none;
}

/* Add a grey background color on hover */
.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

/* When you move the mouse over the subnav container, open the subnav content */
.subnav:hover .subnav-content {
  display: block;
}
.navbar-header{height:100px}
.navbar-brand{padding:15px 0px 15px 15px;}
.navbar-brand .mylogo{height:70px;}
.nav-bg-color{background: #39609a;}
.panel-menu a{color:#1073C6!important;}
.sub-nav-menu a{color:#333!important; font-size:20px;}
.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{background-color: rgba(0,0,0,.2)}
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover{background-color: rgba(0,0,0,.3)}
.header-panal{background: #AED6F1!important;color:#21618C!important;}
.navbar-default .navbar-nav>li>a{color:#fff!important}
.navbar-default .navbar-nav>li>a{color:#fff!important}
</style>
<nav class="navbar navbar-default nav-bg-color w3-card">
            <div class="navbar-header ">
                <a class="navbar-brand" href="#">
                    <img class="mylogo" src="http://bait.rmutsb.ac.th/bait/images/logobait.png"/>
                </a>
            </div>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">
                <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"> &times;</button>
                <a href="#" class="w3-bar-item w3-button w3-center"><i class ="fa fa-user fa-5x"></i></a>
                <a href="#" class="w3-bar-item w3-button">{{CurrentUser::user()->first_name}} {{CurrentUser::user()->last_name}}</a>
                <a href="#" class="w3-bar-item w3-button">รายละเอียด</a>
                <a href="/logout" class="w3-bar-item w3-button">Logout</a>
            </div>
</div>
</nav>
<!-- The navigation menu -->
<div class="navbar">
  <a href="#home">Home</a>
  <div class="subnav">
    <button class="subnavbtn">About <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="#company">Company</a>
      <a href="#team">Team</a>
      <a href="#careers">Careers</a>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Services <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="#bring">Bring</a>
      <a href="#deliver">Deliver</a>
      <a href="#package">Package</a>
      <a href="#express">Express</a>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Partners <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="#link1">Link 1</a>
      <a href="#link2">Link 2</a>
      <a href="#link3">Link 3</a>
      <a href="#link4">Link 4</a>
    </div>
  </div>
  <a href="#contact">Contact</a>
</div>