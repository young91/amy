@extends('admin.index')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<section class="wrapper site-min-height">
  <!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<ul class="breadcrumb">
					<li><i class="fa fa-dribbble"></i> 添加会员</li>
				</ul>
				<!--breadcrumbs end -->
			</div>
		</div>
		<div class="row">
      <div class="col-lg-12">
				<section class="panel">
					<div class="panel-body">
					  <div class=" form">
						<form class="cmxform form-horizontal tasi-form" role="form"
							enctype="multipart/form-data" id="commentForm"
							action="javascript:submitComment();" method="post">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label class="col-xs-1 control-label">会员姓名</label>
								<div class="col-xs-2">
									<input type="text" class="form-control" name="username" id="username" required=true />
								</div>
								<label class="col-xs-1 control-label">手机号码</label>
								<div class="col-xs-2">
									<input type="text" class="form-control" name="mobile" id="mobile" maxlength="11" required=true />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-1 control-label">性别</label>
								<div class="col-xs-2">
									<select class="form-control" id="sex" required=true name="sex">
											<option value="1" selected="selected">男</option>
											<option value="2">女</option>
									</select>
								</div>
								<label class="col-xs-1 control-label">年龄</label>
								<div class="col-xs-2">
						         <input type="text" class="form-control" name="age" id="age" required=true />
								</div>
							</div>
              <div class="form-group">
								<label class="col-xs-1 control-label">省份</label>
								<div class="col-xs-2">
									<select class="form-control" id="provinceId" required=true name="provinceId">
										<option selected="selected">--请选择省份--</option>
											<option value="2">北京市</option>
											<option value="23">天津市</option>
											<option value="44">河北省</option>
											<option value="239">山西省</option>
											<option value="381">内蒙古自治区</option>
											<option value="514">辽宁省</option>
											<option value="643">吉林省</option>
											<option value="721">黑龙江省</option>
											<option value="883">上海市</option>
											<option value="905">江苏省</option>
											<option value="1045">浙江省</option>
											<option value="1158">安徽省</option>
											<option value="1298">福建省</option>
											<option value="1402">江西省</option>
											<option value="1527">山东省</option>
											<option value="1702">河南省</option>
											<option value="1909">湖北省</option>
											<option value="2038">湖南省</option>
											<option value="2189">广东省</option>
											<option value="2379">广西壮族自治区</option>
											<option value="2518">海南省</option>
											<option value="2547">重庆市</option>
											<option value="2591">四川省</option>
											<option value="2812">贵州省</option>
											<option value="2913">云南省</option>
											<option value="3067">西藏自治区</option>
											<option value="3149">陕西省</option>
											<option value="3277">甘肃省</option>
											<option value="3390">青海省</option>
											<option value="3446">宁夏回族自治区</option>
											<option value="3479">新疆维吾尔自治区</option>
									</select>
								</div>
                <label class="col-xs-1 control-label">城市</label>
								<div class="col-xs-2">
									<select class="form-control" id="fullName2" name="cityId"></select>
								</div>
							</div>
              <div class="form-group">
								<label class="col-xs-1 control-label">身高</label>
								<div class="col-xs-2">
									<input type="text" class="form-control" name="height" id="height" placeholder="单位cm" required=true />
								</div>
								<label class="col-xs-1 control-label">体重</label>
								<div class="col-xs-2">
						         <input type="text" class="form-control" name="weight" id="weight" placeholder="单位斤" required=true />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-1 control-label">会员时间</label>
								<div class="col-xs-2">
                    <input type="text" class="form-control" name="vip_time" id="vip_time" placeholder="月" required=true />
								</div>
								<label class="col-xs-1 control-label">费用</label>
								<div class="col-xs-2">
                    <input type="text" class="form-control" name="fee" id="fee" placeholder="人民币" required=true />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-1">上传图片</label>
                <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                         <span class="btn btn-white btn-file">
                         <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                         <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                         <input type="file" class="default" name="imgFile" />
                         </span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                        </div>
                    </div>
                </div>
							</div>
							<div class="form-group">
                 <label class="col-xs-1">服务内容</label>
                 <div class="col-xs-5">
                     <textarea id="description" class="wysihtml5 form-control" rows="5"
                     		required=true name="description"></textarea>
                 </div>
            	</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-xs-10">
									<button class="btn btn-primary" id="saveCreateAudit"
										type="submit" onClick="submitComment();"><i class="fa fa-check"></i> 提 交</button>
								</div>
							</div>
							</div>
						</form>
      	</div>
      </div>
			</section>
		</div>
    </div>
	<!-- page end-->

</section>
@endsection
@section('js')
<script>
function submitComment() {
  $("#commentForm").attr("action",
							"/user/add");
					$("#commentForm").submit();
}
</script>
@endsection
