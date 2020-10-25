@extends('layouts.app')
@section('content')
            <div class="card mt-5">
                <div class="card-body">
                    
                    <form action="{{ '/proses_login' }}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" placeholder="Masukan Username">

                           @error('user')
                           <div class="text-danger">
                               {{ $message }}
                           </div>
                           @enderror

                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Masukan Password">


                            @error('pass')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Login">
                        </div>

                    </form>

                </div>
            </div>
    
@endsection