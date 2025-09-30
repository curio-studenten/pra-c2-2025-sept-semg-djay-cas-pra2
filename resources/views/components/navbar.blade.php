<nav class="navbar navbar-expand navbar-dark bg-dark full-width-navbar">
    <div class="container">
        <div class="navbar-header mr-auto">
            <a class="navbar-brand" href="/" title="{{ __('misc.home_alt') }}">
                {{ __('misc.homepage_title') }}
            </a>
        </div>
        <div>
            <a href="{{route('admin.brands')}}" class="admin-link">Admin-Paneel</a>
        </div>

        <script>
            (function() {
                var cx = 'partner-pub-6236044096491918:8149652050';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
            })();
        </script>
        <gcse:searchbox-only></gcse:searchbox-only>
        <div class="language-switcher">
            <a href="{{ route(name: 'lang-switch', parameters: 'en') }}">🇬🇧 English</a> 
            <p>|</p>
            <a href="{{ route(name: 'lang-switch', parameters: 'nl') }}">🇳🇱 Nederlands</a>
        </div>
        <button id="theme-switch">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                <path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                <path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z" />
            </svg>
        </button>
    </div>
</nav>
