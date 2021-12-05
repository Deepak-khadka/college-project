@extends('admin.layouts.master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    @include('admin.layouts.partials.breadcrumb',['base'=>'profile','title'=>'profile','panel'=>'profile'])
                    <div class="ibox-content">
                    {!! Form::model($data['profile'], ['route' => [$base['base_route'].'.update',$data['profile']->id ],
                             'method' => 'put']) !!}
                         {!! Form::hidden('id', $data['profile']->id) !!}
                        @includeIf($base['partial'].'.form')
                     {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
