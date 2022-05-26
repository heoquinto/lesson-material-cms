<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LMC-CMS</title>

    </head>
    <body class="antialiased">
        <div id="app"></div>

        <script src="{{ mix('/js/main.js') }}"></script>
    </body>
</html>
