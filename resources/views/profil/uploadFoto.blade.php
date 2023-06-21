<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto - Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
            <form method="POST" action="{{ route('upload.process') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <h2 class="text-5xl font-bold mb-5 text-center">Upload Foto Diri Anda</h2>
                    <label for="foto" class="cursor-pointer">
                        <div class="relative bg-gray-100 px-4 py-8 rounded-md">
                            <div id="dropArea" class="flex items-center justify-center h-32 border-dashed border-2 border-gray-300">
                                <div class="text-gray-400" style="font-size:24px;background-color: #d7d7d7;border-radius: 5px;padding: 0 5px;">Pilih <i class="fas fa-image"></i></div>
                            </div>
                            <span class="block mt-2 text-sm text-gray-500 text-center">Pilih foto anda sekarang <br> Seret dan lepaskan di area ini</span>
                            <input type="file" id="foto" name="foto" onchange="previewImage(event, 'fotoPreview')" class="hidden">
                        </div>
                    </label>
                </div>
                <div class="my-2 text-center">
                    <img id="fotoPreview" src="#" alt="Pratinjau Foto" class="mx-auto" style="display: none;">
                </div>
                @if (session('success'))
                    <div class="text-center text-green-500">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="text-center text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <center>
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">
                        Upload Foto
                    </button>
                    <a href="{{ route('profile.index') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">
                        Kembali
                    </a>
                </center>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event, previewId) {
            var reader = new FileReader();
            reader.onload = function() {
                var previewElement = document.getElementById(previewId);
                previewElement.style.display = 'block';
                previewElement.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Fungsi untuk menangani drop foto
        function handleDrop(event) {
            event.preventDefault();
            var files = event.dataTransfer.files;
            var fotoInput = document.getElementById('foto');
            fotoInput.files = files;
            previewImage(event, 'fotoPreview');
        }

        // Fungsi untuk mencegah perilaku default saat foto ditarik dan dijatuhkan di luar area drop
        function handleDragOver(event) {
            event.preventDefault();
        }

        var dropArea = document.getElementById('dropArea');
        dropArea.addEventListener('dragover', handleDragOver);
        dropArea.addEventListener('drop', handleDrop);
        
    </script>
</body>
</html>
