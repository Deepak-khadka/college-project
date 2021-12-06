@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">

                @include('admin.layouts.partials.breadcrumb',['base'=>'category','title'=>'category','panel'=>'category'])

                <div class="ibox-content">
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>{{ $category->name }}</h3>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row gx-9 gy-6">
                                <div class="col-xl-6">
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <div class="d-flex flex-column py-2">
                                            <div class="d-flex align-items-center fs-5 fw-bolder mb-5">Description
                                                <span class="badge badge-light-success fs-7 ms-2">{{ $category->parent_id == \Kathford\Lib\Category\Level::PARENT ? 'Parent' : 'Sub-parent' }}</span>
                                            </div>
                                            <div class="fs-6 fw-bold text-gray-600">
                                                {!! $category->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">

                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <div class="d-flex flex-column py-2">
                                            Shown Status :
                                            <div class="d-flex align-items-center fs-5 fw-bolder mb-3"> {{ $category->is_shown == \Kathford\Lib\Category\IsShown::DISPLAY ? \Kathford\Lib\Category\IsShown::SHOW : \Kathford\Lib\Category\IsShown::HIDE  }}</div>
                                            <div class="fs-6 fw-bold text-gray-600">
                                                <code> Listing of sub-category </code>
                                                @forelse($category->subCategory as $subCategory)
                                                    <ul class="mt-5">
                                                        <li>
                                                            <a href="{{ route('admin.category.show', $subCategory->slug) }}">{{ $subCategory->name }}</a>
                                                        </li>
                                                    </ul>
                                                @empty
                                                    <label for="">
                                                        Not available go to
                                                        <a href="{{ route('admin.category.index') }}">Category Page</a>
                                                    </label>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(isset($category->parentCategory))
                                    <div class="col-xl-6">
                                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                            <div class="d-flex flex-column py-2">
                                                <div class="d-flex align-items-center fs-5 fw-bolder mb-3">Parent
                                                    Category
                                                </div>
                                                <div class="fs-6 fw-bold text-gray-600">
                                                    <a href="{{ route('admin.category.show', $category->parentCategory->slug) }}">
                                                        {{ $category->parentCategory->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xl-6">
                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed flex-stack h-xl-100 mb-10 p-6">
                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">

                                            <div class="mb-3 mb-md-0 fw-bold">
                                                <h4 class="text-gray-800 fw-bolder">Seo-Title</h4>
                                                <div class="fs-6 text-gray-600 pe-7">
                                                    {{ $category->seo_title }}
                                                </div>
                                            </div>

                                            <div class="mb-3 mb-md-0 fw-bold">
                                                <h4 class="text-gray-800 fw-bolder">Seo-Description</h4>
                                                <div class="fs-6 text-gray-600 pe-7">
                                                    {{ $category->seo_description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10">
                                <label for="level">
                                    <h3 class="mb-3"> More Info</h3>
                                </label>
                                <div class="fw-bold text-gray-600 fs-6">Level Of Category is :- {{ $category->level }}
                                    <br/></div>
                                <div class="fw-bold text-gray-600 fs-6">Order is :- {{ $category->order }}<br/></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

