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
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
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
                <main class="form-registration">
                    <h3 class="mb-1 fw-900 text-center">Lupa Password ?</h3>
                    <h5 class="mb-4 fw-900 text-center">Masukkan Nomor Whatsapp & Email Anda ! </h5>
                    <form action="/forgot-password" method="post"> <!-- Gunakan method POST untuk mengirim data -->
                        @csrf
    
                        <!-- WhatsApp -->
                        <div class="form-floating mb-2">
                            <input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="Nomor Whatsapp" required>
                            <label for="whatsapp">Nomor Whatsapp</label>
                        </div>
    
                        <!-- Email -->
                        <div class="form-floating mb-2">
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                            <label for="email">Alamat Email</label>
                        </div>
    
                        <button class="w-100 btn btn-lg btn-warning" type="submit">Konfirmasi Akun</button>
                    </form>
                    <small class="d-block text-center mt-3">Sudah Punya Akun? <a href="/login">Masuk Sekarang!</a></small>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
