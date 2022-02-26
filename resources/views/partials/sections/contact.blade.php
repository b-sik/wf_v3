@php
$home = get_page_by_title('home');
$socials = get_field('social_media', $home->ID);

$contact = get_page_by_title('contact');
$email = get_field('email', $contact->ID);
$email_exploded = explode('@', $email);
@endphp

<section id="contact" class="container contact-wrapper">
    <h3 class="text-center">{{ __('Contact', 'westferry') }}</h3>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <a class="text-center btn btn-primary" href="mailto:{{ $email }}">
                <span class="d-inline-block h1">{{ $email_exploded[0] }}</span><span
                    class="d-inline-block h1">&commat;{{ $email_exploded[1] }}</span>
            </a>
        </div>
    </div>
</section>
