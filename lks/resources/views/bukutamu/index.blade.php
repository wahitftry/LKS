@include('layout.header')
@include('layout.sidebar')
<div class="container-fluid page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Buku Tamu</h3>
                    <a href="{{ route('bukutamu.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="bukutamuTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Kota</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/'.$item->gambar) }}" width="50">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('bukutamu.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                        <a href="{{ route('bukutamu.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('bukutamu.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- ...existing pagination if any... -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
  $('#bukutamuTable').DataTable();
});
</script>
@include('layout.footer')