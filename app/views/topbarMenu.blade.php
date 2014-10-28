
<div class="col-md-6 col-sm-6 additional-nav">
    <ul class="list-unstyled list-inline pull-right">
        @if (Auth::check())
            <li>{{ Auth::user()->userName }}</li>
            @if (Auth::user()->isInGroup(User::$userGroups['admins']))
                <li><a href="/admin">Admin pannel</a></li>
            @endif
            <li><a href="/logout">Logout</a></li>
        @else
            <li><a href="/login">Log In</a></li>
            <li><a href="/register">Registration</a></li>
        @endif
    </ul>
</div>

