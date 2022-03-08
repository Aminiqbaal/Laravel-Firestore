@extends('layouts.master')

@section('title', 'Ubah Barang')

@section('content')
    <div class="section-header">
        <h1>@yield('title')</h1>
    </div>

    <div class="section-body">
        <div class="card col-6">
            @if ($errors->any())
            <div class="alert alert-danger mt-3" role="alert">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('update', ['item' => $item->id]) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="card-header">
                    <div class="text-muted">
                        <a href="{{ route('index') }}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
