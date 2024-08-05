<x-mail::message>
# Confirmation de paiement

Cher(e) Agence,

Nous vous informons que le paiement pour l'article ci-dessous a été effectué avec succès.

## Détails de l'article

- **ID de l'article**: {{ $article->id }}
- **Titre**: {{ $article->libelle }}
- **Prix**: {{ $article->price }} FCFA

@component('mail::button', ['url' => route('AgenceDashboard'), 'color' => 'blue'])
Retourner au tableau de bord
@endcomponent

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
