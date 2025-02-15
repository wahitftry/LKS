@include('layout.header')
@include('layout.sidebar')
<h3>Detail Buku Tamu</h3>
<p>Nama: {{ $bukutamu->nama }}</p>
<p>Email: {{ $bukutamu->email }}</p>
<p>Telepon: {{ $bukutamu->phone }}</p>
<p>Kota: {{ $bukutamu->city }}</p>
<p>Status: {{ $bukutamu->status }}</p>
@if($bukutamu->gambar)
    <p>Gambar: <br><img src="{{ asset('storage/'.$bukutamu->gambar) }}" width="200"></p>
@endif
<a href="{{ route('bukutamu.index') }}">Kembali</a>
@include('layout.footer')