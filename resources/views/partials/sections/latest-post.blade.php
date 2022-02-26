@php
$latest_post_args = [
    'posts_per_page' => 1,
    'offset' => 0,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
];

$query = new WP_Query($latest_post_args);
@endphp

<section id="news" {!! post_class('container pt-3') !!}>
    <h3>News</h3>

    @while ($query->have_posts())
        @php $query->the_post() @endphp
        @php
            global $post;
            
            $photo = get_the_post_thumbnail_url();
            $alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);

            $show_id = get_field('related_show');
            $show_url = get_field('url', $show_id);
        @endphp

        <article class="row wrapper-border d-flex flex-column flex-md-row">
            <div class="col-2 mb-md-1 d-flex align-items-center">
                <small><time class="updated"
                        datetime="{{ get_post_time('c', true) }}">{{ get_the_date('m.d.y') }}</time></small>
            </div>
            <div
                class="col-12 {{ $photo ? 'col-md-7 col-lg-8 py-3 py-md-0' : 'col-md-10 pt-3 pt-md-0' }} d-flex flex-column justify-content-center">
                <header>
                    <h4 class="entry-title">{!! get_the_title() !!}</h4>
                </header>
                <div class="entry-content">
                    @php the_content() @endphp
                </div>
            </div>
            <div class="{{ $photo ? 'col-12 col-md-3 col-lg-2 d-flex align-items-center' : 'd-none' }}">
                <div class="container-fluid h-100 d-flex justify-content-center align-items-center">
                    <a href="{!! $show_url !!}" target="_blank" rel="noopener noreferrer">
                        <img src="{!! $photo !!}" alt="{!! $alt !!}" class="post-img img-fluid border border-info rounded">
                    </a>
                </div>
            </div>
        </article>
    @endwhile
</section>
