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
                <td>{{ $p->nama }}</td>
                <td>{{ $p->NISN }}</td>
                <td>{{ $p->h1 }}</td>
                <td>{{ $p->h2 }}</td>
                <td>{{ $p->h3 }}</td>
                <td>{{ $p->h4 }}</td>
                <td>{{ $p->h5 }}</td>
                <td>{{ $p->h6 }}</td>
                <td>{{ $p->h7 }}</td>
                <td>{{ $p->h8 }}</td>
                <td>0</td>
                <td>{{ $p->pts }}</td>
                <td>{{ $p->pas }}</td>
                <td>0</td>
                <td>A</td>
                <td>{{ $p->deskripsi }}</td>
                <td style="text-align: center;">
                    <button type="button" data-toggle="modal" data-target="#ModalEdit{{ $p->id }}"
                        style="background: none; border: none; cursor: pointer;">
                        <img src="../img/editbg.png" alt="Edit" style="width: 30px; height: 30px;">
                    </button>
                    <a href="/pengetahuan_pai/{{ $p->id }}/delete" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus</span>
                    </a>
                </td>
            </tr>
            <div class="modal fade" id="ModalEdit{{ $p->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="POST" action="{{ url('/pengetahuan_pai/' . $p->id . '/edit') }}" autocomplete="off"
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
                                        value="{{ $p->nama }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">NISN</label>
                                    <input type="text" class="form-control" minlength="10" autocomplete="off"
                                        name="nisn" value="{{ $p->NISN }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-1</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H1" value="{{ $p->h1 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-2</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H2" value="{{ $p->h2 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-3</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H3" value="{{ $p->h3 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-4</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H4" value="{{ $p->h4 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-5</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H5" value="{{ $p->h5 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-6</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H6" value="{{ $p->h6 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-7</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H7" value="{{ $p->h7 }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">H-8</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="H8" value="{{ $p->h8 }}" required />
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">RPH [2]</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="rph" value="{{ $p->RPH }}" required />
                                </div> --}}
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PTS [1]</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="pts" value="{{ $p->pts }}" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PAS [1]</label>
                                    <input type="number" minlength="" maxlength="3" class="form-control" autocomplete="off"
                                        name="pas" value="{{ $p->pas }}" required />
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">HPA</label>
                                    <input type="number" minlength="" class="form-control" autocomplete="off"
                                        name="hpa" value="{{ $p->hpa }}" required />
                                </div> --}}
                                {{-- <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">PRE</label>
                                    <input type="text" minlength="" class="form-control" autocomplete="off"
                                        name="pre" value="{{ $p->pre }}" required />
                                </div> --}}
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                                    <input type="text" minlength="" class="form-control" autocomplete="off"
                                        name="deskripsi" value="{{ $p->deskripsi }}" required />
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
