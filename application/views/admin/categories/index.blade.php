@extends('admin.template')
@section('breadcrumb')
    <h1>
        {{ trans('admin.sidebar.categories-list') }}
        <small>{{ trans('admin.sidebar.categories') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-folder-o"></i> {{ trans('admin.sidebar.categories') }}</a></li>
        <li class="active">{{ trans('admin.sidebar.categories-list') }}</li>
    </ol>
@stop
@section('main')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">

            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>{{trans('admin.page.categories.id')}}</th>
                        <th>{{trans('admin.page.categories.cat-name')}}</th>
                        <th>{{trans('admin.page.categories.status')}}</th>
                        <th>{{trans('admin.page.categories.action')}}</th>
                    </tr>
                    @foreach($list as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->active}}</td>
                        <td>
                            <a href="{{ REWRITE_URL\admin_category_edit($category->id) }}"><i class="fa fa-edit"></i></a>
                            <a href=""><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
                The footer of the box
            </div><!-- box-footer -->
        </div><!-- /.box -->
    </div>
</div>

@stop