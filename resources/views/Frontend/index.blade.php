@extends('Frontend.layout.layout')

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
    {{-- latest post section --}}
    <section class="h_latest_post">
        <div class="container-fluid">
            <div class="row mx-lg-5">
                <div class="latest-heading mb-2">
                    <div>
                        <h2>Latest Post</h2>
                    </div>
                    <div class="form-group position-relative mb-4">
                        <input type="text" id="search-input" class="form-control pl-5"
                            placeholder="Search blogs by title">
                        <i class="fas fa-search position-absolute"
                            style="top: 45%; left: 200px; transform: translateY(-35%); color: #6c757d;"></i>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12 col-12">
                    <!-- Blog Cards Container -->
                    <div class="row" id="blog-container">
                        @foreach ($blogs as $index => $item)
                            <div class="col-md-12 col-lg-12 col-sm-12 col-12 mb-4 blog-card"
                                data-title="{{ $item->title }}" data-category="{{ $item->category->name }}"
                                style="display: {{ $index < 5 ? 'block' : 'none' }};">
                                <div class="card shadow border-0">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-md-4 col-lg-4">
                                            @php
                                                $images = json_decode($item->image, true);
                                                $firstImage =
                                                    is_array($images) && !empty($images) ? $images[0] : 'default.jpg';
                                            @endphp
                                            <img src="{{ asset('uploads/' . $firstImage) }}" class="img-fluid rounded-start"
                                                alt="Blog Image">
                                        </div>
                                        <div class="col-md-8 col-lg-8">
                                            <div class="card-body">
                                                <div class="mb-2 align-items-center">
                                                    <span
                                                        class="badge bg-danger me-2">{{ $item->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                    <span class="badge bg-danger">{{ $item->category->name }}</span>
                                                </div>
                                                <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                                                <p class="text-muted small mb-2">
                                                    <i class="bi bi-envelope"></i> {{ $item->email }} |
                                                    <i class="bi bi-calendar"></i>
                                                    {{ $item->created_at->format('F d, Y') }} |
                                                    <i class="bi bi-chat-dots"></i> No Comments
                                                </p>
                                                <p class="card-text text-truncate">
                                                    {{ $item->description }}
                                                </p>
                                                <a href="{{ route('singlepost', ['id' => $item->id]) }}"
                                                    class="text-primary text-center fw-bold">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-3">
                        <button id="load-more-btn" class="btn btn-outline-primary">Load More</button>
                    </div>
                </div>


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
                                            <div class="col-md-12 col-lg-4 col-sm-4 col-4">
                                                @php
                                                    $images = json_decode($blog->image, true);
                                                    $firstImage =
                                                        is_array($images) && !empty($images)
                                                            ? $images[0]
                                                            : 'default.jpg';
                                                @endphp
                                                <img class="img-fluid" src="{{ asset('uploads/' . $firstImage) }}" alt="First Image">
                                            </div>
                                            <div class="col-md-12 col-lg-8 col-sm-8 col-8">
                                                <div class="card-body">
                                                    <h6 class="card-title name text-truncate">{{ $blog->title }}</h6>
                                                    <span>{{ $blog->created_at->format('F d, Y') }}</span>
                                                    <a href="{{ route('singlepost', ['id' => $blog->id]) }}">Read More</a>
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
    </section>

    {{-- Category Section --}}
    <section class="h_category_section">
        <div class="container-fluid">
            <div class="row mx-lg-5">
                <div class="category_heading">
                    <h2>Categories</h2>
                </div>
                <ul class="nav nav-tabs">
                    @foreach ($categories as $key => $item)
                        <li class="nav-item">
                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="category-tab-{{ $item->id }}"
                                data-bs-toggle="tab" href="#category-{{ $item->id }}">
                                {{ $item->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content mt-3">
                    @foreach ($categories as $key => $item)
                        <div class="tab-pane fade {{ $key == 0 ? 'active show' : '' }}"
                            id="category-{{ $item->id }}">
                            <div class="row g-3">
                                @foreach ($blogs->where('category_id', $item->id) as $blog)
                                    <div class="col-md-3 col-lg-3 col-sm-12 col-12">
                                        <a href="{{ route('singlepost', ['id' => $blog->id]) }}"
                                            aria-label="View details for {{ $blog->title }}">
                                            <div class="card shadow border" style="height: 360px;">
                                                <div class="img-fluid">
                                                    @php
                                                        $images = json_decode($blog->image, true);

                                                        $firstImage =
                                                            is_array($images) && count($images) > 0
                                                                ? $images[0]
                                                                : 'default.jpg';
                                                    @endphp

                                                    <img style="aspect-ratio:4/3;" src="{{ asset('uploads/' . $firstImage) }}"
                                                        class="img-fluid rounded-start" alt="Blog Image">


                                                </div>
                                                <div class="card-body">
                                                    <span class="badge bg-danger">{{ $blog->category->name }}</span>
                                                    <span
                                                        class="badge bg-danger">{{ $blog->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                    <h5 class="card-title">{{ $blog->title }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
