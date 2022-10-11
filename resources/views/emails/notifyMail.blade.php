@component('mail::message')
# Bonjour Monsieur / Madame {{ $responsable->name }},

## Un dépot de rapport d'audit externe vient d'être effectué par {{ Auth::user()->name }} pour l'entreprise {{ getConsommateurNom($rapport->consommateur_id) }}
## Veuillez vous connecter pour le consulter

@component('mail::button', ['url' => route("rapports.show", $rapport->id)])
Consulter le rapport d'audit
@endcomponent

Merci,<br>
{{ config('app.name') }}
## <span style="color: green"> Agence Nationale des Energies Renouvelables et de l'Efficacité Energétique </span>
@endcomponent
