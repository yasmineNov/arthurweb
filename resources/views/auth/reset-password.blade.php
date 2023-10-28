<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (kode lainnya) ... -->
</head>
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
                <h3 class="mb-1 fw-900 text-center">Reset Password</h3>
                <h5 class="mb-4 fw-900 text-center">Masukkan Password Baru Anda ! </h5>
                <form action="/reset-password" method="post"> <!-- Gunakan method POST untuk mengirim data -->
                    @csrf

                    <!-- Hidden field untuk menyimpan ID pengguna -->
                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <!-- Password Baru -->
                    <div class="form-floating mb-2">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password Baru" required>
                        <label for="password">Password Baru</label>
                    </div>

                    <!-- Konfirmasi Password Baru -->
                    <div class="form-floating mb-2">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-warning" type="submit">Atur Ulang Password</button>
                </form>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
