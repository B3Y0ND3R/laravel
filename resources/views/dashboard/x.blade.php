<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Dashobard</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Manrope', sans-serif;
}

a{
    text-decoration: none;
    color: #369FFF;
}

i{
    font-size: 24px;
}

.container{
    display: grid;
    grid-template-columns: 1fr 3fr;
    height: 100vh;
}

.container .left-section{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 40px 0;
    position: fixed;
     top:0;
    left:0;
     overflow-y:auto;
     width: 16rem;
     height: 100vh;
     background: #01305b
}

.container .left-section .logo{
    display: flex;
    align-items: center;
    gap: 10px;
    flex-direction: column
}

.logo .a{
    display: flex;
    align-items: center;
    gap: 10px;
    flex-direction: row
}

.container .left-section .logo img{
    width: 40px;
    height: 40px;
    object-fit: cover;
}

.container .left-section .logo a{
    font-weight: 800;
    font-size: 20px;
    color: #006ED3;
}

.menu-btn{
    width: 32px;
    height: 32px;
    align-items: center;
    justify-content: center;
    border: none;
    background-color: #D1E6F9;
    border-radius: 6px;
    cursor: pointer;
    display: none;
}

.menu-btn i{
    font-size: 18px;
    color: #208BEE;
}

.container .left-section .sidebar{
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.container .left-section .sidebar .item{
    display: flex;
    gap: 20px;
    cursor: pointer;
}

.container .left-section .sidebar i{
    color: #BDBDBD;
    transition: all 0.3s ease;
}

.container .left-section .sidebar a{
    display: flex;
    align-items: center;
    gap: 30px;
    font-size: 14px;
    color: #BDBDBD;
    position: relative;
    transition: all 0.3s ease;
}

.container .left-section .sidebar .item#active a,
.container .left-section .sidebar .item#active i,
.container .left-section .upgrade .link i{
    color: #369FFF;
}

.container .left-section .sidebar .item a::after{
    position: absolute;
    content: "";
    width: 0px;
    height: 0px;
    background-color: #369FFF;
    right: -30px;
    border-radius: 50%;
    top: 0;
    transform: translateY(116%);
    transition: all 0.3s ease;
}

.container .left-section .sidebar .item#active a::after{
    width: 8px;
    height: 8px;
}

.container .left-section .pic  img{
    width: 160px;
}

.container .left-section .upgrade{
    background: #EBF6FF;
    height: 90px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 16px 24px;
    margin-bottom: 20px;
    border-radius: 18px;
    cursor: pointer;
}

