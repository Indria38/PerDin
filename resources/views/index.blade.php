<x-layout>

<title>Welcome!</title>

<div>
    <h1>Selamat datang {{ session()->get('username') }}</h1>
</div>

</x-layout>