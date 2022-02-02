@extends('layouts.login')

@section('content')
    
<div class="container">
</div>

    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="features row">
                    <div class="col-md-4 mt-2">
                        <img src="{{url('frontend/images/pramuka.png')}}" alt="user" class="features-image">
                        <div class="description">
                            <h3>SIPPRA</h3>
                            <p>Presensi Application</p>
                        </div>
                    </div>
            </div>

                <div class="row justify-content-center">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Registrasi Akun</h1>
                                        </div>
                                        <form class="user">
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                                        placeholder="First Name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                        placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                                    placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                                    placeholder="No KTA">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="exampleInputPassword" placeholder="Password">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="exampleRepeatPassword" placeholder="Repeat Password">
                                                </div>
                                            </div>
                                            <hr>
                                            <a href="login.html" class="btn btn-primary btn-user btn-block">
                                                Register now
                                            </a>
                                            
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="{{ url ('login') }}">Sudah punya akun? Login!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>
        </section>
    </main>

    <!-- Outer Row -->
   

</div>

@endsection

    
