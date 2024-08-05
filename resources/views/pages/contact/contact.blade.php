@extends('pages.website')

@section('content')

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container mt-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="bg-success" id="message" style="display: none">Votre message a été bien envoyé</p>
            <h1 class="mb-3 gros_titre">Contactez-nous</h1>
            <p>Nous sommes là pour vous aider ! Si vous avez des questions, des suggestions ou besoin d'assistance,
                n'hésitez pas à nous contacter. Notre équipe est à votre disposition pour vous offrir le meilleur
                service possible.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center bg-white rounded p-3"
                                style="border: 1px dashed rgba(0, 185, 142, .3)">
                                <div class="icon me-3" style="width: 45px; height: 45px;">
                                    <i class="fa fa-map-marker-alt text-primary"></i>
                                </div>
                                <span>9J2P+8Q Parakou</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center bg-white rounded p-3"
                                style="border: 1px dashed rgba(0, 185, 142, .3)">
                                <div class="icon me-3" style="width: 45px; height: 45px;">
                                    <i class="fa fa-envelope-open text-primary"></i>
                                </div>
                                <span>info@example.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center bg-white rounded p-3"
                                style="border: 1px dashed rgba(0, 185, 142, .3)">
                                <div class="icon me-3" style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <span>+229 66 89 65 12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Session::get('success'))
            <div class="alert alert-success py-3">{{Session::get('success')}}</div>
            @endif
            @if(Session::get('error'))
            <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
            @endif
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31494.598480290257!2d2.6023493347656106!3d9.348765956238045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10321aa2377b3707%3A0x4c8a23a3d505fa2a!2sCarrefour%20Papini!5e0!3m2!1sfr!2sbj!4v1717417278120!5m2!1sfr!2sbj"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" frameborder="0" style="min-height: 400px; border:0;"
                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <p class="mb-4">Nous nous réjouissons de recevoir vos messages et de pouvoir vous aider dans vos
                        besoins de location d'objets. Merci de nous faire confiance</p>
                        <form action="{{ route('envoyer.message') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="nam" placeholder="Your Name">
                                        <label for="nam">Votre nom</label>
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="emai" placeholder="Your Email">
                                        <label for="emai">Votre email</label>
                                    </div>
                                    @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="subject" class="form-control" id="subjec" placeholder="Subject">
                                        <label for="subjec">Suggestion</label>
                                    </div>
                                    @error('subject')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="message" class="form-control" placeholder="Leave a message here" id="user_message" style="height: 150px"></textarea>
                                        <label for="user_message">Message</label>
                                    </div>
                                    @error('message')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Envoyer message</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<script>
    (function ($) {
            $(".envoyer").click(function(){
                $("#message").show();
            setTimeout(function(){
                $("#message").hide();
            }, 3000);
            });
        })(jQuery);
</script>

@stop
