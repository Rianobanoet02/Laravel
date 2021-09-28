<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('css/style.css')}}"><!doctype html>
    <html lang="en">

        <body style="background-image: url(images/back_ground.png);">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-10">
                        <div class="wrap d-md-flex">
                            <div class="img" style="background-image: url(images/time.jpg);">
                      </div>
                            <div class="login-wrap p-4 p-md-5">
                          <div class="d-flex">
                              <div class="w-100">
                                  <h3 class="mb-4">Sign In</h3>
                              </div>
                                    <div class="w-100">
                                        <p class="social-media d-flex justify-content-end">

                                        </p>
                                    </div>
                          </div>
                                <form action="{{ route('login') }}" method="post" class="signin-form">
                                    @csrf
                                    <div class="signin-form">
                                        @if(session('errors'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Something it's wrong:
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif
                                        @if (Session::has('error'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('error') }}
                                            </div>
                                        @endif
                              <div class="form-group mb-3">
                                  <label class="label" for="name">Username</label>
                                  <input type="text" class="form-control" name="email" placeholder="Username" required>
                                </div>
                              </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                        </div>

                      </form>
                      <p class="text-center">Not a member? <a href="{{ route('register') }}">Sign Up</a></p>
                    </div>
                  </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>

        </body>
    </html>

