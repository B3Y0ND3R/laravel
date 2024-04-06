<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="x-icon" href="images/logo.png">
        
        
        <title>JobHelp | Find Jobs & Projects</title>
    </head>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700");
*{
  margin: 0;
  padding: 0;
  outline: none;
  border: none;
  text-decoration: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
  background: #dfe9f5;
}
.container{
  display: flex;
  height: 100vh;
}
nav{
  /* position: sticky; */
  top: 0;
  bottom: 0;
  width: 100vw;
  height: 100%;
  left: 0;
  background: #312b2b;
  color: white;
  width: 280px;
  /* overflow: hidden; */
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);


/* 
  background-color: black; */
  width: 200px; Adjust according to your design
  overflow-y: auto; /* Enable scrolling if content overflows vertically */
  position: relative;
  /* top: 0;
  bottom: 0; */
}

@media (max-width: 768px) {
 nav {
    width: 30%;
    height: auto;
 }

 .nav-item {
    display: block;
 }

 .main-skills .card {
    width: 100%;
 }

 body {
    font-size: 14px;
 }

 .container {
    padding: 10px;
 }
 .home-container{
    width: 80%;
 }
}

.logo{
  text-align: center;
  display: flex;
  margin: 10px 0 0 10px;
}
.logo img{
  width: 45px;
  height: 45px;
  border-radius: 50%;
}
.logo span{
  font-weight: bold;
  padding-left: 15px;
  font-size: 18px;
}
a{
  position: relative;
  color: rgb(85, 83, 83);
  font-size: 14px;
  display: table;
  width: 280px;
  padding: 10px;
}
nav .fas{
  position: relative;
  width: 70px;
  height: 40px;
  top: 14px;
  font-size: 20px;
  text-align: center;
}
.nav-item{
  position: relative;
  top: 12px;
  margin-left: 10px;
  color: white;
}

nav a:hover .nav-item {
  color: black;
}

a:hover{
  background: #eee;
}

.log-out{
  position: relative;
  top: 12px;
  margin-left: 10px;
  color: white;
}

nav a:hover .log-out {
  color: black;
}
.logout{
  position: absolute;
  bottom: 0;
}

/* Main Section */
.main{
  position: relative;
  padding: 20px;
  width: 100%;
}
.main-top{
  display: flex;
  width: 100%;
}
.main-top i{
  position: absolute;
  right: 0;
  margin: 10px 30px;
  color: rgb(110, 109, 109);
  cursor: pointer;
}
.main-skills{
  display: flex;
  margin-top: 20px;
}
.main-skills .card{
  width: 25%;
  margin: 10px;
  background: #fff;
  text-align: center;
  border-radius: 20px;
  padding: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.main-skills .card h3{
  margin: 10px;
  text-transform: capitalize;
}
.main-skills .card p{
  font-size: 12px;
}
.main-skills .card button{
  background: orangered;
  color: #fff;
  padding: 7px 15px;
  border-radius: 10px;
  margin-top: 15px;
  cursor: pointer;
}
.main-skills .card button:hover{
  background: rgba(223, 70, 15, 0.856);
}
.main-skills .card i{
  font-size: 22px;
  padding: 10px;
}

/* Courses */
.main-course{
  margin-top:20px ;
  text-transform: capitalize;
}
.course-box{
  width: 100%;
  height: 300px;
  padding: 10px 10px 30px 10px;
  margin-top: 10px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.course-box ul{
  list-style: none;
  display: flex;
}
.course-box ul li{
  margin: 10px;
  color: gray;
  cursor: pointer;
}
.course-box ul .active{
  color: #000;
  border-bottom: 1px solid #000;
}
.course-box .course{
  display: flex;
}
.box{
  width: 33%;
  padding: 10px;
  margin: 10px;
  border-radius: 10px;
  background: rgb(235, 233, 233);
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.box p{
  font-size: 12px;
  margin-top: 5px;
}
.box button{
  background: #000;
  color: #fff;
  padding: 7px 10px;
  border-radius: 10px;
  margin-top: 3rem;
  cursor: pointer;
}
.box button:hover{
  background: rgba(0, 0, 0, 0.842);
}
.box i{
  font-size: 7rem;
  float: right;
  margin: -20px 20px 20px 0;
}
.html{
  color: rgb(25, 94, 54);
}
.css{
  color: rgb(104, 179, 35);
}
.js{
  color: rgb(28, 98, 179);
}


.switch {
  position: relative;
  display: inline-block;
  width: 4rem;
  height: 2rem;
  background-color: rgba(0, 0, 0, 0.25);
  border-radius: 2rem;
  transition: all 0.3s linear;
}

.switch::after {
  content: "";
  position: absolute;
  top: .1rem;
  left: .1rem;
  width: 1.8rem;
  height: 1.8rem;
  border-radius: 50%;
  background-color: #fff;
  transition: all 0.3s linear;
}


input[type="checkbox"]:checked + .switch:after {
  translate: 2rem 0;
}

input[type="checkbox"]:checked + .switch {
  background-color: black;
}

input[type="checkbox"] {
  display: none;
}

.tg{
  display: flex;
  justify-content: space-around;
  flex-direction: column;
}
.tg-b{
  height: 50px;
  display: flex;
  
}

.form-btn input[type="submit"]{
  color: white;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: black;
  cursor: pointer;
  transition: all 0.3s ease;
  display: block;
}
.form-btn input[type="submit"]:hover{
  background: yellow;
  color: black;
}


input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.home-container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  overflow-y: auto;


  flex: 1; /* Take remaining space in the container */
  position: relative; /* Make it a stacking context */
  z-index: 1;
}
  
    </style>
    
        <main>
    @yield('print')
        </main>
        
    <x-flash-messeges />
</body>
</html>