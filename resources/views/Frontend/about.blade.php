@extends('frontend.layout.layout')

@section('content')
    <div class="a_section-1">
        <div class="container-fluid">
            <div class="row my-4 mx-lg-5">
                <div class="col-md-9 col-lg-9 col-sm-12 col-12 p-4 bg-white shadow rounded">
                    <div class="left_side">
                        <div class="a_img">
                            <img src="{{ asset('uploads/' . $aboutme->image) }}" class="img-fluid " alt="about" loading="lazy">
                        </div>
                        <div class="a_info">
                            <p class="a_info_text">
                                {{ $aboutme->description }}
                            </p>
                            <h5>About Me And My Project:</h5>
                            <div class="a_description">
                                <p class="a_description_text_1">Remain lively hardly needed at do by. Two you fat downs
                                    fanny three. True mr gone most at. Dare as name just when with it body. Travelling
                                    inquietude she increasing off impossible the. Cottage be noisier looking to we promise
                                    on. <b style="color: red">Disposal to kindness appetite diverted learning of on
                                        raptures.</b> Betrayed any may returned now dashwood formerly. Balls way delay shy
                                    boy man views.</p>
                                <p class="a_description_text_2">He do subjects prepared bachelor juvenile ye oh. He feelings
                                    removing informed he as ignorant we prepared. Evening do forming observe spirits is in.
                                    Country hearted be of justice sending. On so they as with room cold ye. Be call four my
                                    went mean. Celebrated if remarkably especially an.</p>
                            </div>
                            <div class="a_poet">
                                <h5>If you look at what you have in life, you’ll always have more. If you look at what you
                                    don’t have in life, you’ll never have enough. </h5>
                                <h5>– Oprah Winfrey</h5>
                            </div>
                            <div class="a_last_description py-2">
                                <p>He do subjects prepared bachelor juvenile ye oh. He feelings removing informed he as
                                    ignorant we prepared. Evening do forming observe spirits is in. <b
                                        style="color: red">Country hearted be of
                                        justice sending.</b> On so they as with room cold.</p>
                            </div>
                        </div>
                        <hr>
                        <div class="a_social">
                            <div class="a_social_icon d-flex justify-content-center gap-3">
                                <a href="{{ $aboutme->facebook }}"><i class="fa-brands fa-square-facebook fs-2"
                                        style="color: #5195fe;"></i></a>
                                <a href="{{ $aboutme->instagram }}"><i class="fa-brands fa-square-instagram fs-2"
                                        style="color: #5463d6;"></i></a>
                                <a href="{{ $aboutme->whatsapp }}"><i class="fa-brands fa-square-whatsapp fs-2"
                                        style="color: #25d366;"></i></a>
                                <a href="{{ $aboutme->twitter }}"><i class="fab fa-square-twitter fs-2" style="color:#0dcaf0"></i></a>
                            </div>
                        </div>
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
                                            <img src="{{ asset('uploads/' . $aboutme->image) }}" alt="">
                                        </div>
                                        <div class="arthor_name_inner">
                                            <h6>{{ $aboutme->name }}</h6>
                                            <p>{{ $aboutme->about_me }}</p>
                                            <p>
                                                {{ $aboutme->small_description }}
                                            </p>
                                            <div class="arthor_social d-flex gap-3 justify-content-center">
                                                <a href="{{ $aboutme->facebook }}"><i class="fa-brands fa-square-facebook fs-2"
                                                    style="color: #5195fe;"></i></a>
                                            <a href="{{ $aboutme->instagram }}"><i class="fa-brands fa-square-instagram fs-2"
                                                    style="color: #5463d6;"></i></a>
                                            <a href="{{ $aboutme->whatsapp }}"><i class="fa-brands fa-square-whatsapp fs-2"
                                                    style="color: #25d366;"></i></a>
                                            <a href="{{ $aboutme->twitter }}"><i class="fab fa-square-twitter fs-2" style="color:#0dcaf0"></i></a>
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
                                    <div class="row align-items-center">
                                        @foreach ($recent_blogs as $blog)
                                            <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                                                @php
                                                    $images = json_decode($blog->image, true);
                                                    $firstImage =
                                                        is_array($images) && !empty($images)
                                                            ? $images[0]
                                                            : 'default.jpg';
                                                @endphp
                                                <img src="{{ asset('uploads/' . $firstImage) }}" alt="First Image">
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-sm-12 col-12">
                                                <div class="card-body">
                                                    <h6 class="card-title name">{{ $blog->title }}</h6>
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
    </div>
@endsection
