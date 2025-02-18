<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row mx-3 my-5 justify-content-center">
            <div class="col-md-12 border p-4">
                <div class="d-flex justify-content-between align-items-center my-2">
                    <h2><u><i>Blogs</i></u></h2>
                    <a href="{{ route('blogs.index') }}" class="btn btn-outline-primary ms-auto">Create</a>
                </div>
                <hr>
                <div class="table-responsive table-striped text-nowrap">
                    <table class="table table-hover" border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Slug</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keyword</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->category_id }}</td>
                                    <td>{{ $blog->email }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $blog->title }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $blog->image }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $blog->description }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $blog->content }}</td>
                                    <td>{{ $blog->status }}</td>
                                    <td>{{ $blog->slug }}</td>
                                    <td>{{ $blog->meta_title }}</td>
                                    <td style="max-width:19rem;overflow:auto">{{ $blog->meta_description }}</td>
                                    <td>{{ $blog->meta_keyword }}</td>
                                    <td class="d-flex gap-2"><a href="{{ route('blogs.edit', $blog->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
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
