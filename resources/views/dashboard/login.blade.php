<form action="{{ route('dashboard.authuser') }}" method="post">
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
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{old('email')}}">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <button type="submit">Login</button>
</form>