.container .left-section .upgrade .link{
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.container .left-section .upgrade .link a{
    font-size: 12px;
}

main{
    border-right: 2px solid #F0F0F0;
    border-left: 2px solid #F0F0F0;
    padding: 40px 40px 0 40px;
}

main header{
    display: flex;
    align-items: center;
    gap: 15px;
}

main header h5{
    font-size: 18px;
    color: #369FFF;
    font-weight: 400;
}

main .separator{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}


main .analytics{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-top: 20px;
    align-items: center;
}

main .analytics .item{
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 140px;
    min-width: 214px;
    padding: 20px;
    border-radius: 20px;
}

main .analytics .item .progress{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

main .analytics .item .progress .info h5{
    color: #fff;
    font-size: 20px;
    font-weight: bold;
}

main .analytics .item .progress .info p{
    color: #fff;
    font-size: 12px;
}

main .analytics .item .progress .progress-bar{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
    width: 52px;
    height: 52px;
    border-radius: 50%;
}

main .analytics .item:nth-child(1) .progress .progress-bar{
    background: radial-gradient(closest-side, #006ED3 79%, transparent 80% 100%),
    conic-gradient(#208BEE 25%, #fff 0%);
}

main .analytics .item:nth-child(2) .progress .progress-bar{
    background: radial-gradient(closest-side, #FF993A 79%, transparent 80% 100%),
    conic-gradient(#FF7E07 50%, #fff 0%);
}

main .analytics .item:nth-child(3) .progress .progress-bar{
    background: radial-gradient(closest-side, #8AC53E 79%, transparent 80% 100%),
    conic-gradient(#6EB33D 75%, #fff 0%);
}

main .analytics .item:nth-child(4) .progress .progress-bar{
    background: radial-gradient(closest-side, #FFD043 79%, transparent 80% 100%),
    conic-gradient(#FFC000 25%, #fff 0%);
}

main .analytics .item .progress .progress-bar::before{
    font-size: 10px;
    color: #fff;
}

main .analytics .item:nth-child(1) .progress .progress-bar::before,
main .analytics .item:nth-child(4) .progress .progress-bar::before{
    content: "75%";
}

main .analytics .item:nth-child(2) .progress .progress-bar::before{
    content: "50%";
}

main .analytics .item:nth-child(3) .progress .progress-bar::before{
    content: "25%";
}

main .analytics .item i{
    font-size: 80px;
    color: #fff;
}

main .analytics .item:nth-child(1){
    background: #006ED3;
}

main .analytics .item:nth-child(2){
    background: #FF993A;
}

main .analytics .item:nth-child(3){
    background: #8AC53E;
}

main .analytics .item:nth-child(4){
    background: #FFD043;
}


input[type="date"]::-webkit-calendar-picker-indicator{
    opacity: 0.5;
    font-size: 16px;
    cursor: pointer;
}

main .planning{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-top: 20px;
}

main .planning .item{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    background-color: #F7F7F7;
    border-radius: 20px;
}

main .planning .item .left{
    display: flex;
    align-items: center;
    gap: 10px;
}

main .planning .item .left .icon{
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

main .planning .item:nth-child(1) .left .icon{
    background: #D1E6F9;
}

main .planning .item:nth-child(1) .left .icon i{
    color: #369FFF;
}

main .planning .item:nth-child(2) .left .icon{
    background: #F9E5D2;
}

main .planning .item:nth-child(2) .left .icon i{
    color: #FF993A;
}

main .planning .item:nth-child(3) .left .icon{
    background: #E2EDD2;
}

main .planning .item:nth-child(3) .left .icon i{
    color: #8AC53E;
}

main .planning .item:nth-child(4) .left .icon{
    background: #F9F0D3;
}

main .planning .item:nth-child(4) .left .icon i{
    color: #FFD143;
}

main .planning .item .left .details h5{
    font-size: 12px;
    font-weight: 600;
}

main .planning .item .left .details p{
    font-size: 12px;
    color: #BDBDBD;
}

main .planning .item > i{
    cursor: pointer;
}

.container .right-section{
    padding: 40px 40px 0 40px;
    align-items: center;
}

.container .right-section .top{
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.container .right-section .top > i{
    color: #909090;
    position: relative;
    cursor: pointer;
}

.container .right-section .top > i::after{
    content: "";
    width: 8px;
    height: 8px;
    position: absolute;
    background: #EB5757;
    border-radius: 50%;
    right: 0;
}

.container .right-section .top .profile{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    background: #EBF6FF;
    width: 244px;
    height: 60px;
    border-radius: 16px;
}

.container .right-section .top .profile > i{
    cursor: pointer;
}

.container .right-section .top .profile .left{
    display: flex;
    gap: 15px;
}

.container .right-section .top .profile .left img{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    object-position: top;
}

.container .right-section .top .profile .left .user h5{
    font-size: 14px;
    font-weight: 600;
}

.container .right-section .top .profile .left .user a{
    font-size: 12px;
}

.container .right-section .separator#first{
    margin-top: 8px;
}

.container .right-section .separator h4{
    font-weight: bold;
    font-size: 24px;
    margin-top: 20px;
}

.container .right-section .stats{
    display: grid;
    grid-template-columns: 1fr 1fr;
    margin-top: 20px;
    gap: 20px;
}

.container .right-section .stats .item{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 190px;
    padding: 25px;
    background: #EBF6FF;
    border-radius: 20px;
}

.container .right-section .stats .item .top{
    display: flex;
    flex-direction: column;
    align-items: start;
}

.container .right-section .stats .top p{
    font-size: 16px;
    color: #8EA3B7;
    font-weight: 500;
}

.container .right-section .stats .item .bottom{
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.container .right-section .stats .item .bottom .line{
    width: 4px;
    height: 30px;
    background: #369FFF;
    border-radius: 20px;
}

.container .right-section .stats .item .bottom h3{
    font-size: 40px;
    color: #006ED3;
}

.container .right-section .weekly{
    margin-top: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 12px;
    background: #F7F7F7;
    border-radius: 16px;
}

.container .right-section .weekly .title{
    display: flex;
    align-items: center;
    gap: 20px;
}

.container .right-section .weekly .title .line{
    width: 6px;
    height: 50px;
    background: #006ED3;
    border-radius: 20px;
}

.container .right-section .weekly h5{
    font-size: 16px;
}

.container .right-section .weekly .progress-bar{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: radial-gradient(closest-side, #f7f7f7 79%, transparent 80% 100%),
    conic-gradient(#CCC 25%, #006ED3 0%);
}

.container .right-section .weekly .progress-bar::before{
    content: "3/4";
    font-size: 14px;
    color: #000;
}
.l{
    margin:0 300px;
    padding:2rem;
}

@media screen and (max-width: 1200px) {
    
    .container{
        grid-template-columns: 1fr 6fr 5fr;
    }

    .container .left-section,
    .container main,
    .container .right-section{
        padding: 20px 20px 0 20px;
    }

    .container .left-section .logo a,
    .container .left-section .sidebar a,
    .container .left-section .pic img,
    .container .left-section .upgrade{
        display: none;
    }

}

@media screen and (max-width: 992px) {
    
    .container{
        grid-template-columns: 1fr 1fr;
    }

    .container .left-section{
        position: fixed;
        height: 60vh;
        background-color: #fff;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        top: -60vh;
    }

    .container .left-section .logo{
        flex-direction: column;
        gap: 20px;
    }

    .container .left-section .logo .menu-btn,
    main header .menu-btn{
        display: flex;
    }

    main h5{
        font-size: 16px;
    }




    main .planning{
        grid-template-columns: 1fr;
        gap: 10px;
    }

    main .planning .item{
        padding: 8px;
    }

    .container .right-section .stats .item{
        height: 160px;
        padding: 20px;
    }

    .container .right-section .stats .item .top p{
        font-size: 14px;
    }

    .container .right-section .stats .item .bottom h3{
        font-size: 36px;
    }

}

@media screen and (max-width: 768px) {
    .l{
        margin: 0 25px;
    }
    .container{
        grid-template-columns: 1fr;
        padding-top: 80px;
    }

    .container .right-section > .top{
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        padding: 20px;
        z-index: -100;
    }

    .container .right-section .weekly{
        margin-bottom: 20px;
    }

}


.button-3 {
  appearance: none;
  background-color: #2ea44f;
  border: 1px solid rgba(27, 31, 35, .15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
  font-size: 14px;
  font-weight: 600;
  line-height: 20px;
  padding: 6px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
}

.button-3:focus:not(:focus-visible):not(.focus-visible) {
  box-shadow: none;
  outline: none;
}

.button-3:hover {
  background-color: #2c974b;
}

.button-3:focus {
  box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
  outline: none;
}

.button-3:disabled {
  background-color: #94d3a2;
  border-color: rgba(27, 31, 35, .1);
  color: rgba(255, 255, 255, .8);
  cursor: default;
}

.button-3:active {
  background-color: #298e46;
  box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
}
</style>

<body>

    <div class="container">

        <aside class="left-section">
            <div class="logo">
                <button class="menu-btn" id="menu-close">
                    <i class='bx bx-log-out-circle'></i>
                </button>
                <a href="/">JobHelp</a>
                <div class="a">
                    <a href="/users/{{auth()->user()->id}}" class="logo">
                    <img
                                      class="w-48 mr-6 mb-6"
                                      src="{{auth()->user()->pic ? asset('storage/' . auth()->user()->pic) : asset('/images/no-image.png')}}"
                                      alt=""
                                  />
                    <span class="nav-item">{{auth()->user()->name}}</span>
                  </a>
                </div>
            </div>

            <div class="sidebar">
                <div class="item" >
                    <i class='bx bx-window'></i>
                    @if(Auth::user()->role == 'admin')
        <a href="/dashboard/admin">Dashboard</a>
      @endif

      @if(Auth::user()->role == 'employer')
      
        <a href="/dashboard/employer">Dashboard</a>

      @endif

      @if(Auth::user()->role == 'applicant')

        <a href="/dashboard/applicant">Dashboard</a>

      @endif
                </div>

                <div class="item">
                    <i class='bx bx-home-alt-2'></i>
                    <a href="/">Home</a>
                </div>
                <div class="item">
                    <i class='bx bx-user'></i>
                    <a href="/users/{{auth()->user()->id}}">Profile</a>
                </div>
                <div class="item">
                    <i class='bx bx-user-check'></i>
                    <a href="/edit-profile">Edit Profile</a>
                </div>
                @yield('nav')
                {{-- <div class="item">
                    <i class='bx bx-folder'></i>
                    <a href="#">Resources</a>
                </div>
                <div class="item">
                    <i class='bx bx-message-square-dots'></i>
                    <a href="#">Message</a>
                </div>
                <div class="item">
                    <i class='bx bx-cog'></i>
                    <a href="#">Setting</a>
                </div> --}}
            </div>

            <div class="pic">
                <img
                                      class="w-48 mr-6 mb-6"
                                      src="{{asset('/images/no-image.png')}}"
                                      alt=""
                                  />
            </div>

            <div class="item">
                
                <form action="/logout" method="POST">
                    @csrf 
                    <button type="submit" class="button-3" role="button"><i class='bx bx-log-out'></i>Logout</button>
                </form>
            </div>





        </aside>

        <main class="l">
            <header>
                <button class="menu-btn" id="menu-open">
                    <i class='bx bx-menu'></i>
                </button>
                <h5>Hello! <b>{{auth()->user()->name}}</b>, Welcome back!</h5>
            </header>
            

            <div class="separator">
                


             <div class="analytics">
                @yield('p')
                
                </div>
            </div>
        </main>


    </div>

    <script>
        const menuOpen = document.getElementById('menu-open');
const menuClose = document.getElementById('menu-close');
const sideBar = document.querySelector('.container .left-section');
const sidebarItems = document.querySelectorAll('.container .left-section .sidebar .item');

menuOpen.addEventListener('click', () => {
    sideBar.style.top = '0';
});

menuClose.addEventListener('click', () => {
    sideBar.style.top = '-60vh';
});

let activeItem = sidebarItems[0];

sidebarItems.forEach(element => {
    element.addEventListener('click', () => {
        if (activeItem) {
            activeItem.removeAttribute('id');
        }

        element.setAttribute('id', 'active');
        activeItem = element;

    });



    
});
    </script>
</body>

</html>