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

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{$tableAdmin}}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- box-footer -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop

@section('script')
    <script>
        var adminJs = new TableAdminJs({
            method: 'post',
            dataType: 'json'
        });
        $('.deleteRecord').click(function (e) {
            e.preventDefault();
            var recordId = $(this).data('id');
            var option = {
                url: '<?=RewriteUrlFn\admin_product_delete()?>',
                data: {
                    "<?=CommonHelperFn\get_csrf_token_name()?>": "<?=CommonHelperFn\get_csrf_token_hash()?>",
                    record: recordId
                }
            };
            adminJs.deleteRecord(option, function (response) {
                $.alert('<?=trans('admin.message.delete-success')?>');
                $('#tableAdmin-tr-' + recordId).remove();
            })
        });
        $('.iCheck').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'icheckbox_minimal-blue',
            increaseArea: '20%' // optional
        });
        $('.control-category_id')
                .select2()
                .on('change', function () {
                    var recordId = $(this).data('id');
                    var option = {
                        url: '<?=RewriteUrlFn\admin_product_ajaxUpdate()?>',
                        data: {
                            "<?=CommonHelperFn\get_csrf_token_name()?>": "<?=CommonHelperFn\get_csrf_token_hash()?>",
                            record: recordId,
                            field: 'category_id',
                            category_id: $(this).val()
                        }
                    };
                    adminJs.updateRecord(option, function (resp) {
                        $.alert('Cập nhật thành công');
                    }, function (resp) {
                        $.alert({
                            message: 'Cập nhật thất bại',
                            type: 'error'
                        });
                    })
                });
        $('.control-status')
                .select2()
                .on('change', function () {
                    var recordId = $(this).data('id');
                    var option = {
                        url: '<?=RewriteUrlFn\admin_product_ajaxUpdate()?>',
                        data: {
                            "<?=CommonHelperFn\get_csrf_token_name()?>": "<?=CommonHelperFn\get_csrf_token_hash()?>",
                            record: recordId,
                            field: 'status',
                            status: $(this).val()
                        }
                    };
                    adminJs.updateRecord(option, function (resp) {
                        $.alert('Cập nhật thành công');
                    }, function (resp) {
                        $.alert({
                            message: 'Cập nhật thất bại',
                            type: 'error'
                        });
                    })
                });
        $('.control-best_seller').on('ifChanged', function () {
            var recordId = $(this).data('id');
            var option = {
                url: '<?=RewriteUrlFn\admin_product_ajaxUpdate()?>',
                data: {
                    "<?=CommonHelperFn\get_csrf_token_name()?>": "<?=CommonHelperFn\get_csrf_token_hash()?>",
                    record: recordId,
                    field: 'best_seller'
                }
            };
            adminJs.updateRecord(option, function (resp) {
                $.alert('Cập nhật thành công');
            }, function (resp) {
                $.alert({
                    message: 'Cập nhật thất bại',
                    type: 'error'
                });
            })
        });
        $('.control-active').on('ifChanged', function() {
            var recordId = $(this).data('id');
            var option = {
                url: '<?=RewriteUrlFn\admin_product_ajaxUpdate()?>',
                data: {
                    "<?=CommonHelperFn\get_csrf_token_name()?>": "<?=CommonHelperFn\get_csrf_token_hash()?>",
                    record: recordId,
                    field: 'active'
                }
            };
            adminJs.updateRecord(option, function (resp) {
                $.alert('Cập nhật thành công');
            }, function (resp) {
                $.alert({
                    message: 'Cập nhật thất bại',
                    type: 'error'
                });
            })
        })
    </script>
@stop
