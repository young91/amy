@extends('admin.index')

@section('content')
<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
            管理员列表
        </header>
        <div class="panel-body">
            <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <button id="editable-sample_new" class="btn green">
                            Add New <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>Email</th>
                        <th>电话</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr class="">
                          <td>{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->mobile }}</td>
                          @if ($user->active == 1)
                              <td class="center"><span class="label label-info label-mini">可用</span></td>
                          @else
                              <td class="center"><span class="label label-danger label-mini">不可用</span></td>
                          @endif
                          <td><a class="delete" href="javascript:;">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- page end-->
</section>
@endsection

@section('js')
<script src="/js/editable-table.js"></script>
<script src="/js/editable-table.js"></script>
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>
@endsection
