@extends('layouts.master')

@section('title', 'Buat CV')

@section('content')
    <div class="section-header">
        <h1>@yield('title')</h1>
    </div>

    <div class="section-body">
        <div class="card">
            @if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('store.cv') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Nama Anda</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="specialization">Spesialisasi</label>
                                    <input type="text" class="form-control" id="specialization" name="specialization" value="{{ old('specialization') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profile">Profil</label>
                            <textarea class="form-control summernote-simple" id="profile" name="profile" required>{{ old('profile') }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="whatsapp">Whatsapp</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control summernote-simple" id="address" name="address" required>{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="skills">Soft Skill (pisahkan dengan tanda '|')</label>
                            <input type="text" class="form-control" id="skills" name="skills" value="{{ old('skills') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="portofolio">Link Portofolio</label>
                            <input type="text" class="form-control" id="portofolio" name="portofolio" value="{{ old('portofolio') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        Format pengisian untuk seluruh form di bagian kanan ini:
                        <ul>
                            <li>Untuk tiap baris: tahun_judul_keterangan</li>
                            <li>Pisahkan baris dengan tanda '|'</li>
                            <li>Contoh: 2010-2013_SMK_TKJ | 2013-2017_Universitas_Teknik</li>
                        </ul>

                        <div class="form-group">
                            <label for="education">Pendidikan</label>
                            <textarea class="form-control" name="education" id="education" style="height: 100px">{{ old('education') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="organization">Pengalaman Organisasi</label>
                            <textarea class="form-control" name="organization" id="organization" style="height: 100px">{{ old('organization') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="committee">Pengalaman Kepanitiaan</label>
                            <textarea class="form-control" name="committee" id="committee" style="height: 100px">{{ old('committee') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="appreciation">Penghargaan</label>
                            <textarea class="form-control" name="appreciation" id="appreciation" style="height: 100px">{{ old('appreciation') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.css') }}">
@endpush

@push('js')
<script src="{{ asset('vendor/summernote/summernote-bs4.js') }}"></script>
@endpush
