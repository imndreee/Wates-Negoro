<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan Website</title>
</head>
<body>
    <h1>Selamat datang di layanan website!</h1>
    <a href="{{ route('pelayanan.popup') }}">Tampilkan Notifikasi Pop-up</a>

    <script>
        function showPopup() {
            alert("Langsung datang ke balai desa");
        }
    </script>
</body>
</html>
