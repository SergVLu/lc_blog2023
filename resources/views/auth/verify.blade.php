@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Верифицируйте вашу почту') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Новая ссылка для верификации email была направлена на вашу почту
                        </div>
                    @endif

                    {{ __('Чтобы продолжить проверьте вашу почту и перйдите по ссылке для верификации. ') }}
                    {{ __('Если вы не получили письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите сюда для получения нового') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
