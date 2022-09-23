@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category Management</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Category Management</h2>
                        <a href="{{ route('category.create') }}" class="btn btn-outline-primary "> Add Category</a>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
