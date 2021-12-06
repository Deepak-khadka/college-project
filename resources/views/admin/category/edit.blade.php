@extends('admin.layouts.master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    @include('admin.layouts.partials.breadcrumb',['base'=>'category','title'=>'category','panel'=>'category'])
                    <div class="ibox-content">
                    {!! Form::model($data['category'], ['route' => ['admin.category.update',$data['category']->slug ],
                             'method' => 'put']) !!}
                         {!! Form::hidden('id', $data['category']->id) !!}

                        @includeIf('admin.category.partials.form')

                     {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
