<!-- listar_todo.blade.php -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
            @foreach ($projects as $project)
                <tr class="">
                    <td scope="row">{{ $project->id_objetivo}}</td>
                    <td>{{$project->titulo}}</td>
                    <td>{{$project->dimension}}</td>
                    <td>
                        @foreach ($project->objetivos as $objetivo)
                            <span class="badge badge-soft-primary">{{ $objetivo->nombre }}</span>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($project->indicadores as $indicador)
                            <span class="badge badge-soft-primary">{{ $indicador->nombre }}</span>
                        @endforeach
                    </td>

                    <td>
                        @foreach ($project->actividades as $actividad)
                            <span class="badge badge-soft-primary">{{ $actividad->nombre }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
