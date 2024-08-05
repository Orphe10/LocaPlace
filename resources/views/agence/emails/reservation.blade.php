<x-mail::message>
    # Confirmation de Réservation

    Bonjour {{ $reservation->user->name }},

    Merci pour votre réservation. Veuillez confirmer votre réservation en regardant si l'article vous convient.

    Si vous ne confirmez pas votre réservation dans les 48 heures, elle sera automatiquement annulée par le proprétaire
    de l'article.

    Merci,
    {{ config('app.name') }}
</x-mail::message>
