@extends('larainitializer::layouts.app')

@section('title', 'Database Setup')

@section('content')
    @if (session('success') || session('error'))
        @include('larainitializer::partials.alert', [
            'type' => session('success') ? 'success' : 'danger',
            'message' => session('success') ? session('success') : session('error'),
        ])
    @endif


    <form method="POST" action="{{ route('squartup.setup.submit') }}">
        @csrf
        <input type="hidden" name="step" value="database">
        <div class="card-body">

            <!-- Database Type Selection -->
            <div class="form-group">
                <label>Select Database Type</label>
                <div>
                    <label>
                        <input type="radio" name="db_connection" value="sqlite" onchange="toggleDatabaseFields()"
                            @if (getenv('DB_CONNECTION') == 'sqlite') checked @endif>
                        SQLite
                    </label>
                    <label>
                        <input type="radio" name="db_connection" value="mysql" onchange="toggleDatabaseFields()"
                            @if (getenv('DB_CONNECTION') == 'mysql') checked @endif>
                        MySQL
                    </label>
                </div>
            </div>

            <!-- MySQL Settings (Hidden by default, shown when MySQL is selected) -->
            <div class="mysql-fields">
                <x-input label="DB Host" name="db_host" type="text" placeholder="Enter database host"
                    value="{{ old('db_host') ?? (empty(getenv('DB_HOST')) ? '127.0.0.1' : getenv('DB_HOST')) }}"
                    error="{{ $errors->first('db_host') }}" />

                <x-input label="DB Port" name="db_port" type="number" placeholder="Enter database port"
                    value="{{ old('db_port') ?? (empty(getenv('DB_PORT')) ? '3306' : getenv('DB_PORT')) }}"
                    error="{{ $errors->first('db_port') }}" />

                <x-input label="DB Username" name="db_username" type="text" placeholder="Enter database username"
                    value="{{ old('db_username') ?? (empty(getenv('DB_DATABASE')) ? 'root' : getenv('DB_DATABASE')) }}"
                    error="{{ $errors->first('db_username') }}" />

                <x-input label="DB Password" name="db_password" type="password" placeholder="Enter database password"
                    value="{{ old('db_password') ?? (empty(getenv('DB_PASSWORD')) ? '' : getenv('DB_PASSWORD')) }}"
                    error="{{ $errors->first('db_password') }}" />

                <x-input label="DB Database" name="db_database" type="text" placeholder="Enter database name"
                    value="{{ old('db_database') ?? (empty(getenv('DB_DATABASE')) ? '' : getenv('DB_DATABASE')) }}"
                    error="{{ $errors->first('db_database') }}" />
            </div>

            @include('larainitializer::partials.backbtn', [
                'label' => 'Email Setup',
                'route' => route('squartup.setup.form', ['email']),
            ])
            @include('larainitializer::partials.nextbtn',[
                'label' => 'Submit'
            ])
        </div>
    </form>
@endsection

@push('app-scripts')
    <script>
        function toggleDatabaseFields() {
            const dbConnection = document.querySelector('input[name="db_connection"]:checked').value;
            const mysqlFields = document.querySelector('.mysql-fields');

            if (dbConnection === 'mysql') {
                mysqlFields.style.display = 'block';
            } else {
                mysqlFields.style.display = 'none';
            }
        }
        document.addEventListener("DOMContentLoaded", toggleDatabaseFields);
    </script>
@endpush
