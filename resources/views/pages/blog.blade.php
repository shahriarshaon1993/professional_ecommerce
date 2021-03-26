@extends('layouts.app')

    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_responsive.css')}}">

@section('content')

@include('layouts.menubar')

        <!-- Home -->

        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll"
                data-image-src="{{ asset('public/frontend/images/shop_background.jpg')}}"></div>
            <div class="home_overlay"></div>
            <div class="home_content d-flex flex-column align-items-center justify-content-center">
                <h2 class="home_title">Technological Blog</h2>
            </div>
        </div>

        <!--End Home -->

        <!-- Blog -->

        <div class="blog">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="blog_posts d-flex flex-row align-items-start justify-content-between">

                            <!-- Blog post -->
                            @foreach($post as $item)

                                <div class="blog_post">
                                    <div class="blog_image" style="background-image:url({{ asset($item->post_image) }})"></div>

                                    @if (Session()->get('lang') == 'bangla')
                                        <div class="blog_text">{{ $item->post_title_bn }}</div>
                                        <div class="blog_button"><a href="{{ url('blog/single/'.$item->id) }}">পড়া চালিয়ে যান</a></div>
                                    @else
                                        <div class="blog_text">{{ $item->post_title_en }}</div>
                                        <div class="blog_button"><a href="{{ url('blog/single/'.$item->id) }}">Continue Reading</a></div>
                                    @endif

                                </div>

                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--End Blog -->

@endsection
