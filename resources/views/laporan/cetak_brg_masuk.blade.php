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
                                <th>Faktur/th>
                                <th>Faktur Po</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inbound as $row)
                            <tr>
                                <td>{{ $row->faktur }}</td>
                                <td>{{ $row->faktur_po }}</td>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->total }}</td>
                                <td>{{ $row->status }}</td>
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