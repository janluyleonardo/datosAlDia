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
            <div class="col-ms-6 mx-auto bg-danger">
                {{ Str::title($msj) }}
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 mx-auto" style="border:1px solid #000;padding:10px;box-shadow:5px 5px 5px black;">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <form action="{{route('students.store')}}" method="post" class="requires-validation" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="container">
                                    <div class="input-group mt-3">
                                        {{-- <div class="col-md-12">
                                            <input class="form-control mt-3" type="file" name="Photo" accept="image/png, image/jpeg" required>
                                            <div class="valid-feedback">UserPhoto field is valid!</div>
                                            <div class="invalid-feedback">UserPhoto field cannot be blank!</div>
                                        </div> --}}
                                        {{-- <div class="input-group mt-3">
                                        <div class="col-md-4 my-auto ">
                                            <input class="form-control" type="text" name="EstaturaDeportista" placeholder="Estatura" required>
                                            <div class="valid-feedback">Estatura field is valid!</div>
                                            <div class="invalid-feedback">Estatura field cannot be blank!</div>
                                        </div>
                                        <div class="col-md-1 my-auto "></div>
                                        <div class="col-md-2 my-auto ">
                                            <input class="form-control" type="text" name="RHDeportista"
                                                id="RHDeportista" placeholder="RH" required>
                                            <div class="valid-feedback">RH field is valid!</div>
                                            <div class="invalid-feedback">RH field cannot be blank!</div>
                                        </div>
                                        <div class="col-md-1 my-auto "></div>
                                        <div class="col-md-4 my-auto mt-4">
                                            <input class="form-control" type="date" name="fechaNacimiento"
                                                id="fechaNacimiento" required>
                                            <div class="valid-feedback mv-up">You selected a fecha de nacimiento!</div>
                                            <div class="invalid-feedback mv-up">Please select a fecha de nacimiento!
                                            </div>
                                            Fecha de nacimiento
                                        </div>
                                    </div> --}}
                                        <div class="col-md-12">
                                            <input class="form-control" type="text" name="fullName" placeholder="Nombre completo" required>
                                            <div class="invalid-feedback">Nombre completo field cannot be blank!</div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="col-md-5 my-auto mt-4">
                                            <input class="form-control" type="email" name="personalMail" placeholder="Correo electrónico personal" required>
                                            <div class="invalid-feedback">Correo electrónico personal field cannot be blank!
                                            </div>
                                        </div>
                                        <div class="col-md-2 my-auto mt-4"></div>
                                        <div class="col-md-5 my-auto mt-4">
                                            <input class="form-control" type="email" name="institutionalMail" placeholder="Correo electrónico institucional" required>
                                            <div class="invalid-feedback">Correo electrónico institucional field cannot be blank!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="col-md-6">
                                            <select class="form-control" name="tipoDocumento" required>
                                                <option value="">Seleccionar un tipo de documento</option>
                                                <option value="CC">Cedula de ciudadania</option>
                                                <option value="CE">Cedula de extranjeria</option>
                                                <option value="TI">Tarjeta de identidad</option>
                                                <option value="PA">Pasaporte</option>
                                            </select>
                                            <div class="invalid-feedback mv-up">Please select a tipo de documento!</div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5 my-auto ">
                                            <input class="form-control" type="number" name="numDoc" placeholder="Número de documento" required>
                                            <div class="invalid-feedback">Número de documento field cannot be blank!</div>
                                        </div>
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" name="numPhone" placeholder="Número de celular" required>
                                            <div class="invalid-feedback">Número de celular field cannot be blank!</div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5 my-auto ">
                                            <input class="form-control" type="number" name="anotherNumber" placeholder="Otro Número">
                                            <div class="invalid-feedback">Otro Número field cannot be blank!</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mx-auto mt-3">
                                        Dirección de residencia
                                    </div>
                                    <div class="input-group ">
                                        <div class="col-md-2">
                                            <select class="form-control" name="callePrincipal" required>
                                                <option value="">Principal</option>
                                                <option value="CL">Calle</option>
                                                <option value="CR">Carrera</option>
                                                <option value="DI">Diagonal</option>
                                                <option value="TR">Transversal</option>
                                            </select>
                                            <div class="invalid-feedback mv-up">Please select a calle principal!</div>
                                        </div>
                                        <div class="col-md-1 mx-auto">
                                            <input class="form-control" type="text" name="numCallePrimaria" placeholder="#" required>
                                            <div class="invalid-feedback">N° field cannot be blank!</div>
                                        </div>
                                        <div class="col-md-1 mx-auto">
                                            <select class="form-control" name="letraPrincipal">
                                                <option value="">...</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="J">J</option>
                                                <option value="K">K</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="N">N</option>
                                                <option value="O">O</option>
                                                <option value="P">P</option>
                                                <option value="Q">Q</option>
                                                <option value="R">R</option>
                                                <option value="S">S</option>
                                                <option value="T">T</option>
                                                <option value="U">U</option>
                                                <option value="V">V</option>
                                                <option value="W">W</option>
                                                <option value="X">X</option>
                                                <option value="Y">Y</option>
                                                <option value="Z">Z</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 mx-auto">
                                            <select class="form-control" name="cuadrantePrincipal">
                                                <option value="">...</option>
                                                <option value="Norte">Norte</option>
                                                <option value="Sur">Sur</option>
                                                <option value="Oriente">Oriente</option>
                                                <option value="Occidente">Occidente</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mx-auto">
                                            <select class="form-control" name="calleSecundaria" required>
                                                <option value="">secundaria</option>
                                                <option value="CL">Calle</option>
                                                <option value="CR">Carrera</option>
                                                <option value="DI">Diagonal</option>
                                                <option value="TR">Transversal</option>
                                            </select>
                                            <div class="invalid-feedback mv-up">Please select a tipo de calle secundaria!</div>
                                        </div>
                                        <div class="col-md-1  mx-auto">
                                            <input class="form-control" type="text" name="numSecundaria" placeholder="#" required>
                                            <div class="invalid-feedback">N° field cannot be blank!</div>
                                        </div>
                                        <div class="col-md-1  mx-auto">
                                            <select class="form-control" name="letraSecundaria" required>
                                                <option value="">...</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="J">J</option>
                                                <option value="K">K</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="N">N</option>
                                                <option value="O">O</option>
                                                <option value="P">P</option>
                                                <option value="Q">Q</option>
                                                <option value="R">R</option>
                                                <option value="S">S</option>
                                                <option value="T">T</option>
                                                <option value="U">U</option>
                                                <option value="V">V</option>
                                                <option value="W">W</option>
                                                <option value="X">X</option>
                                                <option value="Y">Y</option>
                                                <option value="Z">Z</option>
                                            </select>
                                            <div class="invalid-feedback mv-up">Please select a tipo de letra secundaria!</div>
                                        </div>
                                        <div class="mx-auto">-</div>
                                        <div class="col-md-1  mx-auto">
                                            <input class="form-control" type="text" name="numLote" placeholder="#" required>
                                            <div class="invalid-feedback">Número lote field cannot be blank!</div>
                                        </div>
                                        <div class="col-md-1  mx-auto">
                                            <select class="form-control" name="cuadranteSecundario" >
                                                <option value="">...</option>
                                                <option value="Norte">Norte</option>
                                                <option value="Sur">Sur</option>
                                                <option value="Oriente">Oriente</option>
                                                <option value="Occidente">Occidente</option>
                                            </select>
                                            {{-- <div class="valid-feedback mv-up">You selected a Categoria!</div> --}}
                                            <div class="invalid-feedback mv-up">Please select a tipo de documento!</div>
                                        </div>
                                        <div class="col-md-12 mx-auto mt-3">
                                            Lugar de residencia
                                        </div>
                                    </div>
                                    @livewire('state-city')
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
    @livewireScripts
</body>

</html>
