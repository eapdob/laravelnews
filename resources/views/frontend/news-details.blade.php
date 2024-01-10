@extends('frontend.layouts.app')

@section('title', $news->title)
@section('meta_description', $news->meta_description)
@section('meta_og_title', $news->meta_title)
@section('meta_og_description', $news->meta_description)
@section('meta_og_image', asset($news->image))
@section('meta_tw_title', $news->meta_title)
@section('meta_tw_description', $news->meta_description)
@section('meta_tw_image', asset($news->image))

@section('content')
    <section class="pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a href="{{ url('/') }}" class="breadcrumbs__url">
                                <i class="fa fa-home"></i> {{ __('frontend.home') }}
                            </a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="javascript:void(0);" class="breadcrumbs__url">{{ __('frontend.views') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="wrap__article-detail">
                        <div class="wrap__article-detail-title">
                            <h1>
                                {!! $news->title !!}
                            </h1>
                        </div>
                        <hr>
                        <div class="wrap__article-detail-info">
                            <ul class="list-inline d-flex flex-wrap justify-content-start">
                                <li class="list-inline-item">
                                    {{ __('frontend.by') }}
                                    <a href="#">
                                        {{ $news->author->name }}
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                <span class="text-dark text-capitalize ml-1">
                                    {{ date('M D, Y', strtotime($news->created_at)) }}
                                </span>
                                </li>
                                <li class="list-inline-item">
                                <span class="text-dark text-capitalize">
                                    {{ __('frontend.in') }}
                                </span>
                                    <a href="#">
                                        {{ $news->category->name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="wrap__article-detail-image mt-4">
                            <figure>
                                <img src="{{ asset($news->image) }}" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="wrap__article-detail-content">
                            <div class="total-views">
                                <div class="total-views-read">
                                    {{ convertToKFormat($news->views) }}
                                    <span>
                                        {{ __('frontend.views') }}
                                    </span>
                                </div>
                                <ul class="list-inline">
                                    <span class="share">{{ __('frontend.share_on') }}</span>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o facebook"
                                           href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                           target="_blank">
                                            <i class="fa fa-facebook-f"></i>
                                            <span>{{ __('frontend.facebook') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o twitter"
                                           href="https://twitter.com/intent/tweet?text={{ $news->title }}&url={{ url()->current() }}"
                                           target="_blank">
                                            <i class="fa fa-twitter"></i>
                                            <span>{{ __('frontend.twitter') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o whatsapp"
                                           href="https://wa.me/?text={{ $news->title }}%20{{ url()->current() }}"
                                           target="_blank">
                                            <i class="fa fa-whatsapp"></i>
                                            <span>{{ __('frontend.whatsapp') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o telegram"
                                           href="https://t.me/share/url?url={{ url()->current() }}&text={{ $news->title }}"
                                           target="_blank">
                                            <i class="fa fa-telegram"></i>
                                            <span>{{ __('frontend.telegram') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-linkedin-o linkedin"
                                           href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $news->title }}"
                                           target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                            <span>{{ __('frontend.linkedin') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <p class="has-drop-cap-fluid">
                                {!! $news->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="blog-tags">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <i class="fa fa-tags">
                                </i>
                            </li>
                            @foreach ($news->tags as $tag)
                                <li class="list-inline-item">
                                    <a href="{{ route('news', ['tag' => $tag->name]) }}">
                                        #{{ $tag->name }} ({{ $tag->count }})
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="wrap__profile">
                        <div class="wrap__profile-author">
                            <figure>
                                <img style="width: 200px;height: 200px;object-fit: cover;"
                                     src="{{ asset($news->author->image) }}" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <div class="wrap__profile-author-detail">
                                <div class="wrap__profile-author-detail-name">{{ $news->author->name }}</div>
                                <h4>{{ $news->author->name }}</h4>
                                <p></p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o facebook ">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o twitter ">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o instagram ">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o telegram ">
                                            <i class="fa fa-telegram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="btn btn-social btn-social-o linkedin ">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @auth
                        <div id="comments" class="comments-area">
                            <h3 class="comments-title">{{ $news->comments()->count() }} {{ __('frontend.comments') }}</h3>
                            <ol class="comment-list">
                                @foreach ($news->comments()->whereNull('parent_id')->get() as $comment)
                                    <li class="comment">
                                        <aside class="comment-body">
                                            <div class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="{{ asset('frontend/assets/images/avatar.png') }}"
                                                         class="avatar" alt="image">
                                                    <b class="fn">{{ $comment->user->name }}</b>
                                                    <span class="says">{{ __('frontend.says') }}</span>
                                                </div>

                                                <div class="comment-metadata">
                                                    <a href="javascript:void(0);">
                                                        <span>{{ date('M, d, Y H:i', strtotime($comment->created_at)) }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <p>
                                                    {{ $comment->comment }}
                                                </p>
                                            </div>
                                            <div class="reply">
                                                <a href="#" class="comment-reply-link" data-toggle="modal"
                                                   data-target="#exampleModal-{{ $comment->id }}">{{ __('frontend.reply') }}
                                                </a>
                                                <span class="delete-msg" data-id="{{ $comment->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </div>
                                        </aside>
                                        @if ($comment->reply()->count() > 0)
                                            @foreach ($comment->reply as $reply)
                                                <ol class="children">
                                                    <li class="comment">
                                                        <aside class="comment-body">
                                                            <div class="comment-meta">
                                                                <div class="comment-author vcard">
                                                                    <img
                                                                        src="{{ asset('frontend/assets/images/avatar.png') }}"
                                                                        class="avatar" alt="image">
                                                                    <b class="fn">{{ $reply->user->name }}</b>
                                                                    <span class="says">{{ __('frontend.says') }}</span>
                                                                </div>
                                                                <div class="comment-metadata">
                                                                    <a href="javascript:void(0);">
                                                                        <span>{{ date('M, d, Y H:i', strtotime($reply->created_at)) }}</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content">
                                                                <p>{{ $reply->comment }}</p>
                                                            </div>
                                                            <div class="reply">
                                                                @if ($loop->last)
                                                                    <a href="#" class="comment-reply-link"
                                                                       data-toggle="modal"
                                                                       data-target="#exampleModal-{{ $comment->id }}">
                                                                        {{ __('frontend.reply') }}
                                                                    </a>
                                                                @endif
                                                                <span class="delete-msg" style="margin-left: auto;"
                                                                      data-id="{{ $reply->id }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </span>
                                                            </div>
                                                        </aside>
                                                    </li>
                                                </ol>
                                            @endforeach
                                        @endif
                                    </li>
                                    <div class="comment_modal">
                                        <div class="modal fade" id="exampleModal-{{ $comment->id }}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel">{{ __('frontend.write_your_comment') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('news-comment-reply') }}" method="POST">
                                                            @csrf
                                                            <textarea name="reply" cols="30" rows="7"
                                                                      placeholder="{{ __('frontend.type') }}"></textarea>
                                                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                                                            <input type="hidden" name="parent_id"
                                                                   value="{{ $comment->id }}">
                                                            <button type="submit">{{ __('frontend.submit') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ol>
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">{{ __('frontend.leave_a_reply') }}</h3>
                                <form action="{{ route('news-comment') }}" method="POST" class="comment-form">
                                    @csrf
                                    <p class="comment-notes">
                                        <span
                                            id="email-notes">{{ __('frontend.your_email_address_will_not_be_published') }}</span>
                                        {{ __('frontend.required_fields_are_marked') }}
                                        <span class="required">*</span>
                                    </p>
                                    <p class="comment-form-comment">
                                        <label for="comment">{{ __('frontend.comment') }}</label>
                                        <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525"
                                                  required="required"></textarea>
                                    </p>
                                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                                    <input type="hidden" name="parent_id" value="">
                                    @error('comment')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <p class="form-submit mb-0">
                                        <input type="submit" name="submit" id="submit" class="submit"
                                               value="{{ __('frontend.post_comment') }}">
                                    </p>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="card my-5">
                            <div class="card-body">
                                <h5 class="p-0">{!!  __('frontend.comment_unlogged_text',['route' => route('login')]) !!}</h5>
                            </div>
                        </div>
                    @endauth
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single_navigation-prev">
                                @if ($previousPost)
                                    <a href="{{ route('news-details', $previousPost->slug) }}">
                                        <span>{{ __('frontend.previous_post') }}</span>
                                        {!! truncate($previousPost->title) !!}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single_navigation-next text-left text-md-right">
                                @if ($nextPost)
                                    <a href="{{ route('news-details', $nextPost->slug) }}">
                                        <span>{{ __('frontend.next_post') }}</span>
                                        {!! truncate($nextPost->title) !!}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="small_add_banner mb-5 pb-4">
                        <div class="small_add_banner_img">
                            <img src="images/placeholder_large.jpg" alt="adds">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    @if (count($relatedPosts) > 0)
                        <div class="related-article">
                            <h4>
                                {{ __('frontend.you_may_also_like') }}
                            </h4>
                            <div class="article__entry-carousel-three">
                                @foreach ($relatedPosts as $post)
                                    <div class="item">
                                        <div class="article__entry">
                                            <div class="article__image">
                                                <a href="{{ route('news-details', $post->slug) }}">
                                                    <img src="{{ asset($post->image) }}" alt="" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="article__content">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                         <span class="text-primary">
                                                            {{ __('frontend.by_name', ['name' => $post->author->name]) }}
                                                        </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span>
                                                            {{ date('M d, Y', strtotime($post->created_at)) }}
                                                        </span>
                                                    </li>
                                                </ul>
                                                <h5>
                                                    <a href="{{ route('news-details', $post->slug) }}">
                                                        {!! truncate($post->title) !!}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="sticky-top">
                        <aside class="wrapper__list__article">
                            <div class="mb-4">
                                <div class="widget__form-search-bar  ">
                                    <div class="row no-gutters">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                   value="" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button
                                                class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper__list__article-small">
                                @foreach ($recentNews as $news)
                                    @if ($loop->index <= 2)
                                        <div class="mb-3">
                                            <!-- Post Article -->
                                            <div class="card__post card__post-list">
                                                <div class="image-sm">
                                                    <a href="{{ route('news-details', $news->slug) }}">
                                                        <img src="{{ asset($news->image) }}" class="img-fluid" alt="">
                                                    </a>
                                                </div>
                                                <div class="card__post__body ">
                                                    <div class="card__post__content">
                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        {{ __('frontend.by') }} {{ $news->author->name }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">

                                                                        {{ date('M d, Y', strtotime($news->created_at)) }}
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h6>
                                                                <a href="{{ route('news-details', $news->slug) }}">
                                                                    {!! truncate($news->title) !!}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($loop->index === 3)
                                        <div class="article__entry">
                                            <div class="article__image">
                                                <a href="{{ route('news-details', $news->slug) }}">
                                                    <img src="{{ asset($news->image) }}" alt="" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="article__content">
                                                <div class="article__category">
                                                    {{ $news->category->name }}
                                                </div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            {{ __('frontend.by') }} {{ $news->author->name }}
                                                        </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="text-dark text-capitalize">
                                                            {{ date('M d, Y', strtotime($news->created_at)) }}
                                                        </span>
                                                    </li>
                                                </ul>
                                                <h5>
                                                    <a href="{{ route('news-details', $news->slug) }}">
                                                        {!! truncate($news->title) !!}
                                                    </a>
                                                </h5>
                                                <p>
                                                    {!! truncate($news->content, 160) !!}
                                                </p>
                                                <a href="{{ route('news-details', $news->slug) }}"
                                                   class="btn btn-outline-primary mb-4 text-capitalize"> {{ __('frontend.read_more') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </aside>
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.stay_connected') }}</h4>
                            <div class="wrap__social__media">
                                @foreach ($socialCounts as $socialCount)
                                    <a href="{{ $socialCount->url }}" target="_blank">
                                        <div class="social__media__widget mt-2"
                                             style="background-color:{{ $socialCount->color }}">
                                            <span class="social__media__widget-icon">
                                                <i class="{{ $socialCount->icon }}"></i>
                                            </span>
                                            <span class="social__media__widget-counter">
                                                {{ $socialCount->fan_count }} {{ $socialCount->fan_type }}
                                            </span>
                                            <span class="social__media__widget-name">
                                                {{ $socialCount->button_text }}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </aside>
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.tags') }}</h4>
                            <div class="blog-tags p-0">
                                @foreach ($mostCommonTags as $tag)
                                    <li class="list-inline-item">
                                        <a href="{{ route('news', ['tag' => $tag->name]) }}">
                                            #{{ $tag->name }} ({{ $tag->count }})
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        </aside>
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.newsletter') }}</h4>
                            <div class="widget__form-subscribe bg__card-shadow">
                                <h6>
                                    {{ __('frontend.the_most_important_world_news') }}
                                </h6>
                                <p><small>{{ __('frontend.get_daily_newsletter_on_your_inbox') }}</small></p>
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Your email address">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"
                                                type="button">{{ __('frontend.sign_up') }}</button>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.advertise') }}</h4>
                            <a href="#">
                                <figure>
                                    <img src="images/news6.jpg" alt="" class="img-fluid">
                                </figure>
                            </a>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.delete-msg').on('click', function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: '{{ __('frontend.are_you_sure_to_delete_comment') }}',
                    text: '{{ __('frontend.you_wont_be_able_to_revert_this') }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __('frontend.yes_delete_it') }}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: "{{ route('news-comment-destroy') }}",
                            data: {id: id},
                            success: function (data) {
                                if (data.status === 'success') {
                                    Swal.fire(
                                        '{{ __('frontend.deleted') }}',
                                        data.message,
                                        'success'
                                    );
                                    window.location.reload();
                                } else if (data.status === 'error') {
                                    Swal.fire(
                                        '{{ __('frontend.error') }}',
                                        data.message,
                                        'error'
                                    );
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
