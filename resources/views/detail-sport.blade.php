<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                <img src="{{ asset('images/' . $sport->image_path) }}" />
                            </div>
                        </div>

                        <ul class="preview-thumbnail nav nav-tabs">
                            @foreach ($images as $image)
                                <li class="active"><a data-target="#pic-1" data-toggle="tab">
                                        <img src="{{ asset('images/' . $image->image_path) }}" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $sport->name }}</h3>
                        <p class="product-description">{{ $sport->describe }}</p>
                        <h4 class="price">current price: <span>${{ $sport->prices->price }}</span></h4>
                        <p class="vote"><strong>Category Name: </strong> {{ $sport->categories->name }}</p>
                        <br>
                        <h5 class="">Update Date: {{ $sport->updated_at }} </h5><br><br>
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                            <button class="like btn btn-default" type="button">
                                <span class="fa fa-heart"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
