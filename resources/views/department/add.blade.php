@extends('layouts.app')
@section('content')
    
<div class="card mt-5">
    <div class="card-body">
                    <a href="{{ '/department' }}" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form action="{{ '/department/store' }}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Jabatan ..">

                            @error('name')
                           <div class="text-danger">
                               {{ $message }}
                           </div>
                           @enderror
                           
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
@endsection