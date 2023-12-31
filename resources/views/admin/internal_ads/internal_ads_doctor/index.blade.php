@extends('admin/layouts/master')


@section('title')
    {{trans('admin.internal_ads')}}
@endsection
@section('page_name')
    {{trans('admin.internal_ads')}}
@endsection
@section('css')
    @include('admin.layouts.loader.formLoader.loaderCss')

@endsection
@section('content')

    {{--  start content  --}}

    <div class="row">
        <div class="col-12">
            <div class="card bg-white img-card box-white-shadow p-3">
                <div class="owl-carousel owl-theme" style="direction: ltr">
                    <div style="direction: rtl">
                        <?php
                            $arr = ['primary'];
                        ?>
                        @foreach($ads as $index => $ad)
                            <div class="row mb-3">
                                <div class="col-sm-3 col-12">
                                    <div class="card bg-{{ Arr::random($arr) }} img-card box-{{ Arr::random($arr) }}-shadow text-center text-white h-100">
                                        <a class="card-body title-ad text-center text-white" href="{{ route('detailsDoctor',$ad->id) }}">
                                            <h1 style="color: white">
                                                {{ $ad->title }}
                                            </h1>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-12 d-flex flex-column justify-content-center">
                                    <a style="display: block" href="{{ route('detailsDoctor',$ad->id) }}">
                                        <a href="{{ route('detailsDoctor',$ad->id) }}">
                                            <h4>{{ $ad->created_at->format('d') }}</h4>
                                            <h4>{{ $ad->created_at->format('D,Y') }}</h4>
                                        </a>
                                        <a href="{{ route('detailsDoctor',$ad->id) }}" style="color: #1d357e">
                                        <p>{{ $ad->service->service_name }}</p>
                                        </a>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  end content  --}}

    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        $(".owl-carousel").owlCarousel({
            autoplay: false,
            autoplayhoverpause: true,
            autoplaytimeout: 100,
            items: 1,
            nav: false,
            loop: false,
            dots: true,
            // navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>",],
            responsive: {
                0: {
                    items: 1
                },
                485: {
                    items: 1
                },
                728: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    </script>
@endsection


