<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <label for="formFileMultiple" class="form-label">Subir archivos múltiples</label>
                        <input class="form-control" name="nombre_materia[]" type="file" id="formFileMultiple" multiple accept=".pdf, .docx, .xlsx, .pptx, .png, .jpg, .jpeg">
                    </div>
                </div>

                {{-- <div class="col-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Materia</label>
                        <select name="nombre_materia[]" id="materias" multiple>
                            @foreach ($users as $user)
                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-sm">Registrar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        new MultiSelectTag('materias') 
    </script>
</body>
</html>