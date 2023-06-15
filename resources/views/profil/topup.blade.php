<!-- resources/views/topup.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Top Up</title>
</head>
<body>
    <h2>Top Up</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('topup.process') }}">
        @csrf
        <div>
            <label for="amount">Jumlah Top Up:</label>
            <input type="number" id="amount" name="amount" min="0" step="0.01" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
