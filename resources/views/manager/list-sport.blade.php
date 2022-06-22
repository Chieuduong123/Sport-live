<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Sports</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/css1.css') }}">
</head>

<body>
    @include('nav')
    <div class="container">

        <div class="row">
            <div class="">
                <h1 style="text-align: center; color: blueviolet"><strong>SPORTS</strong></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <form action="{{ route('sports.index') }}" method="GET" class="search-form">
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="search" id="search" placeholder="search">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </form>
            </div>
        </div>

        <div class="row col-md-12  custyle">
            <table class="table table-striped custab">
                <thead>
                    <a href="manager-add-sport" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new sport</a>
                    <tr>
                        <th class="text-center">Author</th>
                        <th>
                            @sortablelink('name', 'Name')</th>
                        <th>@sortablelink('category_id', 'Category')</th>
                        <th>Image</th>
                        <th>@sortablelink('price_id', 'Price')</th>
                        <th>@sortablelink('describe', 'Describe')</th>
                        <th>@sortablelink('updated_at', 'Date Update')</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                @foreach ($sports as $sport)
                    <tr>
                        <td>{{ $sport->users->name }}</td>
                        <td>{{ $sport->name }}</td>
                        <td>{{ $sport->categories->name }}</td>
                        <td>
                            <div class="img" style="background-image:"></div>
                            <a href="">
                                <img src="{{ asset('images/' . $sport->image_path) }}"
                                    style="width:100px;height:80px;">
                            </a>
                        </td>
                        <td>{{ $sport->prices->price }}</td>
                        <td>{{ $sport->describe }}</td>
                        <td>{{ $sport->updated_at }}</td>
                        <td class="text-center"><a class='btn btn-info btn-xs'
                                href="{{ route('manager.sports.edit', $sport->id) }}"><span
                                    class="glyphicon glyphicon-edit"></span> Edit</a> <a
                                onclick="return confirm('Are you sure?')"
                                href="{{ route('manager.sports.destroy', $sport->id) }}" class="btn btn-danger btn-xs"><span
                                    class="glyphicon glyphicon-remove"></span> Del</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="10" align="center">
                        {{ $sports->appends(request()->except('page'))->links('pagination::bootstrap-4') }}</td>
                </tr>

            </table>
        </div>
    </div>
</body>

</html>
