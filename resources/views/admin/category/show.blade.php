@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">

                @include('admin.layouts.partials.breadcrumb',['base'=>'category','title'=>'category','panel'=>'category'])

                <div class="ibox-content">
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3>{{ $category->name }}</h3>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Addresses-->
                            <div class="row gx-9 gy-6">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <!--begin::Address-->
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-column py-2">
                                            <div class="d-flex align-items-center fs-5 fw-bolder mb-5">Description
                                                <span class="badge badge-light-success fs-7 ms-2">{{ $category->parent_id == 0 ? 'Parent' : 'Sub-parent' }}</span>
                                            </div>
                                            <div class="fs-6 fw-bold text-gray-600">
                                                {!! $category->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Address-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <!--begin::Address-->
                                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-column py-2">
                                            Shown Status :
                                            <div class="d-flex align-items-center fs-5 fw-bolder mb-3"> {{ $category->is_shown == \Kathford\Lib\Category\IsShown::DISPLAY ? \Kathford\Lib\Category\IsShown::SHOW : \Kathford\Lib\Category\IsShown::HIDE  }}</div>
                                            <div class="fs-6 fw-bold text-gray-600">

                                                <b>
                                                    <code>
                                                        <center>
                                                            Listing of sub-category
                                                        </center>
                                                    </code>
                                                </b>
                                                @forelse($category->subCategory as $subCategory)

                                                    <ul>
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
                                    <!--end::Address-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                @if(isset($category->parentCategory))
                                    <div class="col-xl-6">
                                        <!--begin::Address-->
                                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                            <!--begin::Details-->

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
                                        <!--end::Address-->
                                    </div>
                            @endif
                            <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <!--begin::Notice-->
                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed flex-stack h-xl-100 mb-10 p-6">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <!--begin::Content-->
                                            <div class="mb-3 mb-md-0 fw-bold">
                                                <h4 class="text-gray-800 fw-bolder">This is a very important note!</h4>
                                                <div class="fs-6 text-gray-600 pe-7">Writing headlines for blog posts is
                                                    much science and probably cool audience
                                                </div>
                                            </div>
                                            <!--end::Content-->
                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap"
                                               data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">New
                                                Address</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Addresses-->
                            <!--begin::Tax info-->
                            <div class="mt-10">
                                <h3 class="mb-3">Tax Location</h3>
                                <div class="fw-bold text-gray-600 fs-6">United States - 10% VAT
                                    <br/>
                                    <a class="fw-bolder" href="#">More Info</a></div>
                            </div>
                            <!--end::Tax info-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

