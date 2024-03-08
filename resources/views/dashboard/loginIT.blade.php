<form action="{{ route('dashboard.authitsupport') }}" method="post">
    @csrf

    <h1>Login</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{old('username')}}">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <button type="submit">Login</button>
</form>
