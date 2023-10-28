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

              @if(session()->has('success'))
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
              @endif

                <main>
                  <div class="container mb-5">
                        <div class="row">
                            <div class="col vh-100 d-flex align-items-center justify-content-center">
                                <a>
                                    <img src="{{asset('images/logiin.jpg')}}" style="img-login" class="align-self-center" alt="...">
                                </a> 
                            </div>
                            <div class="col-md-4 align-self-center">
                              <div class="mb-5 d-flex justify-content-center">
                                <a class="nav-link" href="/">
                                  <img src=" {{ asset('images/acmLogo.png') }}" alt="Image" class="img-fluid rounded" width="400px">
                                </a>
                              </div>
                              <main class="form-signin">
                                <h1 class="h3 mt-5 mb-3 fw-900 text-center">Masuk</h1>
                                <form action="/login" method="post">
                                  @csrf
                                  <div class="form-floating mb-2">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                                    <label for="email">Alamat Email</label>
                                    @error('email')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                    @error('password')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                  </div>
                              
                                  <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
                                </form>
                                <small class="d-block text-center mt-3">Belum Punya Akun? <a href="/register">Daftar Sekarang!</a></small>
                                {{-- <small class="d-block text-center mt-3">Belum Punya Akun? <a href="/register">Daftar Sekarang!</a><a href="/forgot-password">  Lupa Pasword?</a></small> --}}
                                <a class="small d-block text-center mt-3" href="/forgot-password">Lupa Pasword?</a>
                                
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
