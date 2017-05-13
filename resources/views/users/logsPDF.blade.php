<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>({{ $user->name }}) Historia logowań do systemu</title>
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

    #info{
        font-size: 10px;
    }
</style>
<body>
    <h3>Historia logowań do systemu</h3>
    <div id="info">
        Użytkownik: {{ $user->name }}
        <br>
        Rola użytkownika:
        @foreach($roles as $role)
            {{ $role }}
        @endforeach   
        <br>
        E-mail: {{ $user->email }}
        <br>
        Użytkownik od: {{ $user->created_at }}
        <br>
        <strong>Dokument wygenerowano:</strong>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;przez: {{ Auth::user()->name }} | {{ Auth::user()->email }}
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;dnia: {{ \Carbon\Carbon::now() }}
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Data logowania</th>
                <th>HTTP User agent</th>
                <th>Adres IP</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
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
</div>
</body>
</html>