<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Historia logowań do systemu</title>
    </head>
<style>
    body{
        font-family: "dejavu sans";
    }

    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 11px;
    }

    th, td{
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    h3{
        text-align: center;
    }

    .info{
        font-size: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .page-break {
        page-break-after: always;
    }
</style>
<body>
    <h3>Historia logowań do systemu</h3>
    <div class="info">
        <strong>Dokument wygenerowano:</strong>
        <br>
        przez: {{ Auth::user()->name }} | {{ Auth::user()->email }}
        <br>
        dnia: {{ \Carbon\Carbon::now() }}
    </div>
    @foreach($users as $user)
    <div class="info">
        Użytkownik: {{ $user->name }}
        <br>
        Rola użytkownika:
        @foreach($user->roles as $role)
            {{ $role->name }}
        @endforeach   
        <br>
        E-mail: {{ $user->email }}
        <br>
        Użytkownik od: {{ $user->created_at }}
    </div>
    <table class="table">
        <caption>{{ $user->name }}</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Data logowania</th>
                <th>HTTP User agent</th>
                <th>Adres IP</th>
            </tr>
        </thead>
        <tbody>
            @forelse($user->loginlogs as $log)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $log->last_login }}</td>
                <td>{{ $log->user_agent }}</td>
                <td>{{ $log->ip_address }}</td>
                </tr>
            @empty
                <tr>
                <td>Brak danych</td>
                <td>Brak danych</td>
                <td>Brak danych</td>
                <td>Brak danych</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <hr>
    <span class="page-break"></span>
    @endforeach
</div>
</body>
</html>