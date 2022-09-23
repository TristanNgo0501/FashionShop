@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Management</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Product Management</h2>
                        <a href="{{ route('product.create') }}" class="btn btn-outline-primary "> Add Product</a>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

@endsection
