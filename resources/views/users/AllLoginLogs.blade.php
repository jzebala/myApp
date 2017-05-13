<!-- All login logs -->
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Historia logowań użytkownika</h4>
    </div>

    <div class="modal-body">  
    <div class="alert alert-info">
        <strong>Info!</strong> Aby zobaczyć wszystkie logi użytkownika wygeneruj plik PDF.
    </div>
        <div class="table-responsive">          
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ostatnie logowanie</th>
                        <th>User agent</th>
                        <th>Adres IP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_logs->slice(0, 10) as $log)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $log->last_login }}</td>
                        <td><a href="#" data-toggle="user_agent" data-placement="bottom" title="{{ $log->user_agent }}">{{ str_limit($log->user_agent, 25) }}</a></td>
                        <td>{{ $log->ip_address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal-footer">
        <a href="{{ route('users.pdf', $user->id) }}" class="btn btn-primary">PDF</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
        $('[data-toggle="user_agent"]').tooltip(); 
    });
</script>