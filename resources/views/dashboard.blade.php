<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Font Awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
        integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
        crossorigin="anonymous"></script>
</head>
    <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-white fw-bold hover-text" href="#page-top">My Portfolio</a>
            <button class="navbar-toggler text-uppercase fw-bold bg-dark text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav d-flex justify-content-end fw-bold">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-white hover-text" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-white hover-text" href="#contact">Contact</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 text-white hover-text-logout" href="{{ route('logout') }}"
                      onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
        </div>
    </nav>
    <header class="header d-flex justify-content-center align-items-center flex-column" id="page-top">
        @if( $gender->gender == 'male')
          <img src="{{asset('assets/image/male.png')}}" alt="" class="profile">
        @else
          <img src="{{asset('assets/image/female.png')}}" alt="" class="profile">
        @endif
        
        <span class="fw-bold my-4 header-text text-center text-dark ">
            Hello, I'm {{ auth()->guard('web')->user()->name }} <br>
            Nice To Meet You
        </span>
    </header>
    <div class="body" id="portfolio">
        <h1 class="text-center fw-bold display-4 p-5" >Portfolio</h1>
        <div class="d-flex justify-content-center">
            <a href="{{route('dashboard.create')}}" class="btn btn-dark p-2"><i class="fas fa-plus"></i> Add Content</a>
        </div>
        <div class="container">
            <div class="row">
              @foreach ($contents as $content)
                <div class="col-lg-4 mb-3 mb-lg-0 mt-5">
                  <div class="hover hover-3 text-white rounded"><img src="{{ asset($content->image) }}" alt="">
                    <a href="{{route('dashboard.show', $content->id)}}" class="text-white text-decoration-none">
                      <div class="hover-overlay"></div>
                      <div class="hover-3-content px-5 py-4">
                        <h3 class="hover-3-title text-uppercase font-weight-bold mb-1">{{$content->name}}</h3>
                        <div class="hover-3-description small text-uppercase mb-0">
                          <p>{{$content->date}}</p>
                          <a href="{{route('dashboard.edit', $content->id)}}" class="text-decoration-none text-white mt-1 edit fw-bold me-2">EDIT</a>
                          <a href="{{route('dashboard.destroy', $content->id)}}" class="text-decoration-none text-white mt-1 delete fw-bold"
                            onclick="event.preventDefault();document.getElementById('content-delete-{{$content->id}}').submit();">DELETE</a>

                          <form id="content-delete-{{$content->id}}" action="{{ route('dashboard.destroy', $content->id) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                          </form>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
              {!! $contents->links() !!}
            </div>
        </div>
    </div>
    <div class="contact mt-5" id="contact">
        <h1 class="text-center fw-bold display-4 my-5">Contact</h1>
        <div class="d-flex justify-content-center">
            <div class="mx-5 text-center">
                <i class="fas fa-phone-square-alt fa-5x mx-5"></i>
                <p class="text-secondary my-2">Phone</p>
                <h4 class="fw-bold">{{ auth()->guard('web')->user()->phone }}</h4>
            </div>
            <div class="mx-5 text-center">
                <i class="fas fa-envelope-square fa-5x mx-5"></i>
                <p class="text-secondary my-2">Email</p>
                <a href="#" class="fw-bold">{{ auth()->guard('web')->user()->email }}</a>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-center text-white">
      <div class="container p-4 pb-0">
        <section class="mb-4">
          <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/Twitter?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" role="button"
            ><i class="fab fa-twitter"></i
          ></a>
          <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com/" role="button"
            ><i class="fab fa-google"></i
          ></a>
          <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button"
            ><i class="fab fa-instagram"></i
          ></a>
        </section>
      </div>
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="#">myportfolio.com</a>
      </div>
    </footer>
<body>

   {{-- js bootstrap --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>