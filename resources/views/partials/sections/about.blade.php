@php
$page = get_page_by_title('About');
@endphp

<section id="about" class="container about-wrapper">
    <h3>{{ __('About', 'westferry') }}</h3>

    <div class="row justify-content-center">
        <div class="col-12">
            {!! apply_filters('the_content', $page->post_content) !!}
        </div>
    </div>
</section>
