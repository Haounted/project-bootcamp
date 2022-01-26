<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Content</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Font Awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
    integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
    crossorigin="anonymous"></script>
</head>
<body class="content">
    <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand text-white fw-bold hover-text" href="{{route('dashboard.index')}}">My Portfolio</a>
            <button class="navbar-toggler text-uppercase fw-bold bg-dark text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    <div class="body mt-6 container">
        <img src="{{ asset($content->image) }}" class="card-img-top" alt="">
        <div class="d-flex justify-content-end mt-5">
            <a href="{{route('content.create', $content->id)}}" class="btn btn-dark p-2"><i class="fas fa-plus"></i> Add Photo</a>
        </div>
        <div class="">
            <h1 class="fw-bold text-center mt-3 mb-0">{{ $content->name}}</h1>
            <p class="text-secondary text-center">{{$content->date}}</p>
        </div>
        <div class="pl-4 text-center">
            {{$content->deskripsi}}
        </div>
        
        <div class="row">
            @foreach ( $photos as $photo )
                <div class="col-4 mt-5">
                    <div class="card" style="width: 25rem;">
                        <a href="{{route('content.show', [$photo->id, $content->id])}}">
                        <img src="{{ asset($photo->image) }}" class="card-img-top" alt="..." id="">
                        <div class="overlay">
                            <a href="{{route('content.destroy', [$photo->id, $content->id])}}" class="text-decoration-none text-white mt-1 delete fw-bold"
                                onclick="event.preventDefault();document.getElementById('photo-delete-{{$content->id}}-{{$photo->id}}').submit();">DELETE</a>
    
                              <form id="photo-delete-{{$content->id}}-{{$photo->id}}" action="{{route('content.destroy', [$photo->id, $content->id])}}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                              </form>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5">
          {!! $photos->links() !!}
        </div>
    </div>
    <footer class="bg-dark text-center text-white mt-5">
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
      {{-- js bootstrap --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>