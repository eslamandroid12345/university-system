@extends('front.layouts.master')

@section('content')
    <style>
        .btnEvent a {
            color: white;
            background-color: #ff7350;
            transition: all 0.5s ease;
        }
        .btnEvent a:hover {
            color: white;
            background-color: #032e3f;
        }
    </style>
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">{{ $blog_item->getTranslation('title', lang()) }}</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">@lang('admin.home')</a>|
                    <span class="ms-2">{{ $blog_item->getTranslation('title', lang()) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- section details -->
    <section class="details pt-5 pb-5">
        <div class="container pt-5 pb-5">
            <div style="position: relative;">
                <img src="{{ asset('uploads/advertisements/background_image/'.$blog_item->background_image) }}" alt="no-image">
                <div class="d-flex flex-wrap  date-details">
                    <div class="me-3">
                        <i class="fa-solid fa-user"></i>
                        {{ $blog_item->service->getTranslation('service_name', lang()) }}
                    </div>
                    <div class="me-3">
                        <i class="fa-solid fa-calendar-days"></i>
                        {{ $blog_item->created_at->format('d') }}
                        {{ $blog_item->created_at->format('M') }},{{ $blog_item->created_at->format('Y') }}
                    </div>
                    <div class="me-3">
                        <i class="fa-regular fa-clock"></i>
                        {{ $blog_item->created_at->format('H:i A') }}
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-9 col-12">
                    <h2 class="color-blue mb-3">
                        {{ $blog_item->getTranslation('title', lang()) }}
                    </h2>
                    <p>{!! $blog_item->getTranslation('description', lang()) !!}</p>
                    @if($blog_item->file)
                        <div class="mt-5 mb-4 d-flex">
                            <div class="btnEvent">
                                <a class="text-decoration-none btn-platform me-2 ms-2 mb-3" href="{{ asset($blog_item->file) }}">
                                    <i class="fa-solid fa-download me-2 text-white"></i>
                                    {{ trans('admin.attachment_file') }}
                                </a>
                            </div>
                        </div>
                    @endif
                    <hr>
                    <div>
                        <h3 class="mt-4 mb-3">@lang('admin.share in')</h3>
                        <a class="text-decoration-none btn-share whatsapp"
                           href="https://api.whatsapp.com/send?text={{$blog_item->getTranslation('title', lang()) .' : '. route('blog',$blog_item->id) }}"
                           target="_blank"><i
                                class="fa-brands fa-whatsapp"></i></a>
                        <a class="text-decoration-none btn-share facebook"
                           href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog',$blog_item->id) }}"
                           target="_blank"><i
                                class="fa-brands fa-facebook-f"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12 sidebar mt-5">
                    <div class="mt-3 ms-3">
                        <h2 class="title" style="font-size: 30px;">@lang('admin.latest posts')</h2>
                    </div>
                    <ul class="ms-3">
                        @foreach ($advertisements as $advertisement)
                            <li class="mb-3">
                                <div class="d-flex blog">
                                    <div class="me-3">
                                        <a class="text-decoration-none"
                                           href="{{ route('blog',$advertisement->id) }}">
                                        <img
                                            src="{{ asset('/uploads/advertisements/images/'.$advertisement->image) }}">
                                        </a>
                                    </div>
                                    <div>
                                        <div style="max-width: 190px;">
                                            <a class="text-decoration-none"
                                               href="{{ route('blog',$advertisement->id) }}">{{ $advertisement->getTranslation('title', lang()) }}</a>
                                        </div>
                                        <span
                                            class="color-second">{{ $advertisement->created_at->format('d') }} {{ $advertisement->created_at->format('M') }}, {{ $advertisement->created_at->format('Y') }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
