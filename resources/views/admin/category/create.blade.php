@extends('admin.layouts.master')
@section('content')

    <div class="ibox">

        @include('admin.layouts.partials.breadcrumb',['base'=>'category','title'=>'category','panel'=>'category'])

        @livewire('category-form')

    </div>

@endsection
