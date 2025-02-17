@include('layout.header')
@include('layout.sidebar')
<div class="page-content">
  <section class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3>Detail Buku Tamu</h3>
        </div>
        <div class="card-body">
          <p><strong>Nama:</strong> {{ $bukutamu->nama }}</p>
          <p><strong>Email:</strong> {{ $bukutamu->email }}</p>
          <p><strong>Telepon:</strong> {{ $bukutamu->phone }}</p>
          <p><strong>Kota:</strong> {{ $bukutamu->city }}</p>
          <p><strong>Status:</strong> {{ $bukutamu->status }}</p>
          @if($bukutamu->gambar)
            <div class="mt-3">
              <p><strong>Gambar:</strong></p>
              <img src="{{ asset('storage/'.$bukutamu->gambar) }}" width="200">
            </div>
          @endif
          <a href="{{ route('bukutamu.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
      </div>
    </div>
  </section>
</div>
@include('layout.footer')