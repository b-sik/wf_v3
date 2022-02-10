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
    <article {!! post_class('wrapper-border') !!}>
        <header>
            <h4 class="entry-title">{!! get_the_title() !!}</h4>
        </header>
        <div class="entry-content">
            @php the_content() @endphp
            <small>Posted on <time class="updated"
                    datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time></small>
        </div>
    </article>
@endwhile
