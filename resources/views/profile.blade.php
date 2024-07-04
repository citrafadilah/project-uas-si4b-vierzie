@extends('layouts.user_type.auth')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <div class="page-header min-height-500 border-radius-xl mt-4"
                style="background-image: url('../assets/img/logo.png')">
                <span class="mask opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                APOTEK VIERZIE
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Melayani dengan hati, mengobati dengan obat
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-auto">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                Apotek Vierzie adalah apotek yang berkomitmen untuk
                                menyediakan obat-obatan berkualitas dan layanan kesehatan terbaik
                                bagi masyarakat. Kami selalu berusaha untuk memenuhi kebutuhan
                                kesehatan Anda dengan berbagai produk farmasi, obat bebas,
                                serta layanan konsultasi kesehatan.
                                <br>
                                <br>
                            <h6>
                                Visi :
                            </h6>
                            Menjadi apotek yang memberikan kontribusi dalam meningkatkan
                            kesehatan masyarakat dengan layanan profesional dan produk berkualitas.
                            <br>
                            <br>
                            <h6>
                                Misi :
                            </h6>
                            1. Mengutamakan keselamatan pasien dalam setiap pelayanan yang diberikan.
                            <br> 2. Memastikan stok obat selalu tersedia dan terjaga kualitasnya.
                            <br> 3. Menyediakan informasi kesehatan kepada masyarakat.
                            <br>
                            <br>
                            <h6>
                                Jam Operasional :
                            </h6>
                            Senin - Jumat: 07.00 - 22.00 WIB
                            <br>Sabtu - Minggu: 08.00 - 22.00 WIB</p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Owner
                                        :</strong> &nbsp; Vierzie</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile
                                        :</strong> &nbsp; +62 812-1234-1233</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email :</strong>
                                    &nbsp; info@apotekvierzie.com</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location
                                        :</strong> &nbsp; Jalan Urip Sumaharjo No.23, Kota Palembang, Kode Pos 0112</li>
                                <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                    <a class="btn btn-whatsapp btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-whatsapp fa-lg"></i>
                                    </a>
                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                        <i class="fab fa-instagram fa-lg"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
