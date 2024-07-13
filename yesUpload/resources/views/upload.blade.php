<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
    <style>
        #progress-bar {
            width: 0;
            height: 20px;
            background: green;
        }
    </style>
</head>
<body>
    <h2>Upload de Arquivos</h2>
    <form id="upload-form" method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="file" required>
        <br>
        <button type="submit">Enviar</button>
    </form>
    <div id="progress-bar"></div>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <script>
        document.getElementById('upload-form').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', this.action, true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

            xhr.upload.addEventListener('progress', function(event) {
                if (event.lengthComputable) {
                    let percentComplete = (event.loaded / event.total) * 100;
                    document.getElementById('progress-bar').style.width = percentComplete + '%';
                }
            });

            xhr.addEventListener('load', function() {
                if (xhr.status === 200) {
                    alert('Arquivo enviado com sucesso!');
                    document.getElementById('progress-bar').style.width = '0%';
                } else {
                    alert('Falha no upload do arquivo!');
                }
            });

            xhr.send(formData);
        });
    </script>
</body>
</html>
