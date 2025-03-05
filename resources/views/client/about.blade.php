@section('titre', 'About us')

@extends('client.master')

@section('content')

    <style>
        /* Ajoutez vos styles personnalisés ici */
        /* Exemple de style pour le contenu de la page */
        .about-content {
            margin: 50px;
        }
    </style>

    <!-- Contenu de la page -->
    <div class="container about-content">
        <h1 class="text-center my-4">À Propos de Notre Boutique de Fitness</h1>
        <p>Nous sommes passionnés par le fitness et le bien-être, et notre mission est de vous fournir des vêtements, des
            compléments et des équipements de haute qualité pour vous aider à atteindre vos objectifs de forme physique.</p>

        <h2 class="mt-5">Notre Histoire</h2>
        <p>Fitness Shop a été fondée par une équipe de dévelopment avec une vision claire pour porter une dominance sur le marche internationale,tout est debut lors d'une descussion dans une salle de sport</p>

        <h2 class="mt-5">Notre Engagement</h2>
        <ul>
            <li><strong>Des Vêtements de Fitness de Haute Qualité</strong> : Nous sélectionnons des vêtements qui allient
                style et fonctionnalité...</li>
            <li><strong>Des Compléments Nutritionnels Fiables</strong> : Notre gamme de compléments est soigneusement
                choisie...</li>
            <li><strong>Des Équipements de Fitness Innovants</strong> : Que vous soyez un débutant ou un athlète
                chevronné...</li>
        </ul>

        <h2 class="mt-5">Notre Équipe</h2>
        <p>L'équipe de Fitness Shop est composée de passionnés de fitness et de professionnels dévoués...</p>

        <h2 class="mt-5">Contactez-nous</h2>
        <p>Si vous avez des questions, des commentaires ou des suggestions, n'hésitez pas à nous contacter...</p>
    </div>


@endsection
