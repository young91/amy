@extends('admin.index')

@section('content')
<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
            会员详情
        </header>
        <div class="row">
          <div class="col-lg-12">
    				<section class="panel">
    					<div class="panel-body">
    					  <div class=" form">
    						<form class="cmxform form-horizontal tasi-form" role="form" enctype="multipart/form-data" id="commentForm">
    							<div class="form-group">
    								<label class="col-xs-1 control-label">会员姓名</label>
    								<div class="col-xs-2">
    									<input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" readonly/>
    								</div>
    								<label class="col-xs-1 control-label">手机号码</label>
    								<div class="col-xs-2">
    									<input type="text" class="form-control" name="mobile" id="mobile" maxlength="11" value="{{$user->mobile}}" readonly/>
    								</div>
    							</div>
    							<div class="form-group">
    								<label class="col-xs-1 control-label">性别</label>
    								<div class="col-xs-2">
    									<select class="form-control" id="sex" required=true name="sex" readonly>
                          @if($user->sex == 1)
    											    <option value="1" selected="selected">男</option>
                          @else
    											    <option value="2">女</option>
                          @endif
    									</select>
    								</div>
    								<label class="col-xs-1 control-label">年龄</label>
    								<div class="col-xs-2">
    						         <input type="text" class="form-control" name="age" id="age" value="{{$user->age}}" readonly/>
    								</div>
    							</div>
                  <div class="form-group">
    								<label class="col-xs-1 control-label">身高</label>
    								<div class="col-xs-2">
    									<input type="text" class="form-control" name="height" id="height" value="{{$user->height}}" readonly />
    								</div>
    								<label class="col-xs-1 control-label">体重</label>
    								<div class="col-xs-2">
    						         <input type="text" class="form-control" name="weight" id="weight" value="{{$user->weight}}" readonly/>
    								</div>
    							</div>
    							<div class="form-group">
                    <label class="col-xs-1 control-label">最近体重</label>
    								<div class="col-xs-2">
                        <input type="text" class="form-control" name="fee" id="fee" value="{{$user->last_weight}}" readonly/>
    								</div>
    								<label class="col-xs-1 control-label">会员到期时间</label>
    								<div class="col-xs-2">
                        <input type="text" class="form-control" name="month" id="month" value="{{$user->vip_end_time}}" readonly/>
    								</div>
    							</div>
    							</div>
    						</form>
          	</div>
            <section class="panel">
                <header class="panel-heading">
                    <span sty>体重变化</span>
                    <a href="javascript:void(0)"  onclick="updateWeight({{$user->uid}}, '{{$user->name}}')" data-toggle="modal" class="btn btn-primary">
                        更新体重
                    </a>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>时间</th>
                                <th>最新体重(斤)</th>
                                <th>体重变化(斤)</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($weights as $weight)
                              <tr class="">
                                  <td>{{ $weight->id }}</td>
                                  <td>{{ date('Y-m-d H:i:s', $weight->create_time) }}</td>
                                  <td>{{ $weight->weight }}</td>
                                  <td>{{ $weight->weight - $user->weight }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <section class="panel">
                <header class="panel-heading">
                    <span sty>续费情况</span>
                    <a href="javascript:void(0)"  onclick="updateVip({{$user->uid}}, '{{$user->name}}')" data-toggle="modal" class="btn btn-primary">
                        续费
                    </a>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>时间</th>
                                <th>持续时间(月)</th>
                                <th>到期时间(斤)</th>
                                <th>费用</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($vips as $vip)
                              <tr class="">
                                  <td>{{ $vip->id }}</td>
                                  <td>{{ date('Y-m-d H:i:s', $vip->create_time) }}</td>
                                  <td>{{ $vip->month }}</td>
                                  <td>{{ $vip->vip_end_time }}</td>
                                  <td>{{ $vip->fee }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
          </div>
          <div class="col-lg-6">
              <section class="panel">
                  <header class="panel-heading">
                      服务记录
                      <a href="/user/updateService/{{$user->uid}}"  data-toggle="modal" class="btn btn-primary">
                          添加服务记录
                      </a>
                      <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                    </span>
                  </header>
                  <div class="panel-body">
                      <div class="timeline-messages">
                        @foreach ($services as $service)
                          <!-- Comment -->
                          <div class="msg-time-chat">
                              <span class="text">{{ date('Y-m-d H:i:s', $service->create_time) }}</span>
                              <div class="message-body msg-in">
                                  @foreach ($service->img as $img)
                                      <img class="avatar" src="{{$img}}" alt="">
                                  @endforeach
                                  <div class="text">
                                      <p>{{ $service->content }}</p>
                                  </div>
                              </div>
                          </div>
                          <!-- /comment -->
                          @endforeach
                      </div>
                  </div>
              </section>
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
    		</div>

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
