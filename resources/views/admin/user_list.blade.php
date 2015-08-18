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
                          <td>{{ $user->updated_at }}</td>
                          @if (strtotime($user->vip_end_time) >= time())
                              <td><span class="label label-info label-mini">否</span></td>
                          @else
                              <td><span class="label label-danger label-mini">是</span></td>
                          @endif
                          <td>
                            <a href="javascript:void(0)"  onclick="updateWeight({{$user->uid}}, {{$user->name}})" data-toggle="modal" class="btn btn-xs btn-success">
                                更新体重
                            </a>
                            <a href="javascript:void(0)"  onclick="updateVip({{$user->uid}}, {{$user->name}})" data-toggle="modal" class="btn btn-xs btn-info">
                                续费
                            </a>
                            <a href="/user/updateService/{{$user->uid}}"  data-toggle="modal" class="btn btn-xs btn-primary">
                                添加服务记录
                            </a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- weight update start-->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade modal-dialog-center">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">更新体重</h4>
                    </div>
                    <div class="modal-body">

                        <form class="form-horizontal" role="form" action="/user/updateWeight" method="post">
                          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <label for="inputUid" class="col-lg-2 col-sm-2 control-label">用户ID</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="uid" name="uid" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">姓名</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="name" name="name" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">体重</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="weight" placeholder="单位(斤)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">更新</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!-- weight update end-->
        <!-- vip update start-->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-2" class="modal fade modal-dialog-center">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">会员续费</h4>
                    </div>
                    <div class="modal-body">

                        <form class="form-horizontal" role="form" action="/user/updateVip" method="post">
                          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <label for="inputUid" class="col-lg-2 col-sm-2 control-label">用户ID</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="uid" name="uid" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">姓名</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="name" name="name" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">续费时长</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="month" placeholder="单位(月)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">费用</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="fee" placeholder="单位(元)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!-- service update end-->
    </section>
    <!-- page end-->
</section>
@endsection

@section('js')
<script src="/js/editable-table.js?v=2015081701"></script>
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });

    function updateWeight(uid, name)
    {
        $("#myModal-1").find('#uid').val(uid);
        $("#myModal-1").find('#name').val(name);
        $("#myModal-1").modal('show');
    }

    function updateVip(uid, name)
    {
        $("#myModal-2").find('#uid').val(uid);
        $("#myModal-2").find('#name').val(name);
        $("#myModal-2").modal('show');
    }

</script>
@endsection
