@extends('layouts.app')

    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_single_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_single_responsive.css')}}">

@section('content')

@include('layouts.menubar')

        <!-- Single Blog Post -->

        <div class="single_post">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

                        @if (Session()->get('lang') == 'bangla')
                            <div class="single_post_title">{!! $post->post_title_bn !!}</div>
                            <div class="single_post_text">{!! $post->details_bn !!}</div>
                        @else
                            <div class="single_post_title">{!! $post->post_title_en !!}</div>
                            <div class="single_post_text">{!! $post->details_en !!}</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <!--End Single Blog Post -->

@endsection
