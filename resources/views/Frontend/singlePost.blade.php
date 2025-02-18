@extends('frontend.layout.layout')

@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide h_carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/blog1.jpg') }}" class="d-block w-100" alt="{{ asset('img/blog1.jpg') }}">
                <div class="card-img-overlay">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/blog2.png') }}" class="d-block w-100" alt="{{ asset('img/blog2.png') }}">
                <div class="card-img-overlay">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/blog3.jpg') }}" class="d-block w-100" alt="{{ asset('img/blog3.jpg') }}">
                <div class="card-img-overlay">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </div>
    <section class="sp_single_post">
        <div class="container-fluid">
            <div class="row mx-lg-5">
                {{-- single post --}}
                <div class="col-md-9 col-lg-9 col-sm-12 col-12 p-3 bg-white shadow rounded">
                    {{-- left_side --}}
                    <div class="left_side">
                        <div>
                            @if (!empty($images) && isset($images[0]))
                                <img src="{{ asset('uploads/' . $images[0]) }}" alt="First Image" loading="lazy">
                            @endif
                        </div>
                        <div class="post_info">
                            <h2 class="post_title">{{ $blog->title }}</h2>
                            <div class="d-flex gap-2 align-items-center">
                                <span>By: {{ $blog->email }}</span> |
                                <span><i class="fa-regular fa-clock"></i> {{ $blog->created_at->format('F d, Y') }}</span> |
                                <span><i class="fa-regular fa-comments"></i>
                                    {{ $comments->count() }} Comment</span>
                            </div>
                            <p class="post_description">{{ $blog->description }}</p>
                        </div>
                        {{-- images 3 --}}
                        <div class="row images_sec">
                            <div class="col-md-6 col-lg-6 d-flex gap-3 col-sm-12 col-12">
                                @if (!empty($images))
                                    @foreach (array_slice($images, 1, 2) as $image)
                                        <img style="aspect-ratio:16 / 4;" class="img-fluid rounded"
                                            src="{{ asset('uploads/' . $image) }}" alt="Other Image">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div>
                            <p class="post_content">{{ $blog->content }}</p>
                            <h5 class="post_meta_title">{{ $blog->meta_title }}</h5>
                            <p class="post_meta_description">{{ $blog->meta_description }}</p>
                            @php
                                $keywords = explode(',', $blog->meta_keyword);
                            @endphp

                            @foreach ($keywords as $keyword)
                                <span class="post_meta_keywords">{{ trim($keyword) }}</span>
                            @endforeach

                        </div>
                    </div>
                    <hr>
                    {{-- comments section --}}
                    <div class="comments_section mt-4">
                        <h3 class="comments_title">Comments</h3>
                        @if ($comments->count() > 0)
                            @foreach ($comments as $comment)
                                <div class="card shadow border-0 p-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="user_img">
                                                <img src="{{ asset('uploads/' . $comment->user->image) }}"
                                                    alt="{{ $comment->user->name }}">
                                            </div>
                                            <div class="user_info">
                                                <h5 class="user_name">{{ $comment->user->name }}</h5>
                                                <p class="user_comment">{{ $comment->comment }}</p>
                                                <span
                                                    class="comment_date">{{ $comment->created_at->format('F d, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if ($comments->count() > 5)
                                <a href="{{ route('singlepost', ['id' => $blog->id]) }}#comments"
                                    class="btn btn-primary mt-3">View More</a>
                            @endif
                        @endif
                    </div>
                    {{-- comment form section --}}
                    <div class="comment_form">
                        <h3 class="comments_title">Leave a Comment</h3>

                        @if (Auth::check())
                            <form action="{{ route('comments.store', ['id' => $blog->id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control mb-3"
                                        value="{{ Auth::user()->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control mb-3"
                                        value="{{ Auth::user()->email }}" readonly>
                                </div>

                                <!-- Comment Field -->
                                <div class="form-group">
                                    <textarea name="comment" id="comment" class="form-control mb-3" rows="3" placeholder="Write a comment..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @else
                            <p class="text-center">You need to be logged in to comment.</p>
                        @endif
                    </div>

                </div>
                {{-- right_side --}}
                <div class="col-md-3 col-lg-3 col-sm-12 col-12 arthor_d">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body arthor_detail">
                                    <h5 class="arthor_name">{{ $aboutme->name }}</h5>
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="arthor_img">
                                            <img src="{{ asset('uploads/' . $aboutme->image) }}"
                                                alt="{{ $aboutme->name }}">
                                        </div>
                                        <div class="arthor_name_inner">
                                            <h6>{{ $aboutme->name }}</h6>
                                            <p>{{ $aboutme->about_me }}</p>
                                            <p>
                                                {{ $aboutme->small_description }}
                                            </p>
                                            <div class="arthor_social d-flex gap-3 justify-content-center">
                                                <a href="{{ $aboutme->facebook }}"><i
                                                        class="fa-brands fa-square-facebook fs-2"
                                                        style="color: #5195fe;"></i></a>
                                                <a href="{{ $aboutme->instagram }}"><i
                                                        class="fa-brands fa-square-instagram fs-2"
                                                        style="color: #5463d6;"></i></a>
                                                <a href="{{ $aboutme->whatsapp }}"><i
                                                        class="fa-brands fa-square-whatsapp fs-2"
                                                        style="color: #25d366;"></i></a>
                                                <a href="{{ $aboutme->twitter }}"><i class="fab fa-square-twitter fs-2"
                                                        style="color:#0dcaf0"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-4 Recent_Post">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <h5 class="card-title">Recent Post</h5>
                                    <div class="row gap-0 p-0 m-0 align-items-center">
                                        @foreach ($recent_blogs as $blog)
                                            <div class="col-md-4 col-lg-4 col-sm-4 col-4">
                                                @php
                                                    $images = json_decode($blog->image, true);
                                                    $firstImage =
                                                        is_array($images) && !empty($images)
                                                            ? $images[0]
                                                            : 'default.jpg';
                                                @endphp
                                                <img src="{{ asset('uploads/' . $firstImage) }}" alt="First Image">
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-sm-8 col-8">
                                                <div class="card-body">
                                                    <h6 class="card-title name text-truncate">{{ $blog->title }}</h6>
                                                    <span>{{ $blog->created_at->format('F d, Y') }}</span>
                                                    <a href="{{ route('singlepost', ['id' => $blog->id]) }}">read
                                                        more</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-12 mt-4 categories">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <h5 class="card-title categories-title">Categories</h5>
                                        <div class="row gap-0 mt-3">
                                            @foreach ($categories as $category)
                                                <a href="{{ route('category', $category->name) }}">
                                                    <div class="col-12">
                                                        <div
                                                            class="category-item d-flex justify-content-between align-items-center">
                                                            <span class="category-name ">
                                                                {{ $category->name }}
                                                            </span>
                                                            <span
                                                                class="category-count
                                                            {{ $category->name }}">
                                                                ({{ $category->blogs->count() }})
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
