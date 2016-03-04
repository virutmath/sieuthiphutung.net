@extends('admin.template')

@section('breadcrumb')
    <h1>
        {{ trans('admin.page.categories.edit-page-title') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-folder-o"></i> {{ trans('admin.sidebar.categories') }}</a></li>
        <li class="active">{{ trans('admin.page.categories.edit-page-title') }}</li>
    </ol>
@stop

@section('main')
{{ form_open_multipart() }}
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin cơ bản</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="product_name"
                               class="form-control"
                               placeholder="Nhập tên sản phẩm..." value="{{$detail->name}}">
                    </div>
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        <select class="form-control select2" name="product_cat" style="width: 100%;">
                            <option value=""> - Chọn danh mục - </option>
                            @foreach($list_cat as $cat)
                            <option value="{{$cat->id}}" {{$cat->id == $detail->category_id ? 'selected' : ''}} >{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thương hiệu</label>
                        <select class="form-control select2" name="product_brand" style="width: 100%;">
                            <option value=""> - Chọn thương hiệu - </option>
                            @foreach($list_brands as $brand)
                                <option value="{{$brand->id}}" {{$brand->id == $detail->brand_id ? 'selected' : ''}} >{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Xuất xứ</label>
                        <select class="form-control select2" name="product_brand" style="width: 100%;">
                            <option value=""> - Chọn thương hiệu - </option>
                            @foreach($list_originals as $ori)
                                <option value="{{$ori->id}}" {{$ori->id == $detail->original_id ? 'selected' : ''}} >{{$ori->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện sản phẩm</label>
                        <input type="file" name="product_file">
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea class="form-control" id="description" name="product_description" rows="3" placeholder="Nhập mô tả ...">{{$detail->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <div>
                            <input type="checkbox" class="form-control iCheck"
                                   {{$detail->active == 1 ? "checked" : ""}}
                                   name="product_active" value="1" >
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin nâng cao</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Từ khóa sản phẩm</label>
                        <input type="text" name="product_keyword" class="form-control" value="{{$detail->keyword}}">
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề sản phẩm</label>
                        <input type="text" class="form-control" name="product_title">
                        <p class="help-block">Mặc định nếu không khai báo, tiêu đề sẽ trùng với tên sản phẩm</p>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
{{ form_close() }}
@stop

@section('script')
        <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script>
        $('.select2').select2();
        $('.iCheck').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        CKEDITOR.replace('description');
    </script>
@stop