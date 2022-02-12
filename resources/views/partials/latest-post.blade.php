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

@while ($query->have_posts())
    @php $query->the_post() @endphp
    <article {!! post_class('container my-3') !!}>
        <h3>News</h3>
        <div class="row wrapper-border d-flex flex-column flex-md-row">
            <div class="col-2 mb-md-1">
                <small><time class="updated"
                        datetime="{{ get_post_time('c', true) }}">{{ get_the_date('m.d.y') }}</time></small>
            </div>
            <div class="col-12 col-md-10">
                <header>
                    <h4 class="entry-title">{!! get_the_title() !!}</h4>
                </header>
                <div class="entry-content">
                    @php the_content() @endphp
                </div>
            </div>
        </div>
    </article>
@endwhile
