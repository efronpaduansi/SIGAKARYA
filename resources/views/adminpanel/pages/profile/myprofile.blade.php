@extends('layouts.adminpanel')

@section('title')
    Profile
@endsection

@section('page-heading')
    Profile
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 100%;">
                                <img src="{{ asset('adminpanel/assets/compiled/jpg/2.jpg') }}" class="card-img-top" alt="profile-image">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $profile->name }}</h5>
                                    <p class="card-text">{{ $profile->email }}</p>
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#passModal"><i class="fas fa-lock"></i> Ubah Kata Sandi</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <p class="mb-4">Informasi Akun dan Kata Sandi</p>
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>:</td>
                                    <td>{{ $profile->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email Aktif</th>
                                    <td>:</td>
                                    <td>{{ $profile->email }}</td>
                                </tr>
                                <tr>
                                    <th>Bergabung pada</th>
                                    <td>:</td>
                                    <td>{{ $profile->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <th>Diperbaharui pada</th>
                                    <td>:</td>
                                    <td>{{ $profile->updated_at->diffForHumans() }}</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('adminpanel.pages.profile.pas_modal')
@endsection
