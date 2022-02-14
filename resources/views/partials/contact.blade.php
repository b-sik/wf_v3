@php
$home = get_page_by_title('home');
$socials = get_field('social_media', $home->ID);

$contact = get_page_by_title('contact');
$email = explode('@', get_field('email', $contact->ID));
@endphp

<section id="contact" class="container contact-wrapper my-5">
    <h3 class="text-center">Contact</h3>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <a class="text-center btn btn-primary" href="mailto:westferrymusic@gmail.com">
                <span class="d-inline-block h1">{{ $email[0] }}</span><span
                    class="d-inline-block h1">&commat;{{ $email[1] }}</span>
            </a>
        </div>
    </div>
</section>
