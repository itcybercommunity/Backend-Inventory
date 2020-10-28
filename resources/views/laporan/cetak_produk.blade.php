@extends('layouts.app')
@section('content')
            <div class="card mt-5">
                <div class="card-body">
                    @if (session('message'))
                        {{ session('message') }}                        
                    @endif
                    <h1>Laporan Penjualan</h1>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Type</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $row)
                                @foreach($stok as $row2)
                                    <tr>
                                        <td>{{ $row->code }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->id_type }}</td>
                                        <td>{{ $row2->stok }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <script>
                    window.print();
                </script>
            </div>
        @endsection