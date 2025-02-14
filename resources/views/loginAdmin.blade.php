<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div>
        <form action="" method="get">
            @csrf
            <div>
                <label for="nom" class="block"></label>
                <input type="text" name="nom" id="">
            </div>
            <div>
                <label for="password" class="block"></label>
                <input type="password" name="password" id="">
            </div>
            <button class=" px-4 py-2 rounded-lg">Connexion</button>
        </form>
    </div>
</body>
</html>