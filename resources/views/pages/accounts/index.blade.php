@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center my-4 mt-2">
                        <h4 class="mb-0">Data Account</h4>
                        <a href="{{ route('account.create') }}" class="btn btn-sm btn-success"><i class='fa fa-plus-circle'></i> TAMBAH</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">NO.</th>
                                    <th class="text-center" scope="col">NAMA</th>
                                    <th class="text-center" scope="col">USER NAME</th>
                                    <th class="text-center" scope="col">EMAIL</th>
                                    <th class="text-center" scope="col">ROLE</th>
                                    <th class="text-center" scope="col" style="width: 20%">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $val)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->val_name }}</td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ $val->role->name}}</td>
                                        <td class="text-center">
                                            <form action="{{ route('account.delete', $val->id) }}" method="POST">
                                                <a href="{{ route('account.edit', $val->id) }}" class="btn btn-sm btn-primary" title="EDIT"><i class='fa fa-edit'></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="delete" class="btn btn-sm btn-danger" title="DELETE"><i class='fa fa-trash'></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

