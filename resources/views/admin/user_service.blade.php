@extends('admin.index')

@section('content')
<link rel="stylesheet" type="text/css" href="/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<section class="wrapper site-min-height">
  <!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<ul class="breadcrumb">
					<li><i class="fa fa-dribbble"></i> 添加服务记录</li>
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
							enctype="multipart/form-data" id="commentForm" action="/user/updateService" method="post">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <input type="hidden" name="uid" value="{{$user->uid}}">
							<div class="form-group">
								<label class="col-xs-1 control-label">会员姓名</label>
								<div class="col-xs-2">
									<input type="text" class="form-control" name="name" id="name" required=true value="{{$user->name}}" readonly/>
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
