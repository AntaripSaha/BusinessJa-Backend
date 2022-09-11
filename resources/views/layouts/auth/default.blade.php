<!DOCTYPE html>

<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{setting('app_name')}} | {{setting('app_short_description')}}</title>
    <link rel="icon" type="image/png" href="{{$app_logo ?? ''}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600&display=fallback">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    @stack('js_lib')
</head>

<body>
    <header style="background-color: #f8f9fa!important">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                {{-- <a class="navbar-brand" href="#">BusinessJA</a> --}}
               
                <div class="nav-resize">
                    <a href="{{ url('https://yellowpageja.com/')}}"> <img src="{{asset('images\logo_default.png')}}" height="32px" width="auto"></a>
                </div>
              
                <div class="collapse navbar-collapse nav-custom nav-resize" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto mt-2 ml-5 mt-lg-0">
                    <li class="nav-item">
                      <a class="nav-link nav-text" href="https://yellowpageja.com/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link nav-text" href="https://yellowpageja.com/categories">Categories</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link nav-text" href="https://yellowpageja.com/help">Help & Support</a>
                    </li>
                    
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto mt-2 ml-5 mt-lg-0">
                        {{-- <li class="nav-item">
                          <a class="nav-link nav-text" href="https://yellowpageja.com/">
                            Select Your Address
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: auto;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </a>
                        </li> --}}
                        <li class="nav-item">
                          {{-- <a class="nav-link nav-text" href="#">English</a> --}}
                        </li>
                        <li class="nav-item">
                          <a class="nav-link nav-text" href="https://admin.yellowpageja.com/login">Login</a>
                        </li>
                      </ul>
                    {{-- <button class="btn btn-outline-success my-2 mr-2 my-sm-0" type="submit">Select Your Address</button> --}}
                    {{-- <button class="btn btn-secondary mr-2 my-2 my-sm-0" type="submit">Login</button> --}}
                    <a href="https://admin.yellowpageja.com/register">
                        <button class="btn btn-success my-2 my-sm-0 mr-2" style="background-color: #188400;" type="button">Register</button>
                    </a>
                    
                  </form>
                </div>
            </nav>

        </div>
        
    </header>
    
    <div class="hold-transition login-page">
        <div class="login-box" @if(isset($width)) style="width:{{$width}}" @endif>
            <div class="login-logo">
                {{-- <a href="{{ url('http://localhost:3000/') }}"><img src="{{$app_logo}}" alt="{{setting('app_name')}}"></a> --}}
                <a href="{{ url('http://localhost:3000/') }}"><img src="{{$app_logo}}"></a>
            </div>
            <!-- /.login-logo -->
            <div class="card shadow-sm">
                @yield('content')
            </div>
        </div>
    </div>

<!-- /.login-box -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<style>
    .green{
        font-family: "Poppins", Times, serif  !important;
        background: #188400 !important;
        border-color:#188400 !important;
    }
    .text-green{
        color: #188400 !important;
    }
    .nav-custom{
        color:#188400 !important;
        font-size: 14px !important;
        font-weight: 600 !important;
    }
    .nav-text{
        color:#6B7280 !important;
        /* font-size: 14px !important;
        font-weight: 600 !important; */
    }
    .nav-resize{
        max-width: 80% !important;
        margin-left: 10% !important;
    }
</style>
@stack('scripts')
</body>
</html>
