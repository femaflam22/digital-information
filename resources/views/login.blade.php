<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMK Wikrama Kota Bogor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body style="background: #eee">
    <section class="vh-100 bg-white">
        <div class="container py-5 h-100">
            @if(Session::has('failed'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('failed') }}
            </div>
            @endif
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-white text-dark" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <form class="mb-md-5 mt-md-4 pb-5" action="{{route('login-form')}}" method="POST">
                    @csrf
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-secondary mb-5">Please enter your login and password!</p>
      
                    <div class="form-outline mb-4">
                        <label class="form-label" for="typeEmailX">Email</label>
                        <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" />
                    </div>
      
                    <div class="form-outline mb-4">
                        <label class="form-label" for="typePasswordX">Password</label>
                      <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
                    </div>
      
                    <button class="btn btn-primary btn-lg px-5" type="submit">Login</button>
      
                  </form>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>