<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Your Page Title</title>
</head>

<body>

    <div class="container">
        <h2 class="my-4">Crear Nuevos Objetivos</h2>
        <form action="{{ route('guardar_todo') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="proyecto" class="form-label">Nombre del Proyecto: <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="proyecto" id="proyecto"
                        placeholder="Nombre del proyecto..." value="{{ old('proyectos') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="dimension" class="form-label">Dimension <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="dimension" id="dimension"
                        placeholder="Nombre del proyecto..." value="{{ old('dimension') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <div id="accordion">
                        <!-- Accordion starts here -->
                        <div class="accordion-item" id="objetivo1">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Objetivo 1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <label for="objetivos[1][nombre]">Nombre del Objetivo:</label>
                                    <input type="text" name="objetivos[1][nombre]" required>

                                    <div id="indicadores-container_1">
                                        <!-- Contenedor para agregar dinámicamente indicadores y actividades -->
                                    </div>

                                    <button type="button" onclick="agregarIndicador(1)">Agregar Indicador</button>
                                </div>
                            </div>
                        </div>
                        <!-- Accordion item ends -->

                        <!-- Add more accordion items dynamically as needed for each objective -->
                    </div>
                    <!-- Accordion ends here -->
                </div>
            </div>

            <button type="button" class="btn btn-primary" onclick="agregarObjetivo()">Agregar Objetivo</button>
            <button type="submit" class="btn btn-success">Guardar Todo</button>
        </form>
    </div>

    <script>
        let objetivoCount = 1;

        function agregarObjetivo() {
            objetivoCount++;

            const accordion = document.getElementById('accordion');

            const div = document.createElement('div');
            div.className = "accordion-item";
            div.id = `objetivo${objetivoCount}`;
            div.innerHTML = `
                <h2 class="accordion-header" id="heading${objetivoCount}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${objetivoCount}"
                        aria-expanded="true" aria-controls="collapse${objetivoCount}">
                        Objetivo ${objetivoCount}
                    </button>
                </h2>
                <div id="collapse${objetivoCount}" class="accordion-collapse collapse show" aria-labelledby="heading${objetivoCount}"
                    data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <label for="objetivos[${objetivoCount}][nombre]">Nombre del Objetivo:</label>
                        <input type="text" name="objetivos[${objetivoCount}][nombre]" required>

                        <div id="indicadores-container_${objetivoCount}">
                            <!-- Contenedor para agregar dinámicamente indicadores y actividades -->
                        </div>

                        <button type="button" onclick="agregarIndicador(${objetivoCount})">Agregar Indicador</button>
                    </div>
                </div>
            `;

            accordion.appendChild(div);
        }

        function agregarIndicador(objetivo) {
            const indicadoresContainer = document.getElementById(`indicadores-container_${objetivo}`);
            const indicadorCount = indicadoresContainer.children.length + 1;

            const div = document.createElement('div');
            div.innerHTML = `
                <h4>Indicador ${indicadorCount}</h4>
                <label for="objetivos[${objetivo}][indicadores][${indicadorCount}][nombre]">Nombre del Indicador:</label>
                <input type="text" name="objetivos[${objetivo}][indicadores][${indicadorCount}][nombre]" required>

                <div id="actividades-container_${objetivo}_${indicadorCount}">
                    <!-- Contenedor para agregar dinámicamente actividades -->
                </div>

                <button type="button" onclick="agregarActividad(${objetivo},${indicadorCount})">Agregar Actividad</button>
            `;

            indicadoresContainer.appendChild(div);
        }

        function agregarActividad(objetivo, indicador) {
            const actividadesContainer = document.getElementById(`actividades-container_${objetivo}_${indicador}`);
            const actividadCount = actividadesContainer.children.length + 1;

            const div = document.createElement('div');
            div.innerHTML = `
                <label for="objetivos[${objetivo}][indicadores][${indicador}][actividades][${actividadCount}][nombre]">Nombre de la Actividad:</label>
                <input type="text" name="objetivos[${objetivo}][indicadores][${indicador}][actividades][${actividadCount}][nombre]" required>
            `;

            actividadesContainer.appendChild(div);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
