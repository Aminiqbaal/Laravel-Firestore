@extends('layouts.master')

@section('title', 'Barang')

@section('content')
    <div class="section-header">
        <h1>@yield('title')</h1>
    </div>

    <div class="section-body">
        <div class="card">
            @if (Auth::check())
            <div class="card-header">
                <a href="{{ route('create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
            </div>
            @endif
            <div class="card-body">
                <table id="list-data" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="align-middle">#</th>
                            <th class="align-middle">Nama Barang</th>
                            @if (Auth::check())
                            <th class="align-middle">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                        <tr>
                            <td class="align-middle">{{ $key + 1 }}</td>
                            <td class="align-middle">{{ $item->name }}</td>
                            @if (Auth::check())
                            <td class="text-center align-middle">
                                <a href="{{ route('edit', ['item' => $item->id]) }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</a>
                                @if (Auth::user()->role == 'admin')
                                <form action="{{ route('destroy', ['item' => $item->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="far fa-trash-alt"></i> Delete</button>
                                </form>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
    {{-- SweetAlert --}}
    <link href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
@endpush

@push('js')
    {{-- Datatables --}}
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    {{-- SweetAlert --}}
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script>
        var MyTable = $('#list-data').dataTable()

        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
        })

        @if(Session::has('toast'))
            window.onload = function(){
                Toast.fire({
                    icon: "{{ Session::get('toast')[0] }}",
                    title: "{{ Session::get('toast')[1] }}"
                })
            }
        @endif
    </script>
@endpush
