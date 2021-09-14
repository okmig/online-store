<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Dashboard</title>
</head>
<body>
    @if (session('error'))
        <div class="text-center alert alert-warning">{{ session('error') }}</div>
    @endif
    <!-- Products table -->
    <div class="container-fluid mb-4">
        <div class="table-responsive">
            <table class="table">
            <caption style="caption-side:top" class="text-primary lead font-weight-bold">Products</caption>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>category_id</th>
                    <th>discount_id</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->discount_id }}</td>
                    <td class="col-1">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Update</button>
                            <div class="dropdown-menu">
                                <form action="/update/product/{{ $product->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" name="name" value="{{ $product->name }}" placeholder="name">
                                    <input type="text" name="description" value="{{ $product->description }}" placeholder="description">
                                    <input type="text" name="price" value="{{ $product->price }}" placeholder="price">
                                    <input type="text" name="quantity" value="{{ $product->quantity }}" placeholder="quantity">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="col-1">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Categories</button>
                            <div class="dropdown-menu">
                                <form action="/update/product/{{ $product->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    @foreach ($categories as $category)
                                    <div class="p-1">
                                        <input type="radio" name="category_id" value="{{ $category->id }}"> {{ $category->name }}
                                    </div>
                                    @endforeach
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="col-1">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Discounts</button>
                            <div class="dropdown-menu">
                                <form action="/update/product/{{ $product->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    @foreach ($discounts as $discount)
                                    <div class="p-1">
                                        <input type="radio" name="discount_id" value="{{ $discount->id }}"> {{ $discount->name }}
                                    </div> 
                                    @endforeach
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="col-1">
                        <form action="/delete/product/{{ $product->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Add Product</button>
                <div class="dropdown-menu">
                    <form action="/create/product" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="name">
                        <input type="text" name="description" placeholder="description">
                        <input type="text" name="price" placeholder="price">
                        <input type="text" name="quantity" placeholder="quantity">
                        <input class="btn btn-primary" type="submit" value="Add Product">
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <!-- Categories table -->
    <div class="container mb-4">
        <div class="table-responsive">
            <table class="table">
            <caption style="caption-side:top" class="text-primary lead font-weight-bold">Categories</caption>
                <tr>
                    <th>id</th>
                    <th>name</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="col-1">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Update</button>
                            <div class="dropdown-menu">
                                <form action="/update/category/{{ $category->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" name="name" value="{{ $category->name }}" placeholder="name">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="col-1">
                        <form action="/delete/category/{{ $category->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Add Category</button>
                <div class="dropdown-menu">
                    <form action="/create/category" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="name">
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Discounts table -->
    <div class="container mb-4">
        <div class="table-responsive">
            <table class="table">
            <caption style="caption-side:top" class="text-primary lead font-weight-bold">Discounts</caption>    
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>discount</th>
                    <th>status</th>
                </tr>
                @foreach ($discounts as $discount)
                <tr>
                    <td>{{ $discount->id }}</td>
                    <td>{{ $discount->name }}</td>
                    <td>{{ $discount->discount }}</td>
                    <td>{{ $discount->status }}</td>
                    <td class="col-1">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Update</button>
                            <div class="dropdown-menu">
                                <form action="/update/discount/{{ $discount->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" name="name" value="{{ $discount->name }}" placeholder="name">
                                    <input type="text" name="discount" value="{{ $discount->discount }}" placeholder="discount">
                                    <input type="text" name="status" value="{{ $discount->status }}" placeholder="status">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </form>
                            </div>
                        </div>    
                    </td>
                    <td class="col-1">
                        <form action="/delete/discount/{{ $discount->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Add Discount</button>
                <div class="dropdown-menu">
                    <form action="/create/discount" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="name">
                        <input type="text" name="discount" placeholder="discount">
                        <input type="text" name="status" placeholder="status">
                        <input class="btn btn-primary" type="submit" value="Add Discount">
                    </form>
                </div>
            </div>  
        </div>
    </div>
</body>
</html>