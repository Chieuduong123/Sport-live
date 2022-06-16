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
    <a class="nav-link " data-toggle="tab" href="#tabs-1" role="tab">
        <div class="product__thumb__pic set-bg">
            <img src="{{ asset('images/' . $sport->image_path) }}" alt="" style="width: 20%;">
        </div>
    </a>
    <h4> {{ $sport->name }} </h4>
    <h3> {{ $sport->categories->name }}</h3>
    <p> {{ $sport->prices->price }}</p>
    <p> {{ $sport->describe }}</p>
    <p> {{ $sport->updated_at }}</p>
        <p>Images:</p>
        @foreach ($images as $image)
            <img src={{ asset('images/' . $image->image_path) }} class="img-responsive"
                style="max-height: 100px; max-width: 100px;" alt="" srcset="">
        @endforeach

</body>

</html>
