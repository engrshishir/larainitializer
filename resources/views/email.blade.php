@extends('larainitializer::layouts.app')

@section('title', 'Email Setup')

@section('content')
    <form method="POST" action="{{ route('squartup.setup.submit') }}">
        @csrf
        <input type="hidden" name="step" value="email">
        <div class="card-body">
            
            <x-input label="Mail Mailer" name="mail_mailer" type="text" placeholder="Enter mailer protocol"
            value="{{ old('mail_mailer') ?? (empty(getenv('MAIL_MAILER')) ? 'smtp' : getenv('MAIL_MAILER')) }}"
            error="{{ $errors->first('mail_mailer') }}" />

            <x-input label="Mail Host" name="mail_host" type="text" placeholder="Enter mailer host name"
                value="{{ old('mail_host') ?? (empty(getenv('MAIL_HOST')) ? 'smtp.gmail.com' : getenv('MAIL_HOST')) }}"
                error="{{ $errors->first('mail_host') }}" />

            <x-input label="Mail Port" name="mail_port" type="text" placeholder="Enter mailer port"
                value="{{ old('mail_port') ?? (empty(getenv('MAIL_PORT')) ? '465' : getenv('MAIL_PORT')) }}"
                error="{{ $errors->first('mail_port') }}" />

            <x-input label="Mail Encryption Type" name="mail_encryption" type="text" placeholder="Enter mailer encryption type"
                value="{{ old('mail_encryption') ?? (empty(getenv('MAIL_ENCRYPTION')) ? 'ssl' : getenv('MAIL_ENCRYPTION')) }}"
                error="{{ $errors->first('mail_encryption') }}" />

            <x-input label="Mail Username" name="mail_username" type="email" placeholder="Enter username"
                value="{{ old('mail_username') ?? (empty(getenv('MAIL_USERNAME')) ? 'ssl' : getenv('MAIL_USERNAME')) }}"
                error="{{ $errors->first('mail_username') }}" />


            <x-input label="Mail Password" name="mail_password" type="password" placeholder="Enter email password"
                value="{{ old('mail_password') ?? (empty(getenv('MAIL_PASSWORD')) ? 'ssl' : getenv('MAIL_PASSWORD')) }}"
                error="{{ $errors->first('mail_password') }}" />

            <x-input label="Organization Email" name="mail_from_address" type="email" placeholder="Enter Organization email"
                value="{{ old('mail_from_address') ?? (empty(getenv('mail_from_address')) ? '' : getenv('mail_from_address')) }}"
                error="{{ $errors->first('mail_from_address') }}" />

            @include('larainitializer::partials.backbtn',[
                'label'=> "Basic Setup",
                'route'=> route('squartup.setup.form', ['basic']),
            ])
            @include('larainitializer::partials.nextbtn')

        </div>
    </form>
@endsection
