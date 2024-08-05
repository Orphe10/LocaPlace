@extends('pages.website')

@section('content')

    <div class="container my-5">
        <h1 class="text-primary mb-4 pt-5">Aide</h1>
        <div class="accordion mt-5" id="helpAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="helpHeadingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#helpCollapseOne" aria-expanded="true" aria-controls="helpCollapseOne">
                        Comment rechercher un objet ?
                    </button>
                </h2>
                <div id="helpCollapseOne" class="accordion-collapse collapse show" aria-labelledby="helpHeadingOne" data-bs-parent="#helpAccordion">
                    <div class="accordion-body">
                        Utilisez la barre de recherche en haut de la page pour entrer des mots-clés relatifs à l'objet que vous souhaitez louer. Vous pouvez aussi filtrer les résultats par catégorie, ville et libelle.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="helpHeadingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpCollapseTwo" aria-expanded="false" aria-controls="helpCollapseTwo">
                        Comment créer un compte ?
                    </button>
                </h2>
                <div id="helpCollapseTwo" class="accordion-collapse collapse" aria-labelledby="helpHeadingTwo" data-bs-parent="#helpAccordion">
                    <div class="accordion-body">
                        Cliquez sur le bouton "S'inscrire" en haut à droite de la page. Remplissez le formulaire avec vos informations personnelles et suivez les instructions pour compléter votre inscription.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="helpHeadingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpCollapseThree" aria-expanded="false" aria-controls="helpCollapseThree">
                        Comment effectuer une réservation ?
                    </button>
                </h2>
                <div id="helpCollapseThree" class="accordion-collapse collapse" aria-labelledby="helpHeadingThree" data-bs-parent="#helpAccordion">
                    <div class="accordion-body">
                        Après avoir trouvé l'objet que vous souhaitez louer, sélectionnez les dates de location et cliquez sur le bouton "Réserver". Si vous voulez, suivez les étapes pour entrer vos informations de paiement et confirmer votre réservation.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="helpHeadingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpCollapseFour" aria-expanded="false" aria-controls="helpCollapseFour">
                        Comment annuler une réservation ?
                    </button>
                </h2>
                <div id="helpCollapseFour" class="accordion-collapse collapse" aria-labelledby="helpHeadingFour" data-bs-parent="#helpAccordion">
                    <div class="accordion-body">
                        Pour annuler une réservation, allez dans votre compte, sélectionnez "Mes Réservations", et choisissez la réservation que vous souhaitez annuler. Cliquez sur le bouton "Annuler" et suivez les instructions.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="helpHeadingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpCollapseFive" aria-expanded="false" aria-controls="helpCollapseFive">
                        Comment modifier les informations de mon compte ?
                    </button>
                </h2>
                <div id="helpCollapseFive" class="accordion-collapse collapse" aria-labelledby="helpHeadingFive" data-bs-parent="#helpAccordion">
                    <div class="accordion-body">
                        Pour modifier les informations de votre compte, connectez-vous et allez dans "Mon Profil". Vous pouvez mettre à jour vos informations personnelles, adresse, et informations de paiement.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="helpHeadingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpCollapseSix" aria-expanded="false" aria-controls="helpCollapseSix">
                        Comment contacter le service client ?
                    </button>
                </h2>
                <div id="helpCollapseSix" class="accordion-collapse collapse" aria-labelledby="helpHeadingSix" data-bs-parent="#helpAccordion">
                    <div class="accordion-body">
                        Vous pouvez nous contacter par email à support@locaplace.com ou par téléphone au +  229 93 45 67 89. Notre support est disponible du lundi au vendredi, de 9h à 18h.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="helpHeadingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#helpCollapseSeven" aria-expanded="false" aria-controls="helpCollapseSeven">
                        Que faire si j'ai un problème avec un objet loué ?
                    </button>
                </h2>
                <div id="helpCollapseSeven" class="accordion-collapse collapse" aria-labelledby="helpHeadingSeven" data-bs-parent="#helpAccordion">
                    <div class="accordion-body">
                        Si vous avez un problème avec un objet loué, contactez-nous immédiatement. Nous vous aiderons à résoudre le problème et à trouver une solution.
                    </div>
                </div>
            </div>
        </div>
        <h1 class="text-primary mb-4 pt-5">FAQ</h1>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Comment puis-je louer un objet sur LocaPlace ?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Pour louer un objet, recherchez l'objet que vous souhaitez louer, sélectionnez les dates de location, et suivez les instructions pour compléter la réservation.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Quels types d'objets puis-je louer sur LocaPlace ?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Vous pouvez louer une variété d'objets, y compris des appareils électroménagers, des instruments de musique, des matériels de restauration, et des appareils de sonorisation, des parasols et pleins d'autres objets.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Comment puis-je payer ma location ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Nous acceptons les paiements par les méthodes de paiement en ligne sécurisées tels que Mtn ou Moov.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Puis-je annuler ma réservation ?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Oui, vous pouvez annuler votre réservation jusqu'à 24 heures avant la date de début de la location. Des frais d'annulation peuvent s'appliquer.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Que faire si l'objet loué est endommagé ?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Si l'objet est endommagé, des frais s'appliqueront lors de la remise de l'objet à son propriétaire ce qui permettra de résoudre le problème causé lors de la location.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        Quels sont les horaires de support client ?
                    </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Notre support client est disponible du lundi au vendredi, de 9h à 18h.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingEight">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        Y a-t-il une caution pour la location d'objets ?
                    </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Oui, une caution peut être demandée selon l'objet loué. La caution vous sera remboursée après la restitution de l'objet en bon état.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingNine">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        Puis-je prolonger la durée de ma location ?
                    </button>
                </h2>
                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Oui, vous pouvez prolonger la durée de votre location, sous réserve de disponibilité. Veuillez nous contacter pour organiser la prolongation.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                        Que se passe-t-il si je retourne l'objet en retard ?
                    </button>
                </h2>
                <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Des frais de retard peuvent s'appliquer si l'objet n'est pas retourné à temps. Veuillez nous contacter pour plus de détails.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
