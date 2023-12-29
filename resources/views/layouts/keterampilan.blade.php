@extends('layouts.auth.dashboard')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Penilaian Keterampilan</h6>
                    <div class="dropright">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#tambah_keterampilan">Tambah Data</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="printTable()">Print</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0" id="dataTable" width="100%" cellspacing="">
                        <thead>
                            <tr class="fw-semibold fs-6 text-muted">
                                <th style="vertical-align: middle;text-align: center; " rowspan="2">No
                                </th>
                                <th style="vertical-align: middle;text-align: center; " rowspan="2">
                                    Nama</th>
                                <th style="vertical-align: middle;text-align: center; " rowspan="2">
                                    NIS/NISN</th>
                                <th style="vertical-align: middle;text-align: center; " rowspan="2">JK
                                </th>
                                <th style="vertical-align: middle;text-align: center" colspan="8">
                                    Penilaian Harian</th>
                                {{-- <th style="vertical-align: middle;text-align: center" colspan="1">RPH
                                </th>
                                <th style="vertical-align: middle;text-align: center" colspan="1">PTS
                                </th>
                                <th style="vertical-align: middle;text-align: center" colspan="1">PAS
                                </th> --}}
                                <th style="vertical-align: middle;text-align: center" rowspan="2">HPA
                                </th>
                                <th style="vertical-align: middle;text-align: center" rowspan="2">PRE
                                </th>
                                <th style="vertical-align: middle;text-align: center;" rowspan="2">
                                    Deskripsi Otomatis</th>
                                <th style="vertical-align: middle;text-align: center" rowspan="2">Aksi
                                </th>
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
                                {{-- <th style="vertical-align: middle;text-align: center">2</th>
                                <th style="vertical-align: middle;text-align: center">1</th>
                                <th style="vertical-align: middle;text-align: center">1</th> --}}
                            </tr>

                        </thead>

                        <tbody>
                            <tr>
                                <td style="text-align: center;">1</td>
                                <td>Nama Siswa 1</td>
                                <td>12345</td>
                                <td>Laki-laki</td>
                                <!-- Penilaian Harian -->
                                <td style="text-align: center;">85</td>
                                <td style="text-align: center;">78</td>
                                <td style="text-align: center;">90</td>
                                <td style="text-align: center;">92</td>
                                <td style="text-align: center;">80</td>
                                <td style="text-align: center;">88</td>
                                <td style="text-align: center;">75</td>
                                <td style="text-align: center;">82</td>
                                <!-- RPH, PTS, PAS -->
                                {{-- <td style="text-align: center;">75</td>
                                <td style="text-align: center;">85</td>
                                <td style="text-align: center;">90</td> --}}
                                <!-- Kolom lainnya -->
                                <td style="text-align: center;">85</td>
                                <td style="text-align: center;">75</td>
                                <td>Deskripsi siswa 1</td>
                                <td style="text-align: center;">
                                    <button type="button" data-toggle="modal" data-target="#edit_keterampilan"
                                        style="background: none; border: none; cursor: pointer;">
                                        <img src="./img/editbg.png" alt="Edit" style="width: 30px; height: 30px;">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal edit -->
    <div class="modal fade" id="edit_keterampilan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title m-0" id="myExtraLargeModalLabel">Edit Data</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><!--end modal-header-->
                <div class="modal-body">
                    <form autocomplete="off" class="needs-validation" novalidate="" method="POST">
                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="projectName">Nama Siswa:</label>
                                <input type="text" class="form-control" id="edt_namasiswa" name="edt_namasiswa"
                                    placeholder="Masukkan Nama Mahasiswa">
                            </div><!--end form-group-->
                            <div class="col-md-3">
                                <label class="form-label" for="pro-message">NIS/NISN</label>
                                <input type="text" class="form-control" id="edt_nisn" name="edt_nisn"
                                    placeholder="Masukkan NIS/NISN">
                            </div><!--end form-group-->
                            <div class="col-md-3">
                                <label class="form-label" for="pro-message">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="edt_jeniskelamin" name="edt_jeniskelamin"
                                    placeholder="Masukkan Jenis Kelamin">
                            </div><!--end form-group-->
                            <br>
                            <div class="col-md-12">
                                <h5> Penilaian Harian </h5>
                            </div>
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H1</label>
                                <input type="text" class="form-control" id="edt_h1" name="edt_h1"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H2</label>
                                <input type="text" class="form-control" id="edt_h2" name="edt_h2"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H3</label>
                                <input type="text" class="form-control" id="edt_h3" name="edt_h3"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H4</label>
                                <input type="text" class="form-control" id="edt_h4" name="edt_h4"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H5</label>
                                <input type="text" class="form-control" id="edt_h5" name="edt_h5"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H6</label>
                                <input type="text" class="form-control" id="edt_h6" name="edt_h6"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H7</label>
                                <input type="text" class="form-control" id="edt_h7" name="edt_h7"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H8</label>
                                <input type="text" class="form-control" id="edt_h8" name="edt_h8"
                                    placeholder="">
                            </div><!--end form-group-->

                            {{-- <div class="col-md-1">
                                <label class="form-label" for="pro-message">RPH 2</label>
                                <input type="text" class="form-control" id="edt_d" name="edt_d"
                                    placeholder="">
                            </div><!--end form-group-->

                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">PTS 1</label>
                                <input type="text" class="form-control" id="edt_s" name="edt_s"
                                    placeholder="">
                            </div><!--end form-group-->

                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">PAS 1</label>
                                <input type="text" class="form-control" id="edt_ss" name="edt_ss"
                                    placeholder=""> --}}
                            </div><!--en form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">HPA</label>
                                <input type="text" class="form-control" id="edt_hpa" name="edt_hpa"
                                    placeholder="">
                            </div><!--en form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">PRE</label>
                                <input type="text" class="form-control" id="edt_pre" name="edt_pre"
                                    placeholder="">
                            </div><!--en form-group-->
                            <div class="col-md-12">
                                <label class="form-label" for="pro-message">Deskripsi Otomatis</label>
                                <textarea class="form-control" rows="5" id="edt_deskripsi" name="edt_deskripsi" placeholder=""></textarea>

                            </div><!--end form-group-->
                        </div>

                    </form>

                </div><!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="Sign Up" class="btn btn-primary">Simpan</button>
                </div>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div><!--end modal-->

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambah_keterampilan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title m-0" id="myExtraLargeModalLabel">Tambah Data</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><!--end modal-header-->
                <div class="modal-body">
                    <form autocomplete="off" class="needs-validation" novalidate="" method="POST">
                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="projectName">Nama Siswa:</label>
                                <input type="text" class="form-control" id="namasiswa" name="namasiswa"
                                    placeholder="Masukkan Nama Mahasiswa">
                            </div><!--end form-group-->
                            <div class="col-md-3">
                                <label class="form-label" for="pro-message">NIS/NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn"
                                    placeholder="Masukkan NIS/NISN">
                            </div><!--end form-group-->
                            <div class="col-md-3">
                                <label class="form-label" for="pro-message">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jeniskelamin" name="jeniskelamin"
                                    placeholder="Masukkan Jenis Kelamin">
                            </div><!--end form-group-->
                            <br>
                            <div class="col-md-12">
                                <h5> Penilaian Harian </h5>
                            </div>
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H1</label>
                                <input type="text" class="form-control" id="h1" name="h1"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H2</label>
                                <input type="text" class="form-control" id="h2" name="h2"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H3</label>
                                <input type="text" class="form-control" id="h3" name="h3"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H4</label>
                                <input type="text" class="form-control" id="h4" name="h4"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H5</label>
                                <input type="text" class="form-control" id="h5" name="h5"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H6</label>
                                <input type="text" class="form-control" id="h6" name="h6"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H7</label>
                                <input type="text" class="form-control" id="h7" name="h7"
                                    placeholder="">
                            </div><!--end form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">H8</label>
                                <input type="text" class="form-control" id="h8" name="h8"
                                    placeholder="">
                            </div><!--end form-group-->

                            {{-- <div class="col-md-1">
                                <label class="form-label" for="pro-message">RPH 2</label>
                                <input type="text" class="form-control" id="d" name="d"
                                    placeholder="">
                            </div><!--end form-group-->

                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">PTS 1</label>
                                <input type="text" class="form-control" id="s" name="s"
                                    placeholder="">
                            </div><!--end form-group-->

                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">PAS 1</label>
                                <input type="text" class="form-control" id="ss" name="ss"
                                    placeholder="">
                            </div><!--end form-group--> --}}
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">HPA</label>
                                <input type="text" class="form-control" id="hpa" name="hpa"
                                    placeholder="">
                            </div><!--en form-group-->
                            <div class="col-md-1">
                                <label class="form-label" for="pro-message">PRE</label>
                                <input type="text" class="form-control" id="pre" name="pre"
                                    placeholder="">
                            </div><!--en form-group-->
                            <div class="col-md-12">
                                <label class="form-label" for="pro-message">Deskripsi Otomatis</label>
                                <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi" placeholder=""></textarea>

                            </div><!--end form-group-->
                        </div>

                    </form>

                </div><!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="Sign Up" class="btn btn-primary">Simpan</button>
                </div>
            </div><!--end modal-content-->
        </div><!--end modal-dialog-->
    </div><!--end modal-->
@endsection 