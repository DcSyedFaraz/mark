<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('/frontend/css/style.css') }}" rel="stylesheet" />
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/toastr/toastr.min.css') }}">
    <title>Home</title>
</head>

<body>
    <section class="bg1">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="main-text">Johnson Point Homeowners</h2>
                </div>
                <div class="col-lg-4">
                    <div class="main-div">
                        <div class="direc-div mt-3">
                            <a href="#" class="icon-img-a"><img src="{{ asset('frontend/images/icon1.png') }}"
                                    alt="icon-1" class="icon-img" /></a>
                            <a href="#" class="direc-a">
                                <h4 class="direc-text">Directory</h4>
                            </a>
                        </div>
                        <div class="direc-div mt-5">
                            <a href="#" class="icon-img-a"><img src="{{ asset('frontend/images/icon2.png') }}"
                                    alt="icon-1" class="icon-img" /></a>
                            <a href="#" class="direc-a">
                                <h4 class="direc-text">Physical Infrastructure Info</h4>
                            </a>
                        </div>
                        <div class="direc-div mt-5">
                            <a href="#" class="icon-img-a"><img src="{{ asset('frontend/images/icon3.png') }}"
                                    alt="icon-1" class="icon-img" /></a>
                            <a href="#" class="direc-a">
                                <h4 class="direc-text">General Info</h4>
                            </a>
                        </div>
                        <div class="direc-div mt-5">
                            <a href="#" class="icon-img-a"><img src="{{ asset('frontend/images/icon4.png') }}"
                                    alt="icon-1" class="icon-img" /></a>
                            <a href="#" class="direc-a">
                                <h4 class="direc-text">Photo Gallery</h4>
                            </a>
                        </div>
                        <div class="direc-div mt-5">
                            <a href="#" class="icon-img-a"><img src="{{ asset('frontend/images/icon5.png') }}"
                                    alt="icon-1" class="icon-img" /></a>
                            <a href="#" class="direc-a">
                                <h4 class="direc-text">Event Calendar</h4>
                            </a>
                        </div>
                        <div class="direc-div mt-5">
                            <a href="#" class="icon-img-a"><img src="{{ asset('frontend/images/icon6.png') }}"
                                    alt="icon-1" class="icon-img" /></a>
                            <a href="#" class="direc-a">
                                <h4 class="direc-text">Resource Directory</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                </div>
                <div class="col-lg-4">
                    <div class="form-div">
                        <h3 class="sign-in">SIGN IN</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="email" name="email" class="form-control" placeholder="Enter your Email"
                                required />
                            <input type="password" name="password" class="form-control mt-3"
                                placeholder="Enter your Password" required />
                            <button type="submit" class="btn-submit">Sign in</button>
                            <a href="{{ route('register') }}"><button type="button"
                                    class="btn-submit bg-primary text-light">Sign up</button></a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <!-- Toastr -->
    <script src="{{ asset('/admin/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}")
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
</body>

</html>
