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
						<input type="text" name="name"
							   class="form-control"
							   placeholder="Nhập tên sản phẩm..." value="">
					</div>
					<div class="form-group">
						<label>Mã sản phẩm</label>
						<input type="text" name="code"
							   class="form-control"
							   placeholder="Nhập mã sản phẩm..." value="">
					</div>
					<div class="form-group">
						<label>Thông tin nổi bật</label>
						<input type="text" name="note"
							   class="form-control"value="">
						<p class="help-block">Các mục phân cách bởi dấu |. Thông tin sẽ được hiển thị trong phần tóm tắt sản phẩm</p>
					</div>
					<div class="form-group">
						<label>Trong kho</label>
						<select class="form-control select2" name="status" style="width: 100%;">
							<option value=""> - Chọn tình trạng - </option>
							@foreach($list_status as $key=>$status)
								<option value="{{$key}}" >{{$status}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Danh mục sản phẩm</label>
						<select required class="form-control select2" name="category_id" style="width: 100%;">
							<option value=""> - Chọn danh mục - </option>
							@foreach($list_cat as $cat)
								<option value="{{$cat->id}}" >{{$cat->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Thương hiệu</label>
						<select class="form-control select2" name="brand_id" style="width: 100%;">
							<option value=""> - Chọn thương hiệu - </option>
							@foreach($list_brands as $brand)
								<option value="{{$brand->id}}" >{{$brand->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Xuất xứ</label>
						<select class="form-control select2" name="original_id" style="width: 100%;">
							<option value=""> - Chọn Xuất xứ - </option>
							@foreach($list_originals as $ori)
								<option value="{{$ori->id}}" >{{$ori->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Giá sản phẩm</label>
						<div class="row">
							<div class="col-xs-2">
								<input type="text" name="price" value="" class="form-control data-mask"
									   data-inputmask="'removeMaskOnSubmit' : 'true' ,'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': 'VNĐ ', 'placeholder': '0'"
									   style="text-align: right;">
							</div>
						</div>

					</div>
					{{ CommonHelperFn\ajaxUploadFile(['label'=>'Ảnh đại diện sản phẩm','name'=>'image','id'=>'product_image']) }}
					<div class="form-group">
						<label>Mô tả sản phẩm</label>
						<textarea class="form-control"
								  id="description" name="description" rows="10"
								  placeholder="Nhập mô tả ..."></textarea>
					</div>
					<div class="form-group">
						<label>Kích hoạt</label>
						<div>
							<input type="checkbox" class="form-control iCheck"
								   name="active" value="1" >
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Lưu</button>
				</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Thông tin nâng cao</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						<label for="">Từ khóa sản phẩm</label>
						<input type="text" name="keyword" class="form-control" value="">
					</div>
					<div class="form-group">
						<label for="">Tiêu đề sản phẩm</label>
						<input type="text" class="form-control" name="title">
						<p class="help-block">Mặc định nếu không khai báo, tiêu đề sẽ trùng với tên sản phẩm</p>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Lưu</button>
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
		$('.data-mask').inputmask();
		$('.iCheck').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
		CKEDITOR.replace('description');
	</script>
@stop
