@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div>
            <nav aria-label="breadcrumb" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Category Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category Create</li>
                </ol>
            </nav>
            <div id="product__create" class="row" >
                <div class="col-12 col-md-8">
                    <h2>Category Creation</h2>
                </div>

            </div>
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="category_name">Name</label>
                    <input type="text" name="category_name" class="form-control" @error('category_name') is-invalid @enderror" id="category_name" placeholder="">
                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" @error('slug') is-invalid @enderror" id="slug" placeholder="">
                    @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input name="image" type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" multiple>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control ckeditor" name="description" @error('description') is-invalid @enderror" id="description" rows="3"></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="checkbox" name="status"  id="status" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
@section('myjs')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection
