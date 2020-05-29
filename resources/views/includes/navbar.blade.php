<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
             <img class="logo-img" src="/img/1.jpg" alt="Product image">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav- p-0 m-0" href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart fa-2x"></i>
                        <div class="badge badge-danger">
                            @auth
                                {{Cart::session(auth()->id())->getContent()->count()}}
                                @else
                                0
                            @endauth
                        </div>
                    </a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->fname }} {{ Auth::user()->lname }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>

<header>
    <div class="main">
        <div class="section-1">
            <div class="product-info">
                <h1>Apple Watch Series 3</h1>
                <p>New and improved</p>
                <h2>$230</h2>
                <div class="info-btns">
                    <a href="#" class="btn discover-btn">DISCOVER</a>
                    <a href="#" class="btn cart-btn">VIEW OFFERS</a>
                </div>
            </div>
        </div> 
        <div class="section-2">
            <img src="img/ck.png" alt="Logo">
        </div> 
    </div>
</header>