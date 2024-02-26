<!-- listar_todo.blade.php -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container">
    <h2>Listado de Objetivos, Indicadores y Actividades</h2>

    <table>
        <thead>
            <tr>
                <th>Proyecto</th>
                <th>Dimensión</th>
                <th>Objetivo</th>
                <th>Indicador</th>
                <th>Actividad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objetivos as $objetivo)
                <tr>
                    <td>{{ $objetivo->proyecto }}</td>
                    <td>{{ $objetivo->dimension }}</td>
                    <td>{{ $objetivo->nombre }}</td>
                    <td></td> <!-- Celda vacía para indicador -->
                    <td></td> <!-- Celda vacía para actividad -->
                </tr>
    
                @foreach ($objetivo->indicadores as $indicador)
                    <tr>
                        <td></td> <!-- Celda vacía para objetivo -->
                        <td></td> <!-- Celda vacía para dimensión -->
                        <td></td> <!-- Celda vacía para objetivo -->
                        <td>{{ $indicador->nombre }}</td>
                        <td></td> <!-- Celda vacía para actividad -->
                    </tr>
    
                    @foreach ($indicador->actividades as $actividad)
                        <tr>
                            <td></td> <!-- Celda vacía para objetivo -->
                            <td></td> <!-- Celda vacía para dimensión -->
                            <td></td> <!-- Celda vacía para objetivo -->
                            <td></td> <!-- Celda vacía para indicador -->
                            <td>{{ $actividad->nombre }}</td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
    
</div>

<div
    class="table-responsive"
>
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">doc</th>
                <th scope="col">proyecto</th>
                <th scope="col">dimension</th>
                <th scope="col">objetivo</th>
                <th scope="col">indicador</th>
                <th scope="col">actividades</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objetivos as $objetivo)
                <tr class="">
                    <td scope="row">{{ $objetivo->id_objetivo}}</td>
                    <td>{{$objetivo->proyecto}}</td>
                    <td>{{$objetivo->dimension}}</td>
                    <td>{{$objetivo->nombre}}</td>

                    <td>
                        @foreach ($objetivo->indicadores as $indicador)
                            <span class="badge badge-soft-primary">{{ $indicador->nombre }}</span>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($objetivo->actividades as $actividad)
                            <span class="badge badge-soft-primary">{{ $actividad->nombre }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
