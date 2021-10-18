@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('crear.Usuario') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut usuario') }}</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" required autocomplete="rut">

                                @error('rut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">

                                <select name="carrera" id ="carrera" class="form-control">

                                    @if ($totalCarreras == 0)

                                    <option selected disabled value="Carrera">No hay carreras en el sistema</option>


                                    @else
                                    @foreach($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                                    @endforeach

                                    @endif
                                </select>
                                <div id="validation" class="invalid-feedback">
                                    @error('carreras')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">

                                <select name="rol" id= "rol"aria-describedby="validationServer04Feedback" required>
                                    <option selected disabled value="Rol">Rol</option>
                                    <option value="Estudiante">Estudiante</option>
                                    <option value="Jefe de Carrera">Jefe de Carrera</option>
                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    @error('rol')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="boton" name= "boton" type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                       </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    @if ($totalCarreras == 0)
    <script>
        document.getElementById('boton').disabled=true;
        Swal.fire({
            icon: 'Error',
            title: 'No es posible crear usuarios',
            text: 'No hay carreras en el sistema',
            })
    </script>
    @endif
@endsection
