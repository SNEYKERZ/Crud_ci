<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso a Cámara en Vivo</title>
    <style>
        video {
            width: 50%;
            height: auto;
            border: 2px solid #333;
        }
        #startBtn {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        #stopBtn {
            padding: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Video en Vivo desde la Cámara</h1>
    <video id="video" autoplay></video>
    <br>
    <button id="startBtn">Iniciar Cámara</button>
    <button id="stopBtn" disabled>Detener Cámara</button>

    <script>
        const startBtn = document.getElementById('startBtn');
        const stopBtn = document.getElementById('stopBtn');
        const video = document.getElementById('video');
        let mediaStream;

        // Función para iniciar el acceso a la cámara
        function startMedia() {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    mediaStream = stream;
                    video.srcObject = stream; // Muestra el video en el elemento <video>
                    startBtn.disabled = true;
                    stopBtn.disabled = false;
                })
                .catch(err => {
                    console.error("Error al acceder a la cámara:", err);
                    alert("No se pudo acceder a la cámara.");
                });
        }

        // Función para detener la cámara
        function stopMedia() {
            const tracks = mediaStream.getTracks();
            tracks.forEach(track => track.stop()); // Detiene los tracks de video
            video.srcObject = null;
            startBtn.disabled = false;
            stopBtn.disabled = true;
        }

        startBtn.addEventListener('click', startMedia);
        stopBtn.addEventListener('click', stopMedia);
    </script>
</body>
</html>
