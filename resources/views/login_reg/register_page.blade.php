<x-layout>

<title>Register Form</title>

<div>
    <h1>PerDin</h1>
    <ul>
        <li>
            <form action="{{ route('register_process') }}" method="post">
            @csrf
                <input type="text" name="username" id="uname" placeholder="Nama" required><br>
                <input type="password" name="password" id="pass" placeholder="Kata sandi" required><br>
                <input type="password" name="password2" id="pass" placeholder="Ketik ulang kata sandi" required><br>
                <button type="submit">Daftar</button>
            </form>
        </li>
        @if(session()->has('flash_message'))
            <li class="flash-message">
                {{ session('flash_message') }}
            </li>
        @endif
        <li>
            <a href="login">Kembali</a>
        </li>
    </ul>
</div>

</x-layout>