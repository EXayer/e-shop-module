<header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('front') }}">E-Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                    aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.type') }}">Tablets</a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('locale.set') }}" class="form-inline my-2 my-md-0">
                    @csrf
                    @php $lang = config('app.locale') ?? 'en'; @endphp
                    @foreach($languages as $language)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="lang"
                                   id="lang-{{ $language->id }}" value="{{ $language->code }}"
                            @if($language->code == $lang) checked @endif>
                            <label class="form-check-label text-secondary"
                                   for="lang-{{ $language->id }}">{{ $language->title }}</label>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </nav>
</header>