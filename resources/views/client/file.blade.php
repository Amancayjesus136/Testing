<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dropzone</title>
</head>
<body>

    <style>
        .cliente {
            position: absolute;
            margin-top: -100px;
            margin-left: -23px; 
        }

        .container {
            position: relative;
        }
    </style>

    <div class="container mt-5">
        <form action="{{ route('alumno/evidence.store_evidence') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
            @csrf
            <input type="hidden" name="nombre_archivo[]">
            <div class="row">
                <div class="col-12">
                    <div class="cliente col-11">
                        <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                        <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" placeholder="Nombre del Cliente">
                    </div>
                </div>
            </div>
        </form>

        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" id="guardar-cambios">Guardar Cambios</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        document.getElementById('guardar-cambios').addEventListener('click', (event) => {
            event.preventDefault(); 
            document.getElementById('my-dropzone').submit(); 
        });

        Dropzone.options.myDropzone = {
            url: "{{ route('alumno/evidence.store_evidence') }}", 
            method: "POST", 
            paramName: "nombre_archivo[]",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}" 
            },
            dictDefaultMessage: "Arrastre una imagen",
            acceptedFiles: "image/*",
            maxFilesize: 2,
            maxFiles: 4,  
            success: function (file, response) {

            },
            error: function (file, response) {
                
            }
        };
    </script>
</body>
</html>
