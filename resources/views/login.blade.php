@extends('layouts.default')

@section('content')
    <div class="container-fluid d-flex align-items-center p-0">
        
        <div class="login-image">
            <img src="{{ asset('mosque.jpg') }}" class="card-img-top object-fit-cover vh-100" style="width: 600px" alt="...">   
        </div>

        <div class="login-form mx-auto">
            <div class="title mb-4">
                <h1>Selamat Datang! <br> Silahkan masukkan data.</h1>
            </div>

            <div class="form-input">
                <a href="/auth/google" class="btn btn-md btn-outline-dark w-100 py-2">Masuk dengan akun Google</a>
                <div class="divider my-2 d-flex justify-content-between align-items-center">
                    <hr style="width: 35%"><span>Atau</span><hr style="width: 35%">
                </div>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <label for="password">Kata Sandi</label>
                        </div>
    
                        <div class="form-helper d-flex justify-content-between align-items-center my-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Ingat untuk 30 Hari</label>
                            </div>
                            <a href="http://" class="btn btn-link">Lupa password ?</a>                          
                        </div>
    
                        <button type="submit" class="btn btn-md btn-dark w-100 py-3">Masuk</button>
                        <p class="text-center mt-2">TIdak ada akun ? <strong><a href="/register">Register</a></strong></p>
                    </div>
                </form>
            </div>
            


        </div>

    </div>
@endsection