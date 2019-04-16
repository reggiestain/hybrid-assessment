<style>
.topnav a{
  
  color: #fff;
  text-align: center;
  //padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  //margin-top: 20px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: #fff;
}

@media only screen and (max-width: 1199px)
{

    .new_arrivals{
        margin-top: 10px; 
    }
}

@media only screen and (max-width: 479px)
{
    .main_slider
    {
        // min-height: 200px;
        height: 80px;
        //height: calc(100vh - 70px);
        /*height: 80vw;*/
        min-height: auto;
        margin-top: 70px;
    }
    .new_arrivals{
        margin-top: 150px; 
    }
}
</style>
<header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left"></div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">

                            <!-- Currency / Language / My Account -->
                            <li class="account">
                                <a href="#">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="account_selection">
                                    <li><a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                    <li class="reg"><a href="{{route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <!--<a href="#">David<span> Madanga</span></a>-->
                        <a class="navbar-brand" href="#">
                            <img src="{{ URL::asset('public/images/logo_black.png') }}" class="img-responsive" alt="logo" style="width:150px;height:60px">
                        </a>


                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu" id="myTopnav">
                            <li><a href="{{ route('home') }}" style="margin-right: 400px">home</a></li>
                            <li><a href="{{ route('login') }}" >Sign In</a> </li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <!--<li>
                                <a href="{{ route('cart.index') }}" style="color:#78787D" class="cart-item">
                                    <li class="fa fa-shopping-cart fa-2x" aria-hidden="true">                                               
                                    </li>
                                    CART
                                    <span style="background:#FE4C50;color:#fff;width:20px;height:20px;padding:4px 10px 4px 10px;border-radius: 50%">
                                        {{Cart::count()}}
                                    </span>                                         
                                </a>    
                            </li>-->

                        </ul>
                        <ul class="navbar_user">
                           <!-- <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                            -->
                            <li class="checkout">
                                <a href="{{ route('cart.index') }}" class="cart-item">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    @if(Cart::count())
                                    <span id="checkout_items" class="checkout_items">{{ Cart::count() }}</span>
                                    @else
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <div class="hamburger_container" data-toggle="collapse" data-target="#navbarSupportedContent">
                            <i class="fa fa-bars" aria-hidden="true"></i>

                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-top: 30px">
                            <!-- Links -->
                            <ul class="topnav navbar-nav mr-auto" style="background-color: #100F1B;overflow: hidden;">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}" style="">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                            <!-- Links -->
                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>
<script>
    function myFunction() {
        alert();
        var x = document.getElementById("myTopnav");
        if (x.className === "navbar_menu") {
            x.className += " responsive";
        } else {
            x.className = "navbar_menu";
        }
    }
</script>

