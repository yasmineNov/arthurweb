<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ACM &mdash; {{$title}}</title>
        <link href="css/styles-admin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    {{-- <body class="bg-primary"> --}}
    <body>
        {{-- //diperpendek// --}}
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">

              {{-- @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
          
              @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('loginError') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif --}}

                <main>
                    <div class="container mb-5">
                        <div class="row">
                            
                            <div class="col-md-5 align-self-center">
                                <div class="mb-5 d-flex justify-content-center">
                                    <a class="nav-link" href="/">
                                      <img src=" {{ asset('images/acmLogo.png') }}" alt="Image" class="img-fluid rounded" width="400px">
                                    </a>
                                  </div>
                              <main class="form-registration">
                                <h1 class="h3 mb-3 fw-900 text-center">Daftar</h1>
                                <form action="/register" method="post">
                                  @csrf
                                  {{-- //Nama --}}
                                  <div class="form-floating mb-2">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" autofocus required value="{{ old('name') }}">
                                    <label for="name">Username</label>
                                    @error('name')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                  </div>
                                  {{-- //Email --}}
                                  <div class="form-floating mb-2">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                                    <label for="email">Alamat Email</label>
                                    @error('email')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                  </div>
                                  {{-- //Password --}}
                                  <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                  </div>
                              
                                  <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
                                </form>
                                <small class="d-block text-center mt-3">Sudah Punya Akun? <a href="/login">Masuk Sekarang!</a></small>
                            </div>
                            <div class="col vh-100 d-flex align-items-center justify-content-center">
                                <a>
                                    <img src="{{asset('images/register.jpg')}}" style="img-login" class="align-self-center" alt="...">
                                </a> 
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>      
        
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
