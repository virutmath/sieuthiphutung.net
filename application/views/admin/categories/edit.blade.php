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
<form role="form">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin cơ bản</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Nhập tên danh mục..." value="{{$detail->name}}">
                    </div>
                    <div class="form-group">
                        <label>Danh mục cha</label>
                        <select class="form-control select2" name="category_parent" style="width: 100%;">
                            <option value=""> - Chọn danh mục - </option>
                            @foreach($list_cat as $cat)
                            <option value="{{$cat->id}}" {{$cat->id == $detail->parent_id ? 'selected' : ''}} >{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ảnh danh mục</label>
                        <input type="file" name="category_file">
                        <p class="help-block">Đối với danh mục cấp 1, ảnh sẽ được hiển thị ở menu danh mục sản phẩm</p>
                    </div>
                    <div class="form-group">
                        <label>Biểu tượng</label>
                        <div class="row">
                            @foreach($list_icon as $icon=>$icon_class)
                                <div class="col-xs-2">
                                    <label>
                                        <input type="radio" class="form-control iCheck"
                                               {{$detail->icon == $icon ? "checked" : ""}}
                                               name="category_icon" value="{{$icon}}">
                                        <i class="{{$icon_class}}"></i>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <div>
                            <input type="checkbox" class="form-control iCheck"
                                   {{$detail->active == 1 ? "checked" : ""}}
                                   name="category_active" value="1" >
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
                        <label>Mô tả danh mục</label>
                        <textarea class="form-control" rows="3" placeholder="Nhập mô tả ...">{{$detail->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Từ khóa danh mục</label>
                        <input type="text" name="category_keyword" class="form-control" value="{{$detail->keyword}}">
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề danh mục</label>
                        <input type="text" class="form-control" name="category_title">
                        <p class="help-block">Mặc định nếu không khai báo, tiêu đề sẽ trùng với tên danh mục</p>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@section('script')
    <script>
        $('.select2').select2();
        $('.iCheck').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    </script>
@stop