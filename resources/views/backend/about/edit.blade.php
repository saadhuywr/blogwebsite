<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-md-8 border p-4">
                <h2 class="text-center"><u><i>About Me</i></u></h2>
                <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $about->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">About ME</label>
                        <input type="text" name="about_me" class="form-control" id="exampleInputPassword1" value="{{ $about->about_me }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">small description</label>
                        <textarea name="small_description" class="form-control" id="exampleInputPassword1">{{ $about->small_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="exampleInputPassword1">{{ $about->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Facebook</label>
                        <input type="text" name="facebook" class="form-control" id="exampleInputPassword1" value="{{ $about->facebook }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Twitter</label>
                        <input type="text" name="twitter" class="form-control" id="exampleInputPassword1" value="{{ $about->twitter }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Instagram</label>
                        <input type="text" name="instagram" class="form-control" id="exampleInputPassword1" value="{{ $about->instagram }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Whatsapp</label>
                        <input type="text" name="whatsapp" class="form-control" id="exampleInputPassword1" value="{{ $about->whatsapp }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
