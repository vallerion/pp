<div class="profiler-box">
    <div class="profiler-header">
        {{--<img src="http://pira.loc/img/user_avatars/3.png" alt="valera">--}}
        <img src="{{ $user->image }}">
        <a href="#" class="headline">{{ $user->name }}</a>
        <button class="close pull-right">&times;</button>
    </div>
    <div class="profiler-body">
        <span class="text-muted">email: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></span><br>

        @if(!empty($user->skype))
            <span class="text-muted">skype: <a href="skype:{{ $user->skype }}">{{ $user->skype }}</a></span><br>
        @endif

        @if(!$user->company->isEmpty())
            <span class="text-muted">company: <a href="#">{{ $user->company->name }}</a></span>
        @endif

    </div>
</div>