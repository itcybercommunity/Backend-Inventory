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
                                <th>ID Customers</th>
                                <th>ID Employment</th>
                                <th>Date</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($outbound as $row)
                            <tr>
                                <td>{{ $row->id_customer }}</td>
                                <td>{{ $row->id_employment }}</td>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->total }}</td>
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