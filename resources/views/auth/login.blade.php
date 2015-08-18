@extends('app')

@section('content')

@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
<form class="form-signin" role="form" method="POST" action="/auth/login">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<h2 class="form-signin-heading">登录</h2>
	<div class="login-wrap">
			<input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" autofocus>
			<input type="password" class="form-control" name="password" placeholder="Password">
			<label class="checkbox">
					<input type="checkbox" name="remember"> Remember me
			</label>
			<button class="btn btn-lg btn-login btn-block" type="submit">登录</button>
			<div class="registration">
					没有账号?
					<a class="" href="/auth/register">
							注册
					</a>
			</div>

	</div>
</form>
@endsection
