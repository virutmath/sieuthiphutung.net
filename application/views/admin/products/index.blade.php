@extends('admin.template')
@section('breadcrumb')
    <h1>
        {{ trans('admin.sidebar.products-list') }}
        <small>{{ trans('admin.sidebar.products') }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-folder-o"></i> {{ trans('admin.sidebar.products') }}</a></li>
        <li class="active">{{ trans('admin.sidebar.products-list') }}</li>
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
                        <th>{{trans('admin.page.products.id')}}</th>
                        <th>{{trans('admin.page.products.product-name')}}</th>
                        <th>{{trans('admin.page.products.cat-name')}}</th>
                        <th>{{trans('admin.page.products.updated-at')}}</th>
                        <th>{{trans('admin.page.products.status')}}</th>
                        <th>{{trans('admin.page.products.active')}}</th>
                        <th>{{trans('admin.page.products.action')}}</th>
                    </tr>
                    @foreach($list as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->categories->name}}</td>
                        <td>{{date('d/m/Y',$product->updated_at)}}</td>
                        <td>{{$product->status}}</td>
                        <td>{{$product->active}}</td>
                        <td>
                            <a href="{{ RewriteUrlFn\admin_product_edit($product->id) }}"><i class="fa fa-edit"></i></a>
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