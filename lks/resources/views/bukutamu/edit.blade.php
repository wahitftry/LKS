@include('layout.header')
@include('layout.sidebar')
<div class="container-fluid page-content">
  <section class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3>Edit Data Buku Tamu</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('bukutamu.update', $bukutamu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ $bukutamu->nama }}" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="{{ $bukutamu->email }}" required>
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" name="phone" class="form-control" value="{{ $bukutamu->phone }}" required>
            </div>
            <div class="form-group">
              <label>Kota</label>
              <input type="text" name="city" class="form-control" value="{{ $bukutamu->city }}" required>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control" required>
                <option value="Active" {{ $bukutamu->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $bukutamu->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>
            <div class="form-group">
              <label>Unggah Gambar</label>
              <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>
            @if($bukutamu->gambar)
              <div class="form-group">
                <p>Gambar Saat Ini:</p>
                <img src="{{ asset('storage/'.$bukutamu->gambar) }}" width="100">
              </div>
            @endif
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@include('layout.footer')