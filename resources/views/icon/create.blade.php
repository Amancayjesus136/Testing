<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario Dinámico</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <form id="miFormulario" method="POST" action="{{ route('icono.registro') }}">
        @csrf <!-- Agrega el token CSRF -->
        <div class="mb-3">
            <label for="campo1" class="form-label">Titulo</label>
            <input type="text" id="campo1" name="titulo_principal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="campo2" class="form-label">Descripcion</label>
            <input type="text" id="campo2" name="descripcion_principal" class="form-control" required>
        </div>
        <div class="mb-3" id="iconos">
            <!-- Campos de iconos dinámicos se agregarán aquí -->
        </div>
        <div class="mb-3">
            <button type="button" id="agregarCampo" class="btn btn-primary">Agregar campos</button>
            <button type="button" class="btn btn-danger eliminarCampo">Eliminar campos</button>
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</div> <br><br><br>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Iconos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($iconosPrincipales as $iconoPrincipal)
                <tr>
                    <td>{{ $iconoPrincipal->id_icono_principal }}</td>
                    <td>{{ $iconoPrincipal->titulo_principal }}</td>
                    <td>{{ $iconoPrincipal->descripcion_principal }}</td>
                    <td>
                        <ul>
                            @foreach ($iconoPrincipal->iconos as $icono)
                                <li>{{ $icono->icono }} - {{ $icono->titulo_icono }}- {{ $icono->descripcion_icono }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary">Ver</a>
                        <!-- Aquí podrías agregar botones para editar o eliminar -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
    document.getElementById('agregarCampo').addEventListener('click', function() {
        var formulario = document.getElementById('miFormulario');
        var divCampos = document.createElement('div');
        divCampos.classList.add('row', 'mb-3', 'campo-dinamico');
        divCampos.innerHTML = `
            <div class="col-4">
                <label class="form-label">Icono</label>
                <input type="text" name="icono[]" class="form-control" required>
            </div>
            <div class="col-4">
                <label class="form-label">Titulo</label>
                <input type="text" name="titulo_icono[]" class="form-control" required>
            </div>
            <div class="col-4">
                <label class="form-label">Descripcion</label>
                <input type="text" name="descripcion_icono[]" class="form-control" required>
            </div>
        `;
        formulario.insertBefore(divCampos, formulario.lastElementChild);
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('eliminarCampo')) {
            var camposDinamicos = document.getElementsByClassName('campo-dinamico');
            if (camposDinamicos.length > 0) {
                camposDinamicos[camposDinamicos.length - 1].remove();
            }
        }
    });
</script>

</body>
</html>
