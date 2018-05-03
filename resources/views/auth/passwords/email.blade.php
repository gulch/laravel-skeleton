@extends('auth.template', [
    'seo_title' => trans('app.password_recovery'),
])

@section('title')
    {{ trans('app.password_recovery') }}
@endsection

@section('content')
    @if (session('status'))
        <div class="ui warning message">
            <i class="close icon"></i>
            <div class="header">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="ui warning form segment">
        {{ csrf_field() }}

        @include('auth.form-message')

        <div class="field">
            <div class="ui left icon input">
                <i class="mail icon"></i>
                <input type="text" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <button class="ui submit primary button">{{ trans('app.do_recovery') }}</button>
    </form>
@endsection
