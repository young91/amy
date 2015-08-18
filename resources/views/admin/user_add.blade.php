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
							enctype="multipart/form-data" id="commentForm" action="/user/add" method="post">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="form-group">
								<label class="col-xs-1 control-label">会员姓名</label>
								<div class="col-xs-2">
									<input type="text" class="form-control" name="name" id="name" required=true />
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
									<select class="form-control" id="fullName2" name="cityId">
										<option selected="selected">--请选择城市--</option>
											<option value="2">北京市</option>
									</select>
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
                    <input type="text" class="form-control" name="month" id="month" placeholder="月" required=true />
								</div>
								<label class="col-xs-1 control-label">费用</label>
								<div class="col-xs-2">
                    <input type="text" class="form-control" name="fee" id="fee" placeholder="人民币" required=true />
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-1">上传图片</label>
								<div class="col-md-6">
											<a id="editable-sample_new"
												class="btn btn-success fileinput-button"
												data-container="body" data-toggle="popover"
												data-placement="right" data-content="最多只可添加20张图片哦！"> <i
												class="fa fa-plus"></i> 添加图片 </a>
											<p></p>
											<div id="imageBlock" style="display:inline-block; width:1100px"></div>
								</div>
							</div>
							<div class="form-group">
                 <label class="col-xs-1">服务内容</label>
                 <div class="col-xs-5">
                     <textarea id="content" class="wysihtml5 form-control" rows="5"
                     		required=true name="content"></textarea>
                 </div>
            	</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-xs-10">
									<button class="btn btn-primary" id="saveCreateAudit" type="submit"><i class="fa fa-check"></i> 提 交</button>
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
function getImageDiv(blockNum) {
	var imageDiv = '<div class="fileupload fileupload-new" id="fileupload'
			+ blockNum
			+ '" data-provides="fileupload" style="display:inline-block; width:200px">'
			+ '<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">'
			+ '<img src="/img/noImage.png" alt=""/>'
			+ '</div>'
			+ '<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>'
			+ '<div>'
			+ '<span class="btn btn-white btn-file">'
			+ '<span class="fileupload-new"><i class="fa fa-paper-clip"></i>选 择 图 片</span>'
			+ '<span class="fileupload-exists"><i class="fa fa-undo"></i> 更  换   </span>'
			+ '<input type="file" name="imageFile[]" multiple/>'
			+ '</span>'
			+ '<a class="btn btn-danger fileupload-exists" id="remove'
			+ blockNum
			+ '" onclick="removeImage('
			+ blockNum
			+ ')" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> 移  除   </a>'
			+ '</div>' + '<div id="errorMsg' + blockNum
			+ '" style="color: red"></div>' + '</div>';
	return imageDiv;
}
var divs = 1;
$(function() {
	$("#editable-sample_new").click(function() {
		if (divs < 21) {
			$("#imageBlock").append(getImageDiv(divs++));
		} else {
			$("[data-toggle='popover']").popover();
		}
	});
});

function removeImage(id) {
	var removeName = "fileupload" + id;
	$("#" + removeName).remove();
	$(function() {
		for (i = id; i < divs; i++) {
			$("#fileupload" + (i + 1)).attr("id", "fileupload" + i);
			$("#remove" + (i + 1)).attr("onclick", "removeImage(" + i + ")");
			$("#remove" + (i + 1)).attr("id", "remove" + i);
		}
	});
	divs--;
}
</script>
@endsection
