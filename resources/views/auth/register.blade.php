@extends('auth.template', [
    'seo_title' => trans('app.registration'),
])

@section('title')
    {{ trans('app.registration') }}
@endsection

@section('content')

    <form class="ui warning form segment left aligned"
          role="form"
          method="POST"
          action="{{ route('register') }}"
          autocomplete="off"
    >

        @include('auth.form-message')

        <div class="field">
            <label>{{ trans('app.name') }}</label>
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="name" required placeholder="{{ trans('app.your_name') }}" value="{{ old('name') }}">
            </div>
        </div>

        <div class="field">
            <label>Email</label>
            <div class="ui left icon input">
                <i class="mail icon"></i>
                <input type="text" name="email" required placeholder="{{ trans('app.your_email') }}" value="{{ old('email') }}">
            </div>
        </div>

        <div class="field">
            <label>{{ trans('app.password') }}</label>
            <div class="ui action left icon input">
                <i class="key icon"></i>
                <input name="password" required autocomplete="off" type="password" placeholder="{{ trans('app.your_password') }}">
                <a class="ui icon button show-pwd-btn">
                    <i class="eye icon"></i>
                </a>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <button type="submit" class="ui fluid large submit green button">{{ trans('app.register') }}</button>
    </form>

    <div class="ui message">
        <a href="{{ route('login') }}">{{ trans('app.login') }}?</a>
    </div>
@endsection
