<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Manten tus datos al dia') }}</title>

    <!--favicon-->
    <link rel="shortcut icon" href="{{ asset('favicon.ico?v=' . now()->format('H.s')) }}" type="image/x-icon">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css?v=' . now()->format('H.s')) }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-ms-12 bg-danger">
                {{-- {{ Str::title($data) }} --}}
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 mx-auto" style="border:1px solid #000;padding:10px;box-shadow:5px 5px 5px black;">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <form action="{{route('verifyCode')}}" method="post" class="requires-validation" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="container">
                                    <div class="input-group mt-3">
                                    <div class="input-group">
                                        <div class="col-md-12 mx-auto mt-4">
                                            <p>
                                                <h4>
                                                    Estamos a un paso de terminar tu actualización de datos por favor ingresa el código
                                                    que te enviamos a tu número de celular, para culminar el proceso de validación de tu
                                                    identidad cunista.
                                                </h4>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="col-md-6 mx-auto mt-4">
                                            <input class="form-control" type="number" name="numPhone" hidden value="{{$numPhone}}" required>
                                            <div class="invalid-feedback">Código SMS field cannot be blank!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="col-md-6 mx-auto mt-4">
                                            <input class="form-control" type="number" name="Code" placeholder="Código SMS" required>
                                            <div class="invalid-feedback">Código SMS field cannot be blank!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mx-auto">
                                    <div class="form-button mt-3">
                                        <button id="submit" type="submit" class="sombra btn btn-secondary">{{ __('Guardar informacion') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function () {
                        "use strict";
                        const forms = document.querySelectorAll(".requires-validation");
                        Array.from(forms).forEach(function (form) {
                            form.addEventListener(
                                "submit",
                                function (event) {
                                    if (!form.checkValidity()) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }

                                    form.classList.add("was-validated");
                                },
                                false
                            );
                        });
                    })();
                </script>
            </div>
        </div>
    </div>
</body>

</html>
