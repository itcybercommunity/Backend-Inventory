@extends('layouts.app')
@section('content')
            <div class="card mt-5">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                       <input type="text" name="tgl_awal" class="form-control"  id="tgl_awal" required>
                       <label>Tanggal Akhir</label>
                       <input type="text" name="tgl_akhir" class="form-control" id="tgl_akhir" required>
                       <br>

                        <a href="" onclick="this.href='/cetak_laporan_penjualan/'+document.getElementById('tgl_awal').value +'/'+ document.getElementById('tgl_akhir').value" target="_blank" class="btn btn-primary col-md-12">Cetak</a>

                        @error('tgl_awal')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('tgl_akhir')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                </div>
            </div>
        @endsection