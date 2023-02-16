@php
/**
 * The template for layout component.
 *
 * This is the main layout of the travel guide. The $slot blade component
 * will render addition contents inside the layout component.
 *
 * @package Laravel
 * @author Tristan Jake Alcantara
 * @since 2023
 */
@endphp

<!DOCTYPE html>
<html>
    <head>
        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- Styles --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="mh-100">
        <div id="app">
            {{-- Include $slot component for addition contents. --}}
            {{ $slot }}
        </div>
    </body>
</html>
