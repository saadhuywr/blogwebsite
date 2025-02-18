<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row mx-3 my-5 justify-content-center">
            <div class="col-md-12 border p-4">
                <div class="d-flex justify-content-between align-items-center my-2">
                    <h2><u><i>About Me</i></u></h2>
                    <a href="{{ route('about.index') }}" class="btn btn-outline-primary ms-auto">Create</a>
                </div>
                <hr>
                <div class="table-responsive table-striped text-nowrap">
                    <table class="table table-hover" border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>About ME</th>
                                <th>Small Description</th>
                                <th>Description</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>Whatsapp</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <img style="width: 100px;" src="{{ asset('uploads/' . $item->image) }}"
                                            alt="image" class="img-fluid">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->about_me }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $item->small_description }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $item->description }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $item->facebook }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $item->twitter }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $item->instagram }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $item->whatsapp }}</td>
                                    <td class="d-flex gap-2"><a href="{{ route('about.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('about.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
