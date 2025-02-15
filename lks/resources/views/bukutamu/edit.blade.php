@include('layout.header')
@include('layout.sidebar')
<h3>Edit Data Buku Tamu</h3>
<form action="{{ route('bukutamu.update', $bukutamu->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <!-- ...form field nama... -->
    <input type="text" name="nama" value="{{ $bukutamu->nama }}" required>
    <!-- ...form field email... -->
    <input type="email" name="email" value="{{ $bukutamu->email }}" required>
    <!-- ...form field phone... -->
    <input type="text" name="phone" value="{{ $bukutamu->phone }}" required>
    <!-- ...form field city... -->
    <input type="text" name="city" value="{{ $bukutamu->city }}" required>
    <!-- ...form field status... -->
    <select name="status" required>
        <option value="Active" {{ $bukutamu->status == 'Active' ? 'selected' : '' }}>Active</option>
        <option value="Inactive" {{ $bukutamu->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    <!-- unggah gambar -->
    <input type="file" name="gambar" accept="image/*">
    @if($bukutamu->gambar)
        <p>Gambar Saat Ini: <br><img src="{{ asset('storage/'.$bukutamu->gambar) }}" width="100"></p>
    @endif
    <button type="submit">Update</button>
</form>
@include('layout.footer')