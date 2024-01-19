@extends('layouts.auth.dashboard')


@section('dropdown')
    <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
    <div class="dropright mb-4">
        <button class="btn btn-primary dropdown-toggle" type="button"
            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Pilih Tabel
        </button>
        <div class="dropdown-menu animated--fade-in"
            aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">PAI</a>
            <a class="dropdown-item" href="#">PPKN</a>
            <a class="dropdown-item" href="#">B.IND</a>
            <a class="dropdown-item" href="#">MAT</a>
            <a class="dropdown-item" href="#">IPA</a>
            <a class="dropdown-item" href="#">IPS</a>
            <a class="dropdown-item" href="#">SBdP</a>
            <a class="dropdown-item" href="#">PJOK</a>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah">Tambah Data</button>
    </div>
@endsection

@section('table-content')
    <thead>
        <tr class="kolom-kedua">
            <th style="vertical-align: middle;text-align: center" >No</th>
            <th style="vertical-align: middle;text-align: center" >NISN</th>
            <th style="vertical-align: middle;text-align: center" >Nama</th>
            <th style="vertical-align: middle;text-align: center" >Jenis Kelamin</th>
            <th style="vertical-align: middle;text-align: center" >TTL</th>
            <th style="vertical-align: middle;text-align: center" >Tgl Lahir</th>
            <th style="vertical-align: middle;text-align: center" >Agama</th>
            <th style="vertical-align: middle;text-align: center" >Status</th>
            <th style="vertical-align: middle;text-align: center" >Anak Ke-</th>
            <th style="vertical-align: middle;text-align: center" >Alamat</th>
            <th style="vertical-align: middle;text-align: center">Kelas Terima</th>
            <th style="vertical-align: middle;text-align: center">Tgl Terima</th>
            <th style="vertical-align: middle;text-align: center">Aksi</th>   
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;?>
        @foreach($siswa as $s)
        <tr style="text-align: center">
            <td><?php echo $no++; ?></td>
            <td>{{ $s->NISN }}</td>
            <td>{{ $s->nama_siswa }}</td>
            <td>{{ $s->jenis_kelamin }}</td>
            <td>{{ $s->tmp_lahir }}</td>
            <td>{{ $s->tgl_lahir }}</td>
            <td>{{ $s->agama }}</td>
            <td>{{ $s->status }}</td>
            <td>{{ $s->anak_ke }}</td>
            <td>{{ $s->alamat }}</td>
            <td>{{ $s->kls_terima }}</td>
            <td>{{ $s->tgl_terima }}</td>
            <td style="text-align: center;">
                <button type="button" class="edit-btn" data-toggle="modal" data-target="#ModalEdit{{ $s->NISN }}"
                    style="background: none; border: none; cursor: pointer;">
                    <img src="./img/editbg.png" alt="Edit" style="width: 30px; height: 30px;">
                </button>

                <a href="/dashboard/{{ $s->NISN }}/delete" class="btn btn-danger btn-icon-split">
                
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                </a>
            </td>
        </tr>
        <div class="modal fade" id="ModalEdit{{ $s->NISN }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST" action="{{ url('/dashboard/' . $s->NISN . '/edit') }}" autocomplete="off" class="sign-up-form">
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
                                <label for="exampleInputEmail1" class="form-label">NISN</label>
                                <input
                                    type="text"
                                    minlength="10"
                                    class="form-control"
                                    autocomplete="off"
                                    name="NISN"
                                    value="{{ $s->NISN }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nama Siswa</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    autocomplete="off"
                                    name="nama siswa"
                                    value="{{ $s->nama_siswa }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                <input
                                    type="text"
                                    minlength="1"
                                    class="form-control"
                                    autocomplete="off"
                                    name="jenis kelamin"
                                    value="{{ $s->jenis_kelamin }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                                <input
                                    type="text"
                                    minlength=""
                                    class="form-control"
                                    autocomplete="off"
                                    name="tmp lahir"
                                    value="{{ $s->tmp_lahir }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                <input
                                    type="date"
                                    minlength=""
                                    class="form-control"
                                    autocomplete="off"
                                    name="tgl lahir"
                                    value="{{ $s->tgl_lahir }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Agama</label>
                                <input
                                    type="text"
                                    minlength=""
                                    class="form-control"
                                    autocomplete="off"
                                    name="agama"
                                    value="{{ $s->agama }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Status</label>
                                <input
                                    type="text"
                                    minlength=""
                                    class="form-control"
                                    autocomplete="off"
                                    name="status"
                                    value="{{ $s->status }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Anak Ke-</label>
                                <input
                                    type="text"
                                    minlength=""
                                    class="form-control"
                                    autocomplete="off"
                                    name="anak ke"
                                    value="{{ $s->anak_ke }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                <input
                                    type="text"
                                    minlength=""
                                    class="form-control"
                                    autocomplete="off"
                                    name="alamat"
                                    value="{{ $s->alamat }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kelas Terima</label>
                                <input
                                    type="text"
                                    minlength=""
                                    class="form-control"
                                    autocomplete="off"
                                    name="kls terima"
                                    value="{{ $s->kls_terima }}"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tanggal Terima</label>
                                <input
                                    type="date"
                                    minlength=""
                                    class="form-control"
                                    autocomplete="off"
                                    name="tgl terima"
                                    value="{{ $s->tgl_terima }}"
                                    required
                                />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" value="Sign Up" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </tbody>
@endsection

@section('add')
    <form method="POST" action="/dashboard/create" autocomplete="off" class="sign-up-form">
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
                    <label for="exampleInputEmail1" class="form-label">NISN</label>
                    <input
                        type="text"
                        minlength="10"
                        class="form-control"
                        autocomplete="off"
                        name="NISN"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Siswa</label>
                    <input
                        type="text"
                        class="form-control"
                        autocomplete="off"
                        name="nama siswa"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                    <input
                        type="text"
                        minlength="1"
                        maxlength="1"
                        class="form-control"
                        autocomplete="off"
                        name="jenis kelamin"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                    <input
                        type="text"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="tmp lahir"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                    <input
                        type="date"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="tgl lahir"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Agama</label>
                    <input
                        type="text"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="agama"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                    <input
                        type="text"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="status"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Anak Ke-</label>
                    <input
                        type="text"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="anak ke"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Alamat</label>
                    <input
                        type="text"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="alamat"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Kelas Terima</label>
                    <input
                        type="text"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="kls terima"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tanggal Terima</label>
                    <input
                        type="date"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="tgl terima"
                        required
                    />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="Sign Up" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
@push('js')

<script>
    $(document).ready(function() {
        $('#ModalEdit{{ $s->NISN }}').modal('show');
    });
</script>
    
@endpush
