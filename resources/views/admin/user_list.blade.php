@extends('admin.index')

@section('content')
<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
            会员管理
        </header>
        <div class="panel-body">
            <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <button id="addVipUser" type="button" class="btn btn-primary">添加VIP</button>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>身高</th>
                        <th>近期体重</th>
                        <th>体重变化</th>
                        <th>加入时间</th>
                        <th>上次服务</th>
                        <th>是否过期</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr class="">
                          <td>{{ str_pad($user->uid, 4, '0', STR_PAD_LEFT) }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->mobile }}</td>
                          <td>{{ $user->height }}</td>
                          <td>{{ $user->last_weight }}</td>
                          <td>{{ $user->last_weight - $user->weight }}</td>
                          <td>{{ $user->created_at }}</td>
                          <td>{{ $user->update_at }}</td>
                          @if (strtotime($user->vip_end_time) >= time())
                              <td class="center"><span class="label label-info label-mini">否</span></td>
                          @else
                              <td class="center"><span class="label label-danger label-mini">是</span></td>
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
<script src="/js/editable-table.js"></script>
@endsection
