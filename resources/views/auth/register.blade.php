@extends('layouts.auth.dashboard')

@section('dropdown')
    <h6 class="m-0 font-weight-bold text-primary">Tabel Register</h6>
    <div class="dropright mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah">Tambah Data</button>
    </div>
@endsection

@section('table-content')
    <thead>
        <tr class="kolom-kedua">
            <th style="vertical-align: middle;text-align: center" >No</th>
            <th style="vertical-align: middle;text-align: center" >Nama</th>
            <th style="vertical-align: middle;text-align: center" >Email</th> 
            <th style="vertical-align: middle;text-align: center" >Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;?>
        @foreach($user as $u)
        <tr style="text-align: center">
            <td><?php echo $no++; ?></td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td style="text-align: center;">
                <button type="button" data-toggle="modal" data-target="#ModalEdit{{ $u->id }}"
                    style="background: none; border: none; cursor: pointer;">
                    <img src="./img/editbg.png" alt="Edit" style="width: 30px; height: 30px;">
                </button>

                <div class="modal fade" id="ModalEdit{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="POST" action="/register/{{ $u->id }}/update" autocomplete="off" class="sign-up-form">
                            @csrf
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input
                                        type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        autocomplete="off"
                                        id="name"
                                        name="name"
                                        value="{{ $u->name }}"
                                        required/>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email</label>
                                    <input
                                        type="text"
                                        class="form-control @error('email') is-invalid @enderror"
                                        autocomplete="off"
                                        id="email" 
                                        name="email"
                                        value="{{ $u->email }}"
                                        required/>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        autocomplete="off"
                                        id="password" 
                                        name="password"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        autocomplete="off"
                                        id="password_confirmation" 
                                        name="password_confirmation"
                                        required
                                    />
                                </div> --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" value="update" class="btn btn-primary">Simpan</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>

                <a href="/register/{{ $u->id }}/delete" class="btn btn-danger btn-icon-split">
                
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
@endsection

@section('add')
    <form method="POST" action="{{ route('store') }}" autocomplete="off" class="sign-up-form">
        @csrf
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    autocomplete="off"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required/>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input
                    type="text"
                    class="form-control @error('email') is-invalid @enderror"
                    autocomplete="off"
                    id="email" 
                    name="email"
                    value="{{ old('email') }}"
                    required/>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    autocomplete="off"
                    id="password" 
                    name="password"
                    required />
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input
                    type="password"
                    class="form-control"
                    autocomplete="off"
                    id="password_confirmation" 
                    name="password_confirmation"
                    required
                />
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" value="Register" class="btn btn-primary">Simpan</button>
        </div>
        </div>
    </form>
@endsection