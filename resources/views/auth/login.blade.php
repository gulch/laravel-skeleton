@extends('auth.template', [
    'seo_title' => trans('app.authorization'),
])

@section('title')
    {{ trans('app.authorization') }}
@endsection

@section('content')

    <form class="ui warning form segment left aligned" role="form" method="POST" action="{{ route('login') }}">

        @include('auth.form-message')

        <div class="field">
            <div class="ui left icon input">
                <i class="mail icon"></i>
                <input type="text" name="email" placeholder="{{ trans('app.your_email') }}">
            </div>
        </div>

        <div class="field">
            <div class="ui left icon input">
                <i class="key icon"></i>
                <input type="password" name="password" placeholder="{{ trans('app.your_password') }}">
            </div>
        </div>

        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="remember" value="1" checked="checked">
                <label>{{ trans('app.remember_me') }}</label>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="ui fluid large submit green button">{{ trans('app.login') }}</button>
    </form>
    <div class="ui message">
        <a href="{{ route('register') }}">{{ trans('app.register') }}?</a>
        <br>
        <a href="{{ route('password.request') }}">{{ trans('app.forgot_password') }}?</a>
    </div>
@endsection
