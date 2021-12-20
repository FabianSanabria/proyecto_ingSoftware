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
                        Editar Solicitud
                    </div>
        @if ($solicitud->tipo == 0 || $solicitud->tipo == 1 || $solicitud->tipo == 2 || $solicitud->tipo == 3)
                    <div class="col-lg-12 login-form">
                        <div class="col-lg-12 login-form">
                            <form method="POST" id="formulario" action="{{ route('alumnoUpdateSolicitud',['id'=>$solicitud]) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="form-control-label">Teléfono</label>
                                    <input value="{{ $solicitud->numero_de_telefono }}"
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

                                @if ($solicitud->tipo == 0)

                                    @foreach ($listaSobrecupos as $sobrecupo)
                                        @if ($sobrecupo->solicitud_id == $solicitud->id)
                                            <div class="form-group">
                                                <label class="form-control-label">NRC</label>
                                                <input value="{{ $sobrecupo->nrc }}"
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
                                        @endif
                                    @endforeach

                                @elseif ($solicitud->tipo == 1)

                                    @foreach ($listaCambioParalelos as $cambioParalelo)
                                        @if ($cambioParalelo->solicitud_id == $solicitud->id)
                                            <div class="form-group">
                                                <label class="form-control-label">NRC</label>
                                                <input value="{{ $cambioParalelo->nrc }}"
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
                                        @endif
                                    @endforeach

                                @elseif ($solicitud->tipo == 2)

                                    @foreach ($listaElimAsignaturas as $elimAsignatura)
                                        @if ($elimAsignatura->solicitud_id == $solicitud->id)
                                            <div class="form-group">
                                                <label class="form-control-label">NRC</label>
                                                <input value="{{ $elimAsignatura->nrc }}"
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
                                        @endif
                                    @endforeach

                                @elseif ($solicitud->tipo == 3)

                                    @foreach ($listaInsAsignaturas as $insAsignatura)
                                        @if ($insAsignatura->solicitud_id == $solicitud->id)
                                            <div class="form-group">
                                                <label class="form-control-label">NRC</label>
                                                <input value="{{ $insAsignatura->nrc }}"
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
                                        @endif
                                    @endforeach

                                @endif

                                <div class="form-group">
                                    <label class="form-control-label">Nombre de la asignatura</label>
                                    <input value="{{ $solicitud->nombre_asignatura }}"
                                        id="nombreAsignatura"
                                        type="text"
                                        class="form-control @error('nombreAsignatura') is-invalid @enderror"
                                        name="nombreAsignatura"
                                        required>

                                    @error('nombreAsignatura')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Detalle</label>
                                    <textarea class = "form-control" name = "detalle" rows = "5">{{$solicitud->detalle}}</textarea>

                                    @error('detalle')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 py-3">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" name = "action" value = "editar"
                                            class="btn btn-outline-primary">{{ __('Editar') }}</button>
                                    </div>
                                </div>
                                <div class="col-lg-12 py-3">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" name = "action" value = "anular"
                                            class="btn btn-outline-primary">{{ __('Anular') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2"></div>
                </div>
            </div>
        @elseif ($solicitud->tipo  == 4)
                    <div class="col-lg-12 login-form">
                        <div class="col-lg-12 login-form">
                            <form method="POST" id="formulario" action="{{ route('alumnoUpdateSolicitud',['id'=>$solicitud]) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="form-control-label">Teléfono</label>
                                    <input value="{{ $solicitud->numero_de_telefono }}"
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
                                    <label class="form-control-label">Nombre de la asignatura</label>
                                    <input value="{{ $solicitud->nombre_asignatura }}"
                                        id="nombreAsignatura"
                                        type="text"
                                        class="form-control @error('nombreAsignatura') is-invalid @enderror"
                                        name="nombreAsignatura"
                                        required>

                                    @error('nombreAsignatura')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                @foreach ($listaAyudantias as $ayudantia)
                                    @if ($ayudantia->solicitud_id == $solicitud->id)
                                        <div class="form-group">
                                            <label class="form-control-label">Nota de aprobación</label>
                                            <input value="{{ $ayudantia->nota_aprobacion }}"
                                                id="nota"
                                                type="text"
                                                class="form-control @error('nota') is-invalid @enderror"
                                                name="nota"
                                                required>

                                            @error('nota')
                                                <span class="invalid-feedback"
                                                    role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Cantidad de ayudantías realizadas</label>
                                            <input value="{{ $ayudantia->cant_ayudantias }}"
                                                id="cantidadAyudantias"
                                                type="text"
                                                class="form-control @error('cantidadAyudantias') is-invalid @enderror"
                                                name="cantidadAyudantias"
                                                required>

                                            @error('cantidadAyudantias')
                                                <span class="invalid-feedback"
                                                    role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                @endforeach

                                <div class="form-group">
                                    <label class="form-control-label">Detalle</label>
                                    <textarea class = "form-control" name = "detalle" rows = "5">{{$solicitud->detalle}}</textarea>

                                    @error('detalle')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 py-3">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" name = "action" value = "editar"
                                            class="btn btn-outline-primary">{{ __('Editar') }}</button>
                                    </div>
                                </div>
                                <div class="col-lg-12 py-3">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" name = "action" value = "anular"
                                            class="btn btn-outline-primary">{{ __('Anular') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2"></div>
                </div>
            </div>
            @elseif ($solicitud->tipo  == 5)

                        <div class="col-lg-12 login-form">
                                <div class="col-lg-12 login-form">
                                <form method="POST" id="formulario"enctype='multipart/form-data' action="{{ route('alumnoUpdateSolicitud',['id'=>$solicitud]) }}">
                                @csrf
                                @method('PUT')
                        <div class="form-group">
                            <label class="form-control-label">Teléfono</label>
                            <input value="{{ $solicitud->numero_de_telefono }}"
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



                        @foreach ($listaFacilidades as $facilidad)
                            @if ($facilidad->solicitud_id == $solicitud->id)

                                <div class="form-group">
                                    <label for="facilidadAcademica" class="form-control-label">Tipo de solicitud</label>
                                    <div class="col-md-6">

                                        <select name="facilidadAcademica" id= "facilidadAcademica"style="position: relative;left:150px; bottom: 30px;border:1px solid #ccc; padding: 3px;border-radius: 10px;"aria-describedby="validationServer04Feedback" required >

                                        @if ($facilidad->tipo_solicitud == 1)
                                            <option value="1"{{ old('tipo_solicitud') == 1 ? 'selected' : '' }}> Licencia Médica o Certificado Médico</option>
                                            <option value="2"{{ old('tipo_solicitud') == 2 ? 'selected' : '' }}> Inasistencia por Fuerza Mayor</option>
                                            <option value="3"{{ old('tipo_solicitud') == 3 ? 'selected' : '' }}> Representación de la Universidad</option>
                                            <option value="4"{{ old('tipo_solicitud') == 4 ? 'selected' : '' }}> Inasistencia a clases por motivos familiares o personales</option>
                                        @elseif ($facilidad->tipo_solicitud == 2)
                                            <option value="2"{{ old('tipo_solicitud') == 2 ? 'selected' : '' }}> Inasistencia por Fuerza Mayor</option>
                                            <option value="1"{{ old('tipo_solicitud') == 1 ? 'selected' : '' }}> Licencia Médica o Certificado Médico</option>
                                            <option value="3"{{ old('tipo_solicitud') == 3 ? 'selected' : '' }}> Representación de la Universidad</option>
                                            <option value="4"{{ old('tipo_solicitud') == 4 ? 'selected' : '' }}> Inasistencia a clases por motivos familiares o personales</option>
                                        @elseif ($facilidad->tipo_solicitud == 3)
                                            <option value="3"{{ old('tipo_solicitud') == 3 ? 'selected' : '' }}> Representación de la Universidad</option>
                                            <option value="1"{{ old('tipo_solicitud') == 1 ? 'selected' : '' }}> Licencia Médica o Certificado Médico</option>
                                            <option value="2"{{ old('tipo_solicitud') == 2 ? 'selected' : '' }}> Inasistencia por Fuerza Mayor</option>
                                            <option value="4"{{ old('tipo_solicitud') == 4 ? 'selected' : '' }}> Inasistencia a clases por motivos familiares o personales</option>
                                        @elseif ($facilidad->tipo_solicitud == 4)
                                            <option value="4"{{ old('tipo_solicitud') == 4 ? 'selected' : '' }}> Inasistencia a clases por motivos familiares o personales</option>
                                            <option value="1"{{ old('tipo_solicitud') == 1 ? 'selected' : '' }}> Licencia Médica o Certificado Médico</option>
                                            <option value="2"{{ old('tipo_solicitud') == 2 ? 'selected' : '' }}> Inasistencia por Fuerza Mayor</option>
                                            <option value="3"{{ old('tipo_solicitud') == 3 ? 'selected' : '' }}> Representación de la Universidad</option>
                                        @endif

                                        </select>
                                        <div id="validationServer04Feedback" class="text-danger">
                                            @error('tipo_solicitud')
                                                <strong style="position:relative; left:263px; bottom:20px">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <?php $i = 0; ?>
                                @foreach ($listaArchivos as $archivo)
                                    @if ($archivo->facilidad_id == $facilidad->id)
                                        <div class="form-group">
                                            <label class="form-control-label">Archivo Adjunto</label>
                                            <input value="{{ $archivo->nombre_archivo }}"
                                                id="{{ 'labelFile'.$i }}"
                                                name="{{ 'labelFile'.$i }}"
                                                type="text"
                                                class="form-control"
                                                readonly>
                                        </div>
                                        <input type="button" value="Editar" style= "position:relative; top: 1px;"onclick="document.getElementById('{{ 'file'.$i }}').click();" />
                                        <input type="button" value="Eliminar" style= "position:relative; top: 1px;"onclick="borrarArchivo({{ $i }});" />
                                        <input type="text" value="0" id="{{ 'estado'.$i }}" name="{{ 'estado'.$i }}" hidden />
                                        <input type="file" name="{{ 'file'.$i }}" id="{{ 'file'.$i }}" onchange="cambiarArchivo({{ $i }});" style="display: none;"/>
                                        <?php $i++; ?>
                                    @endif
                                @endforeach

                                @error('file0')
                                <span class="text-danger"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @error('file1')
                                <span class="text-danger"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @error('file2')
                                <span class="text-danger"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group">
                                    <label class="form-control-label">Nombre del profesor</label>
                                    <input value="{{ $facilidad->nombre_profesor }}"
                                        id="nombreProfesor"
                                        type="text"
                                        class="form-control @error('nombre_profesor') is-invalid @enderror"
                                        name="nombreProfesor"
                                        required>

                                    @error('nombreProfesor')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                        @endforeach

                        <div class="form-group">
                            <label class="form-control-label">Nombre de la asignatura</label>
                            <input value="{{ $solicitud->nombre_asignatura }}"
                                id="nombreAsignatura"
                                type="text"
                                class="form-control @error('nombre_asignatura') is-invalid @enderror"
                                name="nombreAsignatura"
                                required>

                            @error('nombreAsignatura')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Detalle</label>
                            <textarea class = "form-control"  id= "detalle"name = "detalle" rows = "5">{{$solicitud->detalle}}</textarea>

                            @error('detalle')
                                <span class="invalid-feedback"
                                    role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button id = "boton0" type="submit" value = "editar"
                                    class="btn btn-outline-primary">{{ __('Editar') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button id = "boton1" type="submit" value = "anular"
                                    class="btn btn-outline-primary">{{ __('Anular') }}</button>
                            </div>
                        </div>
                        <input value="" id="action" hidden type="text" class="form-control @error('nombre_profesor') is-invalid @enderror" name="action" >
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </form>

    <script type="text/javascript">
        function borrarArchivo(i){

            document.getElementById("labelFile"+i).value = 'Eliminado';
            document.getElementById("estado"+i).value = '2';

        }
        function cambiarArchivo(i){

            var fileInput = document.getElementById('file'+i);
            var filename = fileInput.files[0].name;
            document.getElementById("labelFile"+i).value = filename;
            document.getElementById("estado"+i).value = '1';

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
        const button = document.getElementById('boton0');
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
                    document.getElementById('action').value = 'editar';
                    form.submit();
                    } else if (result.isDenied) {
                    Swal.fire('Envio cancelado', '', 'info')
                }
            })
        })

    </script>
        <script>
            const button1 = document.getElementById('boton1');
            const form1 = document.getElementById('formulario')
            button1.addEventListener('click', function(e){
                e.preventDefault();
                Swal.fire({
                    title: '¿Estas seguro que quieres anular la solicitud?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Enviar',
                    denyButtonText: `Cancelar envio`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        document.getElementById('action').value = 'anular';
                        form1.submit();
                        } else if (result.isDenied) {
                        Swal.fire('Envio cancelado', '', 'info')
                    }
                })
            })

        </script>
    @endif

@endsection
