<x-layout>

<title>Welcome!</title>

<div class="page-welcome">
    <div class="welcome-container">
        <h1>Selamat datang {{ session()->get('username') }}</h1>
    </div>
</div>

</x-layout>