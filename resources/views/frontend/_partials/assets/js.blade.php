{{-- JQUERY --}}
<script defer src="{{ app_asset('jqr.js') }}"></script>

{{-- GENERAL FRONTEND JS --}}
<script defer src="{{ app_asset('f.js') }}"></script>

@if(isset($scripts))
    @foreach($scripts as $js)
        @if(is_array($js))
            <script {{ $js['load'] }} src="{{ $js['src'] }}"></script>
        @else
            <script src="{{ $js }}"></script>
        @endif
    @endforeach
@endif