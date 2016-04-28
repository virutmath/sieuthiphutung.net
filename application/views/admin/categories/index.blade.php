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
                    <table class="hidden table table-bordered table-striped table-hover">
                        <tr>
                            <th>{{trans('admin.page.categories.id')}}</th>
                            <th>{{trans('admin.page.categories.cat-name')}}</th>
                            <th>{{trans('admin.page.categories.status')}}</th>
                            <th>{{trans('admin.page.categories.action')}}</th>
                        </tr>
                        @foreach($list as $category)
                            <tr id="tr_{{$category->id}}">
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->active}}</td>
                                <td>
                                    <a href="{{ RewriteUrlFn\admin_category_edit($category->id) }}"><i
                                                class="fa fa-edit"></i></a>
                                    <a href="#" class="deleteRecord" data-id="{{$category->id}}"><i
                                                class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$tableAdmin}}
                </div><!-- /.box-body -->
                <div class="box-footer">
                    The footer of the box
                </div><!-- box-footer -->
            </div><!-- /.box -->
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
                url: '<?=RewriteUrlFn\admin_category_delete()?>',
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
        $('.control-icon')
                .css({width: '100%'})
                .select2({
                    templateResult: function (state) {
                        return $('<span><i class="' + state.id + '" style="width : 20px;"></i> ' + state.text + '</span>');
                    },
                    templateSelection: function (state) {
                        return $('<span><i class="' + state.id + '" style="width : 20px;"></i> ' + state.text + '</span>');
                    }
                })
                .on('change',function() {
                    var recordId = $(this).data('id');
                    var option = {
                        url: '<?=RewriteUrlFn\admin_category_ajaxUpdate()?>',
                        data: {
                            "<?=CommonHelperFn\get_csrf_token_name()?>": "<?=CommonHelperFn\get_csrf_token_hash()?>",
                            record: recordId,
                            field: 'icon',
                            icon: $(this).val()
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
        $('.iCheck').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'icheckbox_minimal-blue',
            increaseArea: '20%' // optional
        });
        $('.control-active').on('ifChanged', function() {
            var recordId = $(this).data('id');
            var option = {
                url: '<?=RewriteUrlFn\admin_category_ajaxUpdate()?>',
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