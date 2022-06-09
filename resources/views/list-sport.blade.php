<!doctype html>
<html lang="en">

<head>
    <title>List Sport</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section">List Sport</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="h5 mb-4 text-center">Table Sport</h3>
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Date Update</th>
                                    <th>Action</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sports as $sport)
                                    <tr class="alert" role="alert">
                                        <td>
                                            <div class="email">
                                                <span>{{ $sport->name }}</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="email">
                                                <span>{{ $sport->categories->name }}</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="img" style="background-image:"></div>
                                            <img src="{{ $sport->image_path }}">
                                        </td>
                                        <td>{{ $sport->prices->price }}</td>
                                        <td>
                                            <div class="email">
                                                <span>{{ $sport->describe }}</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="email">
                                                <span>{{ $sport->updated_at }}</span>

                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary">EDIT</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="">DELETE</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $sports->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
