<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Product list for Ecommerce Website</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>

<body>
    @include('nav')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <h3>
                        SPORTS</h3>
                </div>
            </div>

            <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            @foreach ($sports as $sport)
                                <div class="col-sm-3">
                                    <div class="col-item">
                                        <div class="photo">
                                            <img src="{{ asset('images/' . $sport->image_path) }}"
                                                class="img-responsive" alt="a" />
                                        </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="price col-md-6">
                                                    <h5>
                                                        {{ $sport->name }}</h5>
                                                    <h5 class="price-text-color">
                                                        ${{ $sport->prices->price }}</h5>
                                                </div>
                                                <div class="rating hidden-sm col-md-6">
                                                    <i class="price-text-color fa fa-star"></i><i
                                                        class="price-text-color fa fa-star">
                                                    </i><i class="price-text-color fa fa-star"></i><i
                                                        class="price-text-color fa fa-star">
                                                    </i><i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <p class="btn-add">
                                                    <i class="fa fa-shopping-cart"></i><a
                                                        href="http://www.jquery2dotnet.com" class="hidden-sm">Add to
                                                        cart</a>
                                                </p>
                                                <p class="btn-details">
                                                    <i class="fa fa-list"></i><a
                                                        href="{{ route('detail', $sport->id) }}"
                                                        class="hidden-sm">More details</a>
                                                </p>
                                            </div>
                                            <div class="clearfix">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $sports->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

</body>

</html>
