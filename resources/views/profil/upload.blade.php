<!DOCTYPE html>
<html>
<head>
    <title>Upload KTP dan Foto</title>
</head>
<body>
    <h2>Upload KTP dan Foto</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('upload.process') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="ktp">KTP:</label>
            <input type="file" id="ktp" name="ktp">
        </div>
        <div>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto">
        </div>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
