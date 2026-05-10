<x-layout>

<title>Formulir Masuk</title>

<div>
    <h1>PerDin</h1>
    <ul>
        <li>
            <form action="{{ route('login_process') }}" method="post">
            @csrf
                <input type="text" name="username" id="uname" placeholder="Nama" required><br>
                <input type="password" name="password" id="pass" placeholder="Kata sandi" required><br>
                <button type="submit">Masuk</button>
            </form>
        </li>
        @if(session()->has('flash_message'))
            <li class="flash-message">
                {{ session('flash_message') }}
            </li>
        @endif
        <li>
            <a href="register">Tidak punya akun? Klik di sini untuk daftar</a>
        </li>
    </ul>
</div>

</x-layout>

