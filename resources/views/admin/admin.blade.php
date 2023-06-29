<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Administration</title>
</head>
<body>
<div class="container mt-5">

    @if(session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show text-center d-flex align-items-center justify-content-between" role="alert">
            <span style="flex-grow: 1; text-align: center;">{{ session('success') }}</span>
            <p id="close-success" type="button" class="m-0">
                <i class="fa-solid fa-xmark"></i>
            </p>
        </div>
    @endif

    @yield('content')
        <script>
            if (document.getElementById('close-success')) {
                document.getElementById('close-success').addEventListener('click', function() {
                    document.getElementById('success-alert').remove();
                });
            }
        </script>
</div>
</body>
</html>
