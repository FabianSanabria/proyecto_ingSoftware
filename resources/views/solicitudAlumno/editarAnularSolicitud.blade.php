@extends('layouts.app')

@section('content')
    @if (Auth::user()->rol == 0)
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8 login-box">
                    <div class="col-lg-12 login-key">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="col-lg-12 login-title">
                        EDITAR SOLICITUD
                    </div>
        @if (session('solicitud') == 0)
                    <div class="col-lg-12 login-form">
                        <div class="col-lg-12 login-form">
                            <form method="POST"
                                action="{{ route('solicitud.edit', [$solicitud]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-control-label">TELEFONO</label>
                                    <input value="{{ $solicitud->telefono }}"
                                        id="telefono"
                                        type="text"
                                        class="form-control @error('telefono') is-invalid @enderror"
                                        name="telefono"
                                        required>

                                    @error('telefono')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">NRC</label>
                                    <input value="{{ $solicitud->nrc }}"
                                        id="nrc"
                                        type="text"
                                        class="form-control @error('nrc') is-invalid @enderror"
                                        name="nrc"
                                        required>

                                    @error('nrc')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                    <input value="{{ $solicitud->nombre_asignatura }}"
                                        id="nombre_asignatura"
                                        type="text"
                                        class="form-control @error('nombre_asignatura') is-invalid @enderror"
                                        name="nombre_asignatura"
                                        required>

                                    @error('nombre_asignatura')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">DETALLE</label>
                                    <input value="{{ $solicitud->detalle }}"
                                        id="detalle"
                                        type="text"
                                        class="form-control @error('detalle') is-invalid @enderror"
                                        name="detalle"
                                        required>

                                    @error('detalle')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 py-3">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit"
                                            class="btn btn-outline-primary">{{ __('Editar') }}</button>
                                    </div>
                                </div>
                                <div class="col-lg-12 py-3">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit"
                                            class="btn btn-outline-primary">{{ __('Anular') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2"></div>
                </div>
            </div>
            @elseif (session('solicitud')  == 1)
            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form method="POST"
                        action="{{ route('solicitud.edit', [$solicitud]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-control-label">TELEFONO</label>
                            <input value="{{ $solicitud->telefono }}"
                                id="telefono"
                                type="text"
                                class="form-control @error('telefono') is-invalid @enderror"
                                name="telefono"
                                required>

                            @error('telefono')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NRC</label>
                            <input value="{{ $solicitud->nrc }}"
                                id="nrc"
                                type="text"
                                class="form-control @error('nrc') is-invalid @enderror"
                                name="nrc"
                                required>

                            @error('nrc')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                            <input value="{{ $solicitud->nombre_asignatura }}"
                                id="nombre_asignatura"
                                type="text"
                                class="form-control @error('nombre_asignatura') is-invalid @enderror"
                                name="nombre_asignatura"
                                required>

                            @error('nombre_asignatura')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">DETALLE</label>
                            <input value="{{ $solicitud->detalle }}"
                                id="detalle"
                                type="text"
                                class="form-control @error('detalle') is-invalid @enderror"
                                name="detalle"
                                required>

                            @error('detalle')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Editar') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Anular') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
                @elseif (session('solicitud')  == 2)
                        <div class="col-lg-12 login-form">
                            <div class="col-lg-12 login-form">
                                <form method="POST"
                                    action="{{ route('solicitud.edit', [$solicitud]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="form-control-label">TELEFONO</label>
                                        <input value="{{ $solicitud->telefono }}"
                                            id="telefono"
                                            type="text"
                                            class="form-control @error('telefono') is-invalid @enderror"
                                            name="telefono"
                                            required>

                                        @error('telefono')
                                            <span class="invalid-feedback"
                                                role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">NRC</label>
                                        <input value="{{ $solicitud->nrc }}"
                                            id="nrc"
                                            type="text"
                                            class="form-control @error('nrc') is-invalid @enderror"
                                            name="nrc"
                                            required>

                                        @error('nrc')
                                            <span class="invalid-feedback"
                                                role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                        <input value="{{ $solicitud->nombre_asignatura }}"
                                            id="nombre_asignatura"
                                            type="text"
                                            class="form-control @error('nombre_asignatura') is-invalid @enderror"
                                            name="nombre_asignatura"
                                            required>

                                        @error('nombre_asignatura')
                                            <span class="invalid-feedback"
                                                role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">DETALLE</label>
                                        <input value="{{ $solicitud->detalle }}"
                                            id="detalle"
                                            type="text"
                                            class="form-control @error('detalle') is-invalid @enderror"
                                            name="detalle"
                                            required>

                                        @error('detalle')
                                            <span class="invalid-feedback"
                                                role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 py-3">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                class="btn btn-outline-primary">{{ __('Editar') }}</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 py-3">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                class="btn btn-outline-primary">{{ __('Anular') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-2"></div>
                    </div>
                </div>
                    @elseif (session('solicitud')  == 3)
                        <div class="col-lg-12 login-form">
                            <div class="col-lg-12 login-form">
                                <form method="POST"
                                action="{{ route('solicitud.edit', [$solicitud]) }}">
                                @csrf
                                @method('PUT')
                        <div class="form-group">
                            <label class="form-control-label">TELEFONO</label>
                            <input value="{{ $solicitud->telefono }}"
                                id="telefono"
                                type="text"
                                class="form-control @error('telefono') is-invalid @enderror"
                                name="telefono"
                                required>

                            @error('telefono')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NRC</label>
                            <input value="{{ $solicitud->nrc }}"
                                id="nrc"
                                type="text"
                                class="form-control @error('nrc') is-invalid @enderror"
                                name="nrc"
                                required>

                            @error('nrc')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                            <input value="{{ $solicitud->nombre_asignatura }}"
                                id="nombre_asignatura"
                                type="text"
                                class="form-control @error('nombre_asignatura') is-invalid @enderror"
                                name="nombre_asignatura"
                                required>

                            @error('nombre_asignatura')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">DETALLE</label>
                            <input value="{{ $solicitud->detalle }}"
                                id="detalle"
                                type="text"
                                class="form-control @error('detalle') is-invalid @enderror"
                                name="detalle"
                                required>

                            @error('detalle')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Editar') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Anular') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
                        @elseif (session('solicitud')  == 4)
                            <div class="col-lg-12 login-form">
                                <div class="col-lg-12 login-form">
                                <form method="POST"
                                action="{{ route('solicitud.edit', [$solicitud]) }}">
                                @csrf
                                @method('PUT')
                        <div class="form-group">
                            <label class="form-control-label">TELEFONO</label>
                            <input value="{{ $solicitud->telefono }}"
                                id="telefono"
                                type="text"
                                class="form-control @error('telefono') is-invalid @enderror"
                                name="telefono"
                                required>

                            @error('telefono')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NRC</label>
                            <input value="{{ $solicitud->nrc }}"
                                id="nrc"
                                type="text"
                                class="form-control @error('nrc') is-invalid @enderror"
                                name="nrc"
                                required>

                            @error('nrc')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                            <input value="{{ $solicitud->nombre_asignatura }}"
                                id="nombre_asignatura"
                                type="text"
                                class="form-control @error('nombre_asignatura') is-invalid @enderror"
                                name="nombre_asignatura"
                                required>

                            @error('nombre_asignatura')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">DETALLE</label>
                            <input value="{{ $solicitud->detalle }}"
                                id="detalle"
                                type="text"
                                class="form-control @error('detalle') is-invalid @enderror"
                                name="detalle"
                                required>

                            @error('detalle')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Editar') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Anular') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
                        @elseif (session('solicitud')  == 5)
            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form method="POST"
                        action="{{ route('solicitud.edit', [$solicitud]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-control-label">TELEFONO</label>
                            <input value="{{ $solicitud->telefono }}"
                                id="telefono"
                                type="text"
                                class="form-control @error('telefono') is-invalid @enderror"
                                name="telefono"
                                required>

                            @error('telefono')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NOMBRE DE ASIGNATURA</label>
                            <input value="{{ $solicitud->nombre_asignatura }}"
                                id="nombre_asignatura"
                                type="text"
                                class="form-control @error('nombre_asignatura') is-invalid @enderror"
                                name="nombre_asignatura"
                                required>

                            @error('nombre_asignatura')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">CALIFICACION DE ASIGNATURA</label>
                            <input value="{{ $solicitud->nota_aprobacion }}"
                                id="nota_aprobacion"
                                type="text"
                                class="form-control @error('nota_aprobacion') is-invalid @enderror"
                                name="nota_aprobacion"
                                required>

                            @error('nota_aprobacion')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">CANTIDAD DE AYUDANTIA</label>
                            <input value="{{ $solicitud->cant_ayudantia }}"
                                id="cant_ayudantia"
                                type="text"
                                class="form-control @error('cant_ayudantia') is-invalid @enderror"
                                name="cant_ayudantia"
                                required>

                            @error('cant_ayudantia')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">DETALLE</label>
                            <input value="{{ $solicitud->detalle }}"
                                id="detalle"
                                type="text"
                                class="form-control @error('detalle') is-invalid @enderror"
                                name="detalle"
                                required>

                            @error('detalle')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                                <div class="col-lg-12 py-3">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit"
                                            class="btn btn-outline-primary">{{ __('Editar') }}</button>
                                    </div>
                                </div>
                                <div class="col-lg-12 py-3">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit"
                                            class="btn btn-outline-primary">{{ __('Anular') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2"></div>
                </div>
            </div>
            @elseif (session('solicitud')  == 6)
                            <div class="col-lg-12 login-form">
                                <div class="col-lg-12 login-form">
                                <form method="POST"
                                action="{{ route('solicitud.edit', [$solicitud]) }}">
                                @csrf
                                @method('PUT')
                        <div class="form-group">
                            <label class="form-control-label">TELEFONO</label>
                            <input value="{{ $solicitud->telefono }}"
                                id="telefono"
                                type="text"
                                class="form-control @error('telefono') is-invalid @enderror"
                                name="telefono"
                                required>

                            @error('telefono')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">TIPO DE SOLICITUD</label>
                            <input value="{{ $solicitud->tipo_solicitud }}"
                                id="tipo_solicitud"
                                type="text"
                                class="form-control @error('tipo_solicitud') is-invalid @enderror"
                                name="tipo_solicitud"
                                required>

                            @error('tipo_solicitud')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NOMBRE DEL PROFESOR</label>
                            <input value="{{ $solicitud->nombre_profesor }}"
                                id="nombre_profesor"
                                type="text"
                                class="form-control @error('nombre_profesor') is-invalid @enderror"
                                name="nombre_profesor"
                                required>

                            @error('nombre_profesor')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                            <input value="{{ $solicitud->nombre_asignatura }}"
                                id="nombre_asignatura"
                                type="text"
                                class="form-control @error('nombre_asignatura') is-invalid @enderror"
                                name="nombre_asignatura"
                                required>

                            @error('nombre_asignatura')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">DETALLE</label>
                            <input value="{{ $solicitud->detalle }}"
                                id="detalle"
                                type="text"
                                class="form-control @error('detalle') is-invalid @enderror"
                                name="detalle"
                                required>

                            @error('detalle')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">ARCHIVOS</label>
                            <input value="{{ $solicitud->archivo }}"
                                id="archivo"
                                type="text"
                                class="form-control @error('archivo') is-invalid @enderror"
                                name="archivo"
                                required>

                            @error('archivo')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Editar') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit"
                                    class="btn btn-outline-primary">{{ __('Anular') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </form>
    <script type="text/javascript">
    var i = 0;
        function makeFileList() {
            var fileInput = document.getElementById('file'+i);
            var filename = fileInput.files[0].name;
            document.getElementById("fileList"+i).innerHTML = filename;
            i = i+1;
            document.getElementById("cantArchivos").value = i;
        }
        function borrarArchivo(){
            if(i>0){
            i = i - 1;
            document.getElementById("fileList"+i).innerHTML = '';
            document.getElementById("cantArchivos").value = i;
            }


        }
    </script>
        @else
            @php
                header('Location: /home');
                exit();
            @endphp
        @endif
    </div>
    <script>
        const button = document.getElementById('boton');
        const form = document.getElementById('formulario')
        button.addEventListener('click', function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro que quieres editar la solicitud?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Enviar',
                denyButtonText: `Cancelar envio`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    form.submit();
                    } else if (result.isDenied) {
                    Swal.fire('Envio cancelado', '', 'info')
                }
            })
        })
    </script>
    @endif
@endsection
