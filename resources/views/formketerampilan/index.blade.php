@extends('layouts.auth.dashboard')

@section('dropdown')
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Keterampilan</h6>
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
        <tr class="fw-semibold fs-6 text-muted">
            <th style="vertical-align: middle;text-align: center" rowspan="2">No</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">Nama</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">NIS/NISN</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">JK</th>
            <th style="vertical-align: middle;text-align: center" colspan="1" >K1</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">K2</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">K3</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">K4</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">K5</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">K6</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">K7</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">K8</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">HPA</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">PRE</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">Deskripsi Otomatis</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">Aksi</th>
        </tr>

        <tr class="kolom-kedua">
            <th style="vertical-align: middle;text-align: center">1</th>
            <th style="vertical-align: middle;text-align: center">1</th>
            <th style="vertical-align: middle;text-align: center">1</th>
            <th style="vertical-align: middle;text-align: center">1</th>
            <th style="vertical-align: middle;text-align: center">1</th>
            <th style="vertical-align: middle;text-align: center">1</th>   
            <th style="vertical-align: middle;text-align: center">1</th>
            <th style="vertical-align: middle;text-align: center">1</th>    
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;?>
        @foreach($keterampilan as $k)
        <tr style="text-align: center">
            <td><?php echo $no++; ?></td>
            <td>{{ $k->Nama }}</td>
            <td>{{ $k->NISN }}</td>
            <td>{{ $k->JK }}</td>
            <td>{{ $k->K1 }}</td>
            <td>{{ $k->K2 }}</td>
            <td>{{ $k->K3 }}</td>
            <td>{{ $k->K4 }}</td>
            <td>{{ $k->K5 }}</td>
            <td>{{ $k->K6 }}</td>
            <td>{{ $k->K7 }}</td>
            <td>{{ $k->K8 }}</td>
            <td>{{ $k->HPA }}</td>
            <td>{{ $k->PRE }}</td>
            <td>{{ $k->Deskripsi }}</td>
            <td style="text-align: center;">
                <button type="button" data-toggle="modal" data-target="#ModalEdit{{ $k->NISN }}"
                    style="background: none; border: none; cursor: pointer;">
                    <img src="./img/editbg.png" alt="Edit" style="width: 30px; height: 30px;">
                </button>

                <div class="modal fade" id="ModalEdit{{ $k->NISN }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="POST" action="/keterampilan/{{ $k->NISN }}/edit" autocomplete="off" class="sign-up-form">
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
                                            class="form-control"
                                            autocomplete="off"
                                            name="nama"
                                            value="{{ $k->Nama }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">NISN</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            minlength="10"
                                            autocomplete="off"
                                            name="nisn"
                                            value="{{ $k->NISN }}"
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
                                            name="jk"
                                            value="{{ $k->JK }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">K-1 [1]</label>
                                        <input
                                            type="number"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="k1"
                                            value="{{ $k->K1 }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">K-2 [1]</label>
                                        <input
                                            type="number"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="k2"
                                            value="{{ $k->K2 }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">K-3 [1]</label>
                                        <input
                                            type="number"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="k3"
                                            value="{{ $k->K3 }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">K-4 [1]</label>
                                        <input
                                            type="number"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="k4"
                                            value="{{ $k->K4 }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">K-5 [1]</label>
                                        <input
                                            type="number"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="k5"
                                            value="{{ $k->K5 }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">K-6 [1]</label>
                                        <input
                                            type="number"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="k6"
                                            value="{{ $k->K6 }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">K-7 [1]</label>
                                        <input
                                            type="number"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="k7"
                                            value="{{ $k->K7 }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">K-8 [1]</label>
                                        <input
                                            type="number"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="k8"
                                            value="{{ $k->K8 }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">HPA</label>
                                        <input
                                            type="number"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="hpa"
                                            value="{{ $k->HPA }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">PRE</label>
                                        <input
                                            type="text"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="pre"
                                            value="{{ $k->PRE }}"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                        <input
                                            type="text"
                                            minlength=""
                                            class="form-control"
                                            autocomplete="off"
                                            name="deskripsi"
                                            value="{{ $k->Deskripsi }}"
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
                <a href="/keterampilan/{{ $k->NISN }}/delete" class="btn btn-danger btn-icon-split">
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
    <form method="POST" action="/keterampilan/create" autocomplete="off" class="sign-up-form">
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
                        class="form-control"
                        autocomplete="off"
                        name="nama"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">NISN</label>
                    <input
                        type="text"
                        class="form-control"
                        minlength="10"
                        autocomplete="off"
                        name="nisn"
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
                        name="jk"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">K-1 [1]</label>
                    <input
                        type="number"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="k1"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">K-2 [1]</label>
                    <input
                        type="number"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="k2"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">K-3 [1]</label>
                    <input
                        type="number"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="k3"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">K-4 [1]</label>
                    <input
                        type="number"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="k4"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">K-5 [1]</label>
                    <input
                        type="number"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="k5"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">K-6 [1]</label>
                    <input
                        type="number"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="k6"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">K-7 [1]</label>
                    <input
                        type="number"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="k7"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">K-8 [1]</label>
                    <input
                        type="number"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="k8"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">HPA</label>
                    <input
                        type="number"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="hpa"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">PRE</label>
                    <input
                        type="text"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="pre"
                        required
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                    <input
                        type="text"
                        minlength=""
                        class="form-control"
                        autocomplete="off"
                        name="deskripsi"
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