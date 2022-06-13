<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
</head>

<body>
    <form style="width: 1000px" action="{{ url('sports-update', $sport->id) }}" method="POST"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlInput1">Sport Name</label>
            <input type="text" name="name" value="{{ $sport->name }}" class="form-control"
                id="exampleFormControlInput1" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">ID Category</label>
            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="hinhanh">Image</label>
            <input type="file" value="{{ $sport->image_path }}" name="image_path" id="hinhanh"
                class="form-control-file " style="border: 1px solid rgb(187, 179, 179);">
            <img src="{{ asset('images/' . $sport->image_path) }}" width=" 300px">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">ID Price</label>
            <select class="form-control" name="price_id" id="exampleFormControlSelect1">
                @foreach ($prices as $price)
                    <option value="{{ $price->id }}">{{ $price->price }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Describe</label>
            <input class="form-control" name="describe" value="{{ $sport->describe }}"
                id="exampleFormControlTextarea1" rows="3">
        </div>
        <button type="submit" class="btn btn-success " style="font-size: 18;padding: 5px;"> EDIT </button>
    </form>
</body>

</html>
