@extends('layouts.admin.app')

@section('title', 'Peserta')

@section('content')
    <div class="d-flex flex-column gap-1">
        <div>
            <h1>
                Data Peserta
            </h1>
            <a href="{{ route('admin.peserta.create') }}" class="btn btn-primary">
                Tambah Data <i class="bi bi-database-add"></i>
            </a>
        </div>
        <table class="table" id="pesertaTable" class="table table-bordered" style="width:100%">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Group</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($pesertas as $item)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->group }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.peserta.edit', ['id' => $item->id]) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.peserta.delete', ['id' => $item->id]) }}">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $pesertas->links() }}
        </div>
    </div>
@endsection
