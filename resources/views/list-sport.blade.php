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

        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar"></a>
            <form style="text-align: center" action="{{ route('sports.index') }}" method="GET" class="form-inline">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
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
                        <table class="table" id="myTable2">
                            <thead class="thead-primary">
                                <tr>
                                    <th onclick="sortTable(0)">Name</th>
                                    <th onclick="sortTable(1)">Category</th>
                                    <th>Image</th>
                                    <th onclick="sortTable(2)">Price</th>
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
                                            <a href="{{ route('detail', $sport->id) }}">
                                                <img src="{{ asset('images/' . $sport->image_path) }}"
                                                    style="width:100px;height:80px;">
                                            </a>
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
                                            <a class="btn btn-primary"
                                                href="{{ route('sports.edit', $sport->id) }}">EDIT</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                                href="{{ route('sports.destroy', $sport->id) }}">DELETE</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <td>
                            <a class="btn btn-primary" href="add-sport">ADD SPORT</a>
                        </td>
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
<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable2");
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {                       
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {   
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>

</html>
