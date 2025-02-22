<!-- View pada resources/views/hello.blade.php -->
<html>
<body>
    {{-- {{ }} digunakan sebagai blade echo statement untuk mencetak data ke dalam tampilan HTML secara aman. --}}
    <h1>Hello, {{ $name }}</h1>
    <h1>You are {{ $occupation }}</h1>
</body>
</html>
