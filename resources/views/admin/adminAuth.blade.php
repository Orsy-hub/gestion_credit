<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Page de Connexion</h2>

    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('adminAuth') }}" method="POST">
        @csrf
        <label>Nom d'utilisateur :</label>
        <input type="text" name="username" required>
        
        <label>Mot de passe :</label>
        <input type="password" name="password" required>
        
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
