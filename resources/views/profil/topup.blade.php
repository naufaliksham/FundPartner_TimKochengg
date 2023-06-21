<!-- resources/views/topup.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Top Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
            <strong><h1 class="text-center text-5xl py-5">Halaman Top Up</h1></strong>
            <form method="POST" action="{{ route('topup.process') }}">
                @csrf
                @if (session('success'))
                <center><div style="color: green;">{{ session('success') }}</div></center>
                @endif
                <div class="flex flex-col p-2 text-xl">
                    <label for="amount" class="text-center p-2">Jumlah Top Up</label>
                    <input type="number" id="amount" name="amount" min="0" step="0.01" class="text-center block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" Masukan saldo" required>
                </div>
                <center>
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">
                        Submit
                    </button>
                    <a href="{{ route('profile.index') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">
                        Kembali
                    </a>
                </center>
            </form>
        </div>
    </div>
</body>
</html>
