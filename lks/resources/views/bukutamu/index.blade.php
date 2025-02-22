{{-- 
Algoritma:
1. Mengambil data buku tamu dan menampilkannya dalam tabel.
2. Menambahkan nomor urut dengan $loop->iteration.
3. Menampilkan aksi (lihat, edit, hapus) untuk setiap data.
--}}
@include('layout.header')
@include('layout.sidebar')
<div class="container-fluid page-content">
    <section class="section">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Buku Tamu</h3>
                    <a href="{{ route('bukutamu.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Menampilkan data dari tabel bukutamu -->
                        <table id="table1" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
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
                                    <td>{{ $loop->iteration }}</td>
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
                </div>
            </div>
    </section>
</div>
@include('layout.footer')