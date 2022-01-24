<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Content</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Font Awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
        integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
        crossorigin="anonymous"></script>
</head>
<body class="add">
    <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand text-white fw-bold hover-text" href="{{route('dashboard.index')}}">My Portfolio</a>
            <button class="navbar-toggler text-uppercase fw-bold bg-dark text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    <div class="body container">
        <h1 class="fw-bold display-5 mt-5 pt-5" >Add Content</h1>
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form method="post" action="{{route('dashboard.store')}}" class="" enctype="multipart/form-data">
            @csrf
            <div class="my-3 d-flex flex-column">
                <label for="name" class="my-3">Title</label>
                <input type="text" name="name" id="name" placeholder="Title Name" class="p-2">
            </div>
            <div class="my-3 d-flex flex-column">
                <label for="desc" class="my-3">Description</label>
                <textarea name="deskripsi" id="desc" cols="20" rows="5" placeholder="Explain"></textarea>
            </div>
            <div class="my-3 d-flex flex-column">
                <label for="Date" class="my-3">Date</label>
                <input type="date" name="date" placeholder="Date" class="p-2">
            </div>
            <div class="my-3 d-flex flex-column">
                <label for="image" class="my-3">Upload Image</label>
                <input type="file" name="image" id="image" class="" onchange="loadFile(event)">
                <img src="" alt="Your image" id="uploadImage" height="300" width="300">
            </div>
            <button class="btn btn-dark px-3 py-2 my-3" type="submit">Submit</button>
        </form>
    </div>
    <footer class="bg-dark text-center text-white mt-3">
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
   <script>
    function loadFile(event) {
        let output = document.querySelector('#uploadImage')
        output.src = URL.createObjectURL(event.target.files[0])
    }
</script>
</body>
</html>