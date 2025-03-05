<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Mettez ici vos balises meta, liens CSS, etc. communs à toutes les pages -->
</head>
<body>
    <!-- Contenu spécifique à la vue -->
    <div class="container mt-5">
        @yield('content')
    </div>
    <!-- Mettez ici vos balises de script communs à toutes les pages -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Votre script AJAX pour le filtre ici
    </script>
</body>
</html>
