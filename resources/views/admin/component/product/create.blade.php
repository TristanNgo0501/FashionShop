@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div>
            <nav aria-label="breadcrumb" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Create</li>
                </ol>
            </nav>
            <div id="product__create" class="row" >
                <div class="col-12 col-md-8">
                    <h2>Product Creation</h2>
                </div>

            </div>
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="">
                </div>
                <div class="form-group">
                    <label for="original_price">Original Price</label>
                    <input type="text" name="original_price" class="form-control" id="original_price" placeholder="">
                </div>
                <div class="form-group">
                    <label for="selling_price">Selling Price</label>
                    <input type="text" name="selling_price" class="form-control" id="selling_price" placeholder="">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" class="form-control" id="quantity" placeholder="">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" class="form-control" id="category">
                        <option value="">Select Category</option>
                        @foreach($categories as $item)
                            <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <select name="size_id" class="form-control" id="size">
                        <option value="">Select Size</option>
                        @foreach($sizes as $item)
                            <option value="{{ $item->size_id }}">{{ $item->size_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <select name="brand_id" class="form-control" id="brand">
                        <option value="">Select Brand</option>
                        @foreach($brands as $item)
                            <option value="{{ $item->brand_id }}">{{ $item->brand_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image</label>
                    <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1" multiple>
                </div>
                <div class="form-group">
                    <label for="small_description">Short Description</label>
                    <textarea class="form-control ckeditor" name="small_description" id="small_description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control ckeditor" name="description" id="description" rows="3"></textarea>
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
