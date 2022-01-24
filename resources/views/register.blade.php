<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <img src="{{asset('assets/image/background.jpeg')}}" alt="" class="background-login">
    <div class="box d-flex justify-content-center align-items-center">
        <div class="shadow p-5 mb-5 bg-white rounded">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="text-center mb-4">Register</h1>
            <form action="" method="post" class="d-flex flex-column">
                @csrf
                <div class="d-flex flex-column my-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="p-1" value="{{old('name')}}">
                </div>
                <div class="d-flex flex-column ">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email" class="p-1" value="{{old('email')}}">
                </div>
                <div class="d-flex flex-column my-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="p-1">
                </div>
                <div class="d-flex flex-column">
                    <label for="password2">Your Password</label>
                    <input type="password" name="password_confirmation" id="password2" placeholder="Repeat Password" class="p-1">
                </div>
                <div class="d-flex flex-column my-2">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="08xxxxxxxxx" pattern="08{9-11}" class="p-1" value="{{old('phone')}}" >
                </div>
                <div class="my-2 d-flex flex-column">
                    <label for="">Gender</label>
                    <div class="">
                        <input type="radio" value="male" name="gender" id="male">
                        <label for="male">Male</label> 
                    </div>
                    <div class="">
                        <input type="radio" value="female" name="gender" id="female">
                        <label for="female">Female</label>
                    </div>
                </div>
                <button type="submit" class="btn-dark my-3 rounded">Register</button>
            </form>
            <span>Have already an account? <a href="{{route('login')}}">Login</a></span>
        </div>
    </div>
   {{-- js bootstrap --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>