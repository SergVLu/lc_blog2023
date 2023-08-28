<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edi-cepera</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link href="{{ asset('assets/vendors/aos/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
    <div class="edica-loader"></div>
    <header class="edica-header edica-landing-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.html"><img src="{{ asset('assets/images/logo.svg') }}" alt="LC_BLOG2023"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Главная</a>
                        </li>
                        @if (url()->current() == '/post')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('post.index') }}">Смотреть Посты</a>
                            </li>
                        @endif
                        <li class="nav-item">
                        </li>
                        @guest
                            <li class="nav-item active">
                                <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/personal">Личный кабинет</a>
                            </li>
                            @if (auth()->user()->role == 0)
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin">Админка</a>
                                </li>
                            @endif
                            <li class="nav-item d-none d-sm-inline-block">
                                <form action="{{ route('logout') }}" method="post">
                                  @csrf
                                  <input type="submit" class="btn nav-link" value="Выход">
                                </form>
                            </li>
                        @endauth
                        
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="edica-footer mt-1" data-aos="fade-up">
        <div class="container">
            <div class="footer-bottom-content" style="margin-top: -160px; ">
                <nav class="nav footer-bottom-nav">
                    <a href="#!"><i class="fab fa-telegram"></i>Telegram</a>
                    <a href="#!">Site Map</a>
                </nav>
                <p class="mb-0">© LC_BLOG2023 <a href="/" target="_blank" rel="noopener noreferrer" class="text-reset"></a> . All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        AOS.init({
            duration: 2000
        });
      </script>
</body>
</html>