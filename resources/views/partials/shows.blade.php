@php
$today = date('Ymd');
$shows_args = [
    'post_type' => 'show',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'meta_query' => [
        [
            'key' => 'show_date',
            'compare' => '>=',
            'value' => $today,
        ],
    ],
    'meta_key' => 'show_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
];

$query = new WP_Query($shows_args);
@endphp

<section id="shows" class="container shows-wrapper">
    <h3>Shows</h3>

    @while ($query->have_posts())
        @php $query->the_post() @endphp
        @php
            $fields = get_fields();
            $show = $fields['show'];

            $city = $show['city'];
            $venue = $show['venue'];
            $date = date('m.d.y', strtotime($show['date']));
            $support = $show['support'];
            $url = $show['url'];
        @endphp

        <div class="container show-wrapper wrapper-border-show">
            <div class="row">
                <div class="col-4 d-none d-sm-flex flex-column justify-content-center">
                    <span class="date_time pb-1">{{ $date }}</span>
                    <span class="city pt-1">{{ $city }}</span>
                </div>
                <div class="col-6 pl-md-5 d-none d-sm-flex flex-column justify-content-center">
                    <span class="venue pb-1">{{ $venue }}</span>
                    <span class="support pt-1">w/&nbsp;{{ $support }}</span>
                </div>
                <div class="col-8 d-flex d-sm-none flex-column align-items-start justify-content-center">
                    <span class="date_time">{{ $date }}</span>
                    <span class="city">{{ $city }}</span>
                    <span class="venue">{{ $venue }}</span>
                    <span class="support">w/&nbsp;{{ $support }}</span>
                </div>
                <div class="col-4 col-lg-2 d-flex flex-column justify-content-center align-items-end">
                    <a class="event btn btn-primary text-uppercase" href='{{ $url }}' target="_blank"
                        rel='noopener noreferrer'>Event</a>
                </div>
            </div>
        </div>
    @endwhile
</section>
