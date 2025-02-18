<footer class="footer border-t">
    <div class="footer-content wrapper flex flex-col-reverse md:flex-row md:justify-between items-center gap-4 py-6 box-border">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/sq1-logo.svg') }}" class="img-logo" alt="{{ config('app.name') }}" width="90" height="28" />
        </a>
        <nav class="footer-nav flex justify-center md:justify-end items-center gap-y-2 gap-x-4 md:gap-4 flex-wrap">
            @foreach(['support center', 'invoicing', 'contract', 'careers', 'blog', 'faq'] as $item)
                <a href="#" class="nav-item capitalize text-black hover:text-primary opacity-70 hover:opacity-100 transition-all duration-150">
                    {{ __($item) }}
                </a>
            @endforeach
        </nav>
    </div>
</footer>
