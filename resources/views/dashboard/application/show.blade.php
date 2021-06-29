<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:site_name" content="{{ config('app.name') }}" />
        <meta property="og:type" content="article" />
        <meta property="og:article:published_time" content="{{ \Carbon\Carbon::now()->toISOString() }}" />
        <title>{{ strtoupper($campaign->title) }}</title>
        <meta property="og:title" content="{{ strtoupper($campaign->title) }}" />
        <meta name="description" content="{{ ucwords($campaign->description) }}" />
        <meta property="og:description" content="{{ ucwords($campaign->description) }}" />
        <meta property="og:url" content="{{ \Illuminate\Support\Facades\URL::current() }}" />
        <meta property="og:locale" content="en" />
        <meta property="og:locale:alternate" content="en_US" />
        <meta property="og:image" content="{{ asset('uploads\covers\' . $campaign->cover) }}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="800" />
        <meta name="twitter:site" content="{{ \App\Setting::getSetting('TWITTER_USERNAME') }}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:description" content="{{ $campaign->title }}" />
        <meta name="twitter:title" content="{{ ucwords($campaign->description) }}" />
        <meta name="twitter:image" content="{{ asset('uploads\covers\' . $campaign->cover) }}" />

        <script>
            @if($campaign->platform_id == \App\Platform::whereName('youtube')->first()->id)
            // trigger an HTTP redirect:
            window.location.replace("{{ $campaign->payload }}");
            @elseif($campaign->platform_id == \App\Platform::whereName('skiza')->first()->id)
            // trigger Tel Protocol
            window.location.href="tel:{{ $campaign->payload }}%23";
            @endif
        </script>
    </head>
</html>
