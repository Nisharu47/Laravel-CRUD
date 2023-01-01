<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Example Tutorial</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('category.create') }}"> Create Category</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Category Name</th>
                    <th>Quantity</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $cat)
                    <tr>
                        <td>{{ $category->firstItem() + $loop->iteration - 1 }}</td>
                        <td>{{ $cat->category_name }}</td>
                        <td>{{ $cat->quantity }}</td>
                        <td>
                            <form action="{{ route('category.delete',$cat->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('category.edit',$cat->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-6 ml-2">
                Showing {{$category->firstItem()}} - {{$category->lastItem()}} of
                {{$category->total()}}
            </div>
        </div>
        {!! $category->links() !!}
    </div>
</body>
</html>
