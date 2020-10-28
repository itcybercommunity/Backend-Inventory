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
                                <th>Date</th>
                                <th>QTY</th>
                                <th>Reason</th>
                                <th>ID Outbound Detail</th>
                                <th>ID roadblock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($retur as $row)
                            <tr>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->qty }}</td>
                                <td>{{ $row->reason }}</td>
                                <td>{{ $row->id_outbound_detail }}</td>
                                <td>{{ $row->id_roadblock }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <script>
                    window.print();
                </script>
            </div>
        @endsection