@extends('auth.template', [
    'seo_title' => trans('app.change_password'),
])

@section('title')
    {{ trans('app.change_password') }}
@endsection

@section('content')
    <form method="POST" action="{{ route('password.reset') }}" class="ui warning form segment left aligned">
        {{ csrf_field() }}

        @include('auth.form-message')

        <div class="field">
            <div class="ui left icon input">
                <i class="mail icon"></i>
                <input type="text" name="email" placeholder="{{ trans('app.your_email') }}" value="{{ old('email') }}">
            </div>
        </div>

        <div class="field">
            <div class="ui left icon input">
                <i class="key icon"></i>
                <input name="password" placeholder="{{ trans('app.your_password') }}" autocomplete="off" type="password">
            </div>
        </div>

        <div class="field">
            <div class="ui left icon input">
                <i class="key icon"></i>
                <input name="password_confirmation" autocomplete="off" placeholder="{{ trans('app.your_password_again') }}" type="password">
            </div>
        </div>

        <button class="ui submit primary button">{{ trans('app.do_change') }}</button>
    </form>
@endsection

