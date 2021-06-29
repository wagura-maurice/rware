<!DOCTYPE html>
<html lang="{!! str_replace('_', '-', app()->getLocale()) !!}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{!! strtoupper($campaign->title) !!}</title>
        <meta name="description" content="{!! ucwords($campaign->description) !!}" />
        <meta name="twitter:site" content="{!! \App\Models\Setting::getSetting('TWITTER_USERNAME') !!}" />
        <meta name="keywords" content="{!! ucwords($campaign->description) !!}">
        <meta name="msapplication-TileColor" content="#ffc40d">
        <meta name="theme-color" content="#ffffff">
        <meta name="google-site-verification" content="{!! \App\Models\Setting::getSetting('GOOGLE_SITE_VERIFICATION') !!}" />
        <meta property="og:site_name" content="{!! config('app.name') !!}" />
        <meta property="og:type" content="article" />
        <meta property="og:article:published_time" content="{!! \Carbon\Carbon::now()->toISOString() !!}" />
        <meta property="og:title" content="{!! strtoupper($campaign->title) !!}" />
        <meta property="og:description" content="{!! ucwords($campaign->description) !!}" />
        <meta property="og:url" content="{!! \Illuminate\Support\Facades\URL::current() !!}" />
        <meta property="og:locale" content="en" />
        <meta property="og:locale:alternate" content="en_US" />
        <meta property="og:image" content="{!! asset('storage/uploads/images/campaigns/' . $campaign->cover) !!}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="800" />
        <meta name="twitter:title" content="{!! strtoupper($campaign->title) !!}" />
        <meta name="twitter:text:title" content="{!! ucwords($campaign->description) !!}" />
        <meta name="twitter:description" content="{!! ucwords($campaign->description) !!}" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:image" content="{!! asset('storage/uploads/images/campaigns/' . $campaign->cover) !!}" />
        <meta name="twitter:domain" content="{!! \App\Models\Setting::getSetting('TWITTER_DOMAIN') !!}" />
        <script>
            @if($campaign->platform_id == \App\Models\Platform::whereName('youtube')->first()->id)
            // trigger an HTTP redirect:
            window.location.replace("{!! $campaign->payload !!}");
            @elseif($campaign->platform_id == \App\Models\Platform::whereName('skiza')->first()->id)
            // trigger Tel Protocol
            window.location.href="tel:{!! substr_replace($campaign->payload, "", -1) !!}%23";
            @endif
        </script>
    </head>
</html>
