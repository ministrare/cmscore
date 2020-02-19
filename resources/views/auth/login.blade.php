@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <?= Form::input('email', __('E-mail'))
                        ->setSlug('email')
                        ->options([
                            'placeholder' => 'example@website.com',
                            'class' => 'col-md-8 offset-md-2',
                            'required'=> true,
                            'autofocus' => true,
                            'message' => isset($message) ? $message : '',
                        ])->render() ?>

                        <?= Form::input('password', __('Password'))->options([
                        'class' => 'col-md-8 offset-md-2',
                        'message' => isset($message) ? $message : '',
                        ])->render() ?>

                        <?= Form::input('check', __('Remember Me'))
                        ->setSlug('remember')
                        ->options([
                            'class' => 'col-md-8 offset-md-2',
                            'options' => [
                                'remember' => __('Remember Me'),
                            ],
                            'message' => isset($message) ? $message : '',
                        ])->render() ?>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
