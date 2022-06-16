<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD SPORT</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <form class="form-horizontal" action="{{ url('sports-create') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
            <!-- Form Name -->
            <legend style="text-align: center; color: blueviolet"><strong>ADD SPORTS</strong></legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_name">SPORT NAME</label>
                <div class="col-md-4">
                    <input id="product_name" name="name" placeholder="SPORT NAME" class="form-control input-md"
                        type="text">
                    <span style="color: red;" class="error-message">{{ $errors->first('name') }}</span></p>
                </div>
            </div>


            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_categorie">SPORT CATEGORY</label>
                <div class="col-md-4">
                    <select id="product_categorie" name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="filebutton">MAIN IMAGE</label>
                <div class="col-md-4">
                    <input name="image_path" id="filebutton" name="image_path" class="input-file" type="file">
                    <span style="color: red;" class="error-message">{{ $errors->first('image_path') }}</span></p>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_categorie">SPORT PRICE</label>
                <div class="col-md-4">
                    <select id="product_categorie" name="price_id" class="form-control">
                        @foreach ($prices as $price)
                            <option value="{{ $price->id }}">{{ $price->price }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_description">SPORT DESCRIBE</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="product_description" name="describe"></textarea>
                    <span style="color: red;" class="error-message">{{ $errors->first('describe') }}</span></p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="filebutton">IMAGE ITEMS</label>
                <div class="col-md-4">
                    <input id="filebutton" name="images[]" class="input-file" type="file" multiple>
                    <span style="color: red;" class="error-message">{{ $errors->first('images[]') }}</span></p>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">ADD</button>
                </div>
            </div>


        </fieldset>
    </form>
</body>

</html>
