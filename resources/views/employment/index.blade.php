<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <a href="{{ '/employment/create' }}" class="btn btn-primary">Input Karyawan Baru</a><br><br>
                    <form action="{{ '/employment' }}" method="GET">
                        <div class="form-group">
                            <label for="Jabatan">Jabatan</label>
                            <select name="jabatan" id="" class="form-control">
                                <option value="">Pilih Jabatan</option>
                                @foreach ($department as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Cari" class="btn btn-primary">
                    </form>
                    <br>
                    @if (session('message'))
                        {{ session('message') }}                        
                    @endif
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Alamat</th>
                                <th>Jabatan</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employment as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->gender }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->department['name'] }}</td>
                                <td>
                                    <a href="{{ '/employment/edit/'.$row->nip }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ '/employment/delete/'.$row->nip }}" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus ? ')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>