
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotelis System Email </title>


    </head>
    <body class="antialiased font-sans">
        {{$subject}}
message:    {{$mail_message}}
    </body>
</html>
