@if (data_get(config('services'), 'github.client_id'))
    <div class="container bg-white">
        <div class="flex justify-center">
            <a class="{{ config('socialite.css.button') }}"
                href="{{ route('socialite.redirect', ['driver' => 'github']) }}">
                <img class="{{ config('socialite.css.img') }}" src="{{ config('socialite.img') }}">
                {{ __(config('socialite.text')) }}
            </a>
        </div>
    </div>
@endif
