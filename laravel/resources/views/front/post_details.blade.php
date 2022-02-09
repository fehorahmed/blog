@extends('front.layout.main')
@section('title', $data->title)

@section('content')



    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Post Details</h4>
                            <h2>Single blog post</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->

    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('images/post') . '/' . $data->full_img }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>Lifestyle</span>
                                        <a href="post-details.html">
                                            <h4>{{ $data->title }}</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a>{{ $data->user_id == 0 ? 'Admin' : 'User' }}</a></li>
                                            <li><a>{{ date_format($data->created_at, 'M d Y ') }}</a></li>
                                            <li><a href="#">10 Comments</a></li>
                                        </ul>
                                        <p>{{ $data->detail }}</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Best Templates</a>,</li>
                                                        <li><a href="#">TemplateMo</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li><i class="fa fa-share-alt"></i></li>
                                                        <li><a href="#">Facebook</a>,</li>
                                                        <li><a href="#"> Twitter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>{{count($data->comments)}} comments</h2>

                                    </div>
                                    <div class="content">
                                        <ul>

                                            @if ($data->comments)
                                                @foreach ($data->comments as $comment)
                                                    <li class="d-block">
                                                        <div class="author-thumb">
                                                            <img src="assets/images/comment-author-01.jpg" alt="">
                                                        </div>
                                                        <div class="right-content">
                                                            <h4>Charles Kate<span>May 16, 2020</span></h4>
                                                            <p>{{$comment->comment}}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Your comment</h2>
                                    </div>
                                    <div class="content">
                                        <form id="comment" action="#" method="post">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <textarea name="message" rows="4" id="message"
                                                            placeholder="Type your comment" required=""></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit"
                                                            class="main-button">Submit</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
