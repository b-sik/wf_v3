@php
$shows_args = [
    'posts_per_page' => -1,
    'offset' => 0,
    'meta_key' => 'show_$_date_time',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'post_type' => 'show',
    'post_status' => 'publish',
];

$query = new WP_Query($shows_args);
@endphp

<div class="container shows-wrapper">
    <h3>Shows</h3>

    @while ($query->have_posts())
        @php $query->the_post() @endphp
        @php
            $fields = get_fields();
            $show = $fields['show'];

            $city = $show['city'];
            $venue = $show['venue'];
            $date_time = $show['date_time'];
            $support = $show['support'];
            $url = $show['url'];
        @endphp

        <div class="container show-wrapper wrapper-border-show">
            <div class="row">
                <div class="col-4 d-flex flex-column justify-content-center">
                    <span class="date_time pb-1">{{ $date_time }}</span>
                    <span class="city pt-1">{{ $city }}</span>
                </div>
                <div class="col-4 pl-5 d-flex flex-column justify-content-center">
                    <span class="venue pb-1">{{ $venue }}</span>
                    <span class="support pt-1">{{ $support }}</span>
                </div>
                <div class="col-4 d-flex flex-column justify-content-center align-items-end">
                    <a class="event btn btn-primary" href='{{ $url }}' target="_blank"
                        rel='noopener noreferrer'>Event</a>
                </div>
            </div>
        </div>
    @endwhile
</div>
