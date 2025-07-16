<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                @if(session('error'))
                    <div class="alert alert-danger my-2">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card shadow-sm p-5">
                    <div class="card-header bg-white text-center">
                        <h3 class="mt-2">LOGIN</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.auth') }}" method="POST">
                            @csrf

                            {{-- Email --}}
                            <div class="form-floating mb-3">
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       id="floatingInput" 
                                       placeholder="Correo electrónico">
                                <label for="floatingInput">Correo electrónico</label>
                                @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Contraseña --}}
                            <div class="form-floating mb-3">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       id="floatingPassword" 
                                       placeholder="Contraseña">
                                <label for="floatingPassword">Contraseña</label>
                                @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Botón --}}
                            <div class="mb-2 text-center">
                                <button type="submit" class="btn btn-lg btn-primary w-100">
                                    Iniciar Sesión
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>
