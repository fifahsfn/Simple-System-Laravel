@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <h3>Laravel</h3>
        </div>
        <div class="col-lg-6 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('products.index') }}" method="GET">
        <div class="row">
            <div class="col-md-6 ">
                <input type="text" name="search" class="form-control" placeholder="Search by name or description">
            </div>
            <div class="col-md-6 text-right"> <!-- Adjusted this column to be right-aligned -->
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered" style="margin-top:20px;">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price (RM)</th>
            <th>Details</th>
            <th>Publish</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->amount }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->publish }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links()!!}

@endsection
