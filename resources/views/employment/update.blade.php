@extends('layouts.app')
@section('content')
            <div class="card mt-5">
                <div class="card-body">
                    <a href="{{ '/employment' }}" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="{{ '/employment/update/'.$employment->nip }}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama employment .." value="{{ $employment->name }}">

                           @error('name')
                           <div class="text-danger">
                               {{ $message }}
                           </div>
                           @enderror

                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <input type="radio" name="gender" value="Laki-Laki" <?php if($employment['gender']=='Laki-Laki') echo 'checked'?>>Laki-Laki
                            <input type="radio" name="gender" value="Perempuan" <?php if($employment['gender']=='Perempuan') echo 'checked'?>>Perempuan
                            @error('gender')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Employment" value="{{ $employment['email'] }}" >

                           @error('email')
                           <div class="text-danger">
                               {{ $message }}
                           </div>
                           @enderror

                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Email Employment">

                           @error('password')
                           <div class="text-danger">
                               {{ $message }}
                           </div>
                           @enderror

                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Employment" value="{{ $employment['phone'] }}">

                           @error('phone')
                           <div class="text-danger">
                               {{ $message }}
                           </div>
                           @enderror

                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="address" class="form-control" placeholder="Alamat Employment"> {{ $employment['address'] }}</textarea>

                            @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>

                            <select name="department" id="" class="form-control">
                                <?php 
                                    foreach ($department as $department) {
                                        if ($department['id'] == $employment['id_department']) {
                                ?>
                                    <option value="<?= $department['id'] ?>" selected><?= $department['name'] ?></option>
                                <?php }else{ ?>
                                    <option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                                <?php
                                        }
                                    }
                                ?>
                                </select>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
@endsection