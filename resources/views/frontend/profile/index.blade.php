@extends('app')

@section('content')

    @include('frontend.layouts.partials.header')

    @include('frontend.common.category-preview')

{{--    @include('frontend.common.table')--}}

    @include('frontend.common.product-preview')

    @include('frontend.common.flex')

    @include('frontend.common.product')


    @include('frontend.layouts.partials.footer')




@endsection