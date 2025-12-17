
@if (data_get(config('password'), 'github.client_id'))
    <div class="container bg-white">
        <div class="flex justify-center">
            <a class="gap-2 rounded-full p-2 text-sm leading-5 text-white bg-zinc-500 hover:bg-zinc-700"
            href="{{ route('socialite.redirect', ['driver' => 'github']) }}">
                <img class="inline-block" src="https://d1mj7kpaxms69g.cloudfront.net/assets/github_logo_light-5473d144f61893d30a58ba3f4fee4ece8d4b6425bb1f00d7f856b3d65d04ab9d.svg">
                {{ __('Sign in with GitHub') }}
            </a>
        </div>
    </div>
@endif

