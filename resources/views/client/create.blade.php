<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

    {{-- input multiple --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectize/dist/css/selectize.default.min.css" />
    
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <form action="{{ route('alumno/create.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombres</label>
                        <input type="text" name="nombre_alumno" id="" class="form-control" placeholder="Nombre de alumno" aria-describedby="helpId" />
                    </div>
                </div>
    
                <div class="col-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" name="apellido_alumno" id="" class="form-control" placeholder="Nombre de alumno" aria-describedby="helpId" />
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="tagsInput" class="form-label">Etiquetas</label>
                        <select class="form-control tags-input" name="nombre_materia[]" id="tagsInput" multiple>
                            <option value="Tag1">Tag1</option>
                            <option value="Tag2">Tag2</option>
                            <option value="Tag3">Tag3</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="tagsInput2" class="form-label">Actividades</label>
                        <input type="text" name="nombre_actividad[]" id="input-multiple">
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Subir archivos múltiples</label>
                        <input class="form-control" name="nombre_evidencia[]" type="file" id="formFileMultiple" multiple accept=".pdf, .docx, .xlsx, .pptx, .png, .jpg, .jpeg">
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-sm">Registrar</button>
                </div>
            </div>
        </form>
    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- input multiple --}}
    <script src="https://cdn.jsdelivr.net/npm/selectize/dist/js/standalone/selectize.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.tags-input').select2({
                tags: true,
                tokenSeparators: [','],
            });

            $('#input-multiple').selectize({
                plugins: ['remove_button'],
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    };
                }
            });
        });
    </script>

</body>
</html>
