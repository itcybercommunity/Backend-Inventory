@extends('layouts.app')
@section('content')
            <div class="card mt-5">
                <div class="card-body">
                    <a href="{{ '/outbound/create' }}" class="btn btn-primary">Input Jabatan Baru</a>
                    <br/>
                    <br/>
                    @if (session('message'))
                        {{ session('message') }}                        
                    @endif
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>date</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($outbound as $row)
                            <tr>
                                <td>{{ $row->date }}</td>
                                <td>
                                    <a href="{{ '/outbound/edit/'.$row->id }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ '/outbound/delete/'.$row->id }}" class="btn btn-danger" onclick="return confirm('Yakin Data Mau Dihapus ? ')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection