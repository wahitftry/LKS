{{-- 
Algoritma:
1. Menampilkan form untuk menambah data buku tamu baru.
2. Form mengirimkan data ke metode store di BukuTamuController.
--}}
@include('layout.header')
@include('layout.sidebar')
<div class="container-fluid page-content">
  <section class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3>Tambah Data Buku Tamu</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('bukutamu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" name="phone" class="form-control" placeholder="Telepon" required>
            </div>
            <div class="form-group">
              <label>Kota</label>
              <input type="text" name="city" class="form-control" placeholder="Kota" required>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            <div class="form-group">
              <label>Unggah Gambar</label>
              <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@include('layout.footer')