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
                    <a href="{{ '/department/create' }}" class="btn btn-primary">Input Jabatan Baru</a>
                    <br/>
                    <br/>
                    @if (session('message'))
                        {{ session('message') }}                        
                    @endif
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($department as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <a href="{{ '/department/edit/'.$row->id }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ '/department/delete/'.$row->id }}" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus ? ')">Hapus</a>
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