<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sports</title>
    <link rel="stylesheet" href="{{ asset('css/css1.css') }}">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a target="_blank" href="#" class="navbar-brand"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        @if (Auth::check())
                            <a href="{{ Auth::user()->id }}" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span>
                                <strong>{{ Auth::user()->name }}</strong>
                            </a>
                    </li>
                    <li class="dropdown">
                        <a onclick="return confirm('Are you sure?')" href="{{ route('logout') }}">
                            Log Out
                        </a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <br><br><br>
</body>

</html>
