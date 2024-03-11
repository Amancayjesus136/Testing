<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <title>Dropzone</title>
</head>
    <body>

        <form action="{{ route('alumno/evidence.store_evidence') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
            @csrf
            <input type="hidden" name="nombre_archivo[]">
        </form>
        
        <button type="button" class="btn btn-primary" id="guardar-cambios">Guardar Cambios</button>
        

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
