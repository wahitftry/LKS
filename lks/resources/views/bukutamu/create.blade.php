@include('layout.header')
@include('layout.sidebar')
<h3>Tambah Data Buku Tamu</h3>
<form action="{{ route('bukutamu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- ...form field nama... -->
    <input type="text" name="nama" placeholder="Nama" required>
    <!-- ...form field email... -->
    <input type="email" name="email" placeholder="Email" required>
    <!-- ...form field phone... -->
    <input type="text" name="phone" placeholder="Telepon" required>
    <!-- ...form field city... -->
    <input type="text" name="city" placeholder="Kota" required>
    <!-- ...form field status... -->
    <select name="status" required>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>
    <!-- unggah gambar -->
    <input type="file" name="gambar" accept="image/*">
    <button type="submit">Simpan</button>
</form>
@include('layout.footer')