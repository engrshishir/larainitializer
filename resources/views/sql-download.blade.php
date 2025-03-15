@extends('larainitializer::layouts.app')

@section('content')
    <div class="alert alert-info">
        <h5 class="font-weight-bold">Choose your preferred option:</h5>
        <ul>
            <li><strong>Testing Data:</strong> Import the SQL file that contains some test data to get started right
                away.</li>
            <li><strong>Fresh Setup:</strong> Import the clean SQL file which contains only the admin users and required
                settings.</li>
        </ul>
        <p>Once you’ve chosen the file you’d like to use, follow these steps:</p>
        <ol>
            <li>Open phpMyAdmin and select your database.</li>
            <li>Import one of the SQL files from the options below.</li>
            <li>You're all set! Explore our super beautiful and fastest {{ getenv('APP_NAME') }} system.</li>
        </ol>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a href="https://github.com/Squartup/matrimonial-v2.git" class="btn btn-primary btn-lg mx-3" target="_blank">Testing Data SQL &nbsp; <i class="fa-solid fa-file-arrow-down"></i></a>
        <a href="https://github.com/Squartup/matrimonial-v2.git" class="btn btn-secondary btn-lg mx-3" target="_blank">Fresh SQL&nbsp; <i class="fa-solid fa-file-arrow-down"></i></a>
    </div>
@endsection
