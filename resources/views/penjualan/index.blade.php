@extends('layouts.app')
@section('content')
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
                                <th>Faktur</th>
                                <th>ID Customer</th>
                                <th>ID Employment</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($department as $row)
                            <tr>
                                <td>{{ $row->faktur }}</td>
                                <td>{{ $row->id_customer }}</td>
                                <td>{{ $row->id_employment }}</td>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->total }}</td>
                                <td>
                                    <a href="{{ '/department/edit/'.$row->faktur }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ '/department/delete/'.$row->faktur }}" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus ? ')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection