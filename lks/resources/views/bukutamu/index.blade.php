@include('layout.header')
@include('layout.sidebar')
<h3>Daftar Buku Tamu</h3>
<a href="{{ route('bukutamu.create') }}">Tambah Data</a>
<table>
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
                <a href="{{ route('bukutamu.show', $item->id) }}">Lihat</a>
                <a href="{{ route('bukutamu.edit', $item->id) }}">Edit</a>
                <form action="{{ route('bukutamu.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('layout.footer')