@include('layout.header')
@include('layout.sidebar')
<div class="container-fluid page-content">
  <section class="section">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Detail Buku Tamu</h4>
      </div>
      <div class="card-body">
        <!-- Using list group for details -->
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Nama:</strong> {{ $bukutamu->nama }}</li>
          <li class="list-group-item"><strong>Email:</strong> {{ $bukutamu->email }}</li>
          <li class="list-group-item"><strong>Telepon:</strong> {{ $bukutamu->phone }}</li>
          <li class="list-group-item"><strong>Kota:</strong> {{ $bukutamu->city }}</li>
          <li class="list-group-item"><strong>Status:</strong> {{ $bukutamu->status }}</li>
        </ul>
        @if($bukutamu->gambar)
          <div class="mt-3">
            <p><strong>Gambar:</strong></p>
            <img src="{{ asset('storage/'.$bukutamu->gambar) }}" class="img-fluid rounded" alt="Gambar">
          </div>
        @endif
        <a href="{{ route('bukutamu.index') }}" class="btn btn-secondary mt-3">Kembali</a>
      </div>
    </div>
  </section>
</div>
@include('layout.footer')