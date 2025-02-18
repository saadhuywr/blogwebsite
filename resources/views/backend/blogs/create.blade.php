<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            background-color: #f1f1f1;
            border-radius: 3px;
            padding: 5px 10px;
            font-size: 14px;
        }

        .tag span {
            margin-right: 5px;
        }

        .tag button {
            background: none;
            border: none;
            color: red;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-md-8 border p-4">
                <h2 class="text-center"><u><i>Create Blog</i></u></h2>
                <form action="{{ route('blogs.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" name="category_id" id="category_id">
                            <option disabled selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" required name="email" id="email"
                            placeholder="Add Email">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" required name="title" id="title"
                            placeholder="Add Title">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" required name="image[]" multiple id="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" required name="description" id="description" placeholder="Add Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" required name="content" id="content" placeholder="Add Content"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option disabled selected>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" required name="slug" id="slug"
                            placeholder="Add Slug">
                    </div>
                    <div class="mb-3">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" required name="meta_title" id="meta_title"
                            placeholder="Add Meta Title">
                    </div>
                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <input type="text" class="form-control" required name="meta_description"
                            id="meta_description" placeholder="Add Meta Description">
                    </div>
                    <div class="mb-3">
                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                        <div class="tags-container d-flex flex-wrap border p-2 rounded" id="tags-container">
                            <input type="text" class="form-control border-0 flex-grow-1" name="meta_keyword"
                                id="meta_keyword" placeholder="Add a tag and press Enter">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const tagsContainer = document.getElementById('tags-container');
        const tagsInput = document.getElementById('meta_keyword');

        let tags = [];

        // Function to add a tag
        function addTag(tag) {
            if (tag && !tags.includes(tag)) {
                tags.push(tag);

                const tagElement = document.createElement('div');
                tagElement.classList.add('tag');

                const span = document.createElement('span');
                span.textContent = tag;

                const removeButton = document.createElement('button');
                removeButton.textContent = 'x';
                removeButton.onclick = () => removeTag(tag, tagElement);

                tagElement.appendChild(span);
                tagElement.appendChild(removeButton);

                tagsContainer.insertBefore(tagElement, tagsInput);
                tagsInput.value = ''; // Clear input
            }
        }

        function removeTag(tag, element) {
            tags = tags.filter(t => t !== tag);
            tagsContainer.removeChild(element);
        }

        tagsInput.addEventListener('keydown', event => {
            if (event.key === 'Enter' || event.key === ',') {
                event.preventDefault();
                const tag = tagsInput.value.trim();
                addTag(tag);
            }
        });

        tagsInput.addEventListener('input', event => {
            tagsInput.value = tagsInput.value.replace(',', '');
        });

        // Before form submission, set tags in the input field
        const form = document.querySelector('form');
        form.addEventListener('submit', () => {
            tagsInput.value = tags.join(','); // Set tags as a comma-separated string
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
