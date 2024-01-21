@extends('layouts.auth.dashboard')

@section('dropdown')
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengetahuan</h6>
    <div class="dropright mb-4">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Pilih Tabel
        </button>
        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/pengetahuan/peng_pai">PAI</a>
            <a class="dropdown-item" href="/pengetahuan/peng_ppkn">PPKN</a>
            <a class="dropdown-item" href="/pengetahuan/peng_bindo">B.IND</a>
            <a class="dropdown-item" href="/pengetahuan/peng_mat">MAT</a>
            <a class="dropdown-item" href="/pengetahuan/peng_ipa">IPA</a>
            <a class="dropdown-item" href="/pengetahuan/peng_ips">IPS</a>
            <a class="dropdown-item" href="/pengetahuan/peng_sbdp">SBdP</a>
            <a class="dropdown-item" href="/pengetahuan/peng_pjok">PJOK</a>
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
            <th style="vertical-align: middle;text-align: center" colspan="8">Penilaian Harian</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">RPH</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">PTS</th>
            <th style="vertical-align: middle;text-align: center" colspan="1">PAS</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">HPA</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">PRE</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">Deskripsi</th>
            <th style="vertical-align: middle;text-align: center" rowspan="2">Aksi</th>
        </tr>

        <tr class="kolom-kedua">
            <th style="vertical-align: middle;text-align: center">H1</th>
            <th style="vertical-align: middle;text-align: center">H2</th>
            <th style="vertical-align: middle;text-align: center">H3</th>
            <th style="vertical-align: middle;text-align: center">H4</th>
            <th style="vertical-align: middle;text-align: center">H5</th>
            <th style="vertical-align: middle;text-align: center">H6</th>
            <th style="vertical-align: middle;text-align: center">H7</th>
            <th style="vertical-align: middle;text-align: center">H8</th>
            <th style="vertical-align: middle;text-align: center">2</th>
            <th style="vertical-align: middle;text-align: center">1</th>
            <th style="vertical-align: middle;text-align: center">1</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($pengetahuan as $p)
            <tr style="text-align: center">
                <td><?php echo $no++; ?></td>
                <td>{{ $p->Nama }}</td>
                <td>{{ $p->NISN }}</td>
                <td>{{ $p->JK }}</td>
                <td>{{ $p->H1 }}</td>
                <td>{{ $p->H2 }}</td>
                <td>{{ $p->H3 }}</td>
                <td>{{ $p->H4 }}</td>
                <td>{{ $p->H5 }}</td>
                <td>{{ $p->H6 }}</td>
                <td>{{ $p->H7 }}</td>
                <td>{{ $p->H8 }}</td>
                <td>{{ $p->RPH }}</td>
                <td>{{ $p->PTS }}</td>
                <td>{{ $p->PAS }}</td>
                <td>{{ $p->HPA }}</td>
                <td>{{ $p->PRE }}</td>
                <td>{{ $p->Deskripsi }}</td>
                <td style="text-align: center;">
                    <button type="button" data-toggle="modal" data-target="#ModalEdit{{ $p->NISN }}"
                        style="background: none; border: none; cursor: pointer;">
                        <img src="../img/editbg.png" alt="Edit" style="width: 30px; height: 30px;">
                    </button>
                    <a href="/pengetahuan/{{ $p->NISN }}/delete" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus</span>
                    </a>
                </td>
            </tr>
            <div class="modal fade" id="ModalEdit{{ $p->NISN }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="{{ url('/pengetahuan/' . $p->NISN . '/edit') }}" autocomplete="off"
                        class="sign-up-form">
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
                                    <input type="text" class="form-control" autocomplete="off" name="nama"
                                        value="{{ $p->Nama }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">NISN</label>
                                    <input type="text" class="form-control" minlength="10" autocomplete="off"
                                        name="nisn" value="{{ $p->NISN }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                                    <input type="text" minlength="1" maxlength="1" class="form-control" autocomplete="off"
                                        name="jk" value="{{ $p->JK }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-1</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H1" value="{{ $p->H1 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-2</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H2" value="{{ $p->H2 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-3</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H3" value="{{ $p->H3 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-4</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H4" value="{{ $p->H4 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-5</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H5" value="{{ $p->H5 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-6</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H6" value="{{ $p->H6 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-7</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H7" value="{{ $p->H7 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-8</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H8" value="{{ $p->H8 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">RPH [2]</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="rph" value="{{ $p->RPH }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PTS [1]</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="pts" value="{{ $p->PTS }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PAS [1]</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="pas" value="{{ $p->PAS }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">HPA</label>
                                    <input type="number" minlength="" class="form-control" autocomplete="off"
                                        name="hpa" value="{{ $p->HPA }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRE</label>
                                    <input type="text" minlength="" class="form-control" autocomplete="off"
                                        name="pre" value="{{ $p->PRE }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                    <input type="text" minlength="" class="form-control" autocomplete="off"
                                        name="deskripsi" value="{{ $p->Deskripsi }}" required />
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
    <form method="POST" action="/pengetahuan_pai/create" autocomplete="off" class="sign-up-form">
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
                    <input type="text" class="form-control" autocomplete="off" name="nama" required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">NISN</label>
                    <input type="text" class="form-control" minlength="10" autocomplete="off" name="nisn"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                    <input type="text" minlength="1" maxlength="1" class="form-control" autocomplete="off" name="jk"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">H-1</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="H1"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">H-2</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="H2"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">H-3</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="H3"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">H-4</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="H4"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">H-5</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="H5"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">H-6</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="H6"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">H-7</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="H7"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">H-8</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="H8"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">RPH [2]</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="rph"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">PTS [1]</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="pts"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">PAS [1]</label>
                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off" name="pas"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">HPA</label>
                    <input type="number" minlength="" class="form-control" autocomplete="off" name="hpa"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">PRE</label>
                    <input type="text" minlength="" class="form-control" autocomplete="off" name="pre"
                        required />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                    <input type="text" minlength="" class="form-control" autocomplete="off" name="deskripsi"
                        required />
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
{{-- <script>
    $(document).ready(function() {
        $('#ModalEdit{{ $p->NISN }}').modal('show');
    });
</script> --}}
    
@endpush
