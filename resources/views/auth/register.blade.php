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
<form class="form-signin" role="form" method="POST" action="/auth/register">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<h2 class="form-signin-heading">注册</h2>
	<div class="login-wrap">
			<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" autofocus>
			<input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
			<input type="password" class="form-control" name="password" placeholder="Password">
			<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
			<button class="btn btn-lg btn-login btn-block" type="submit">注册</button>
			<div class="registration">
					<a class="" href="/auth/login">
							返回登录
					</a>
			</div>
	</div>

</form>

@endsection
