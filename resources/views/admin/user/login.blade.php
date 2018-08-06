<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/login_style.css" />
<link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/body.css"/> 
</head>
<body>
<div class="container">
	<section id="content">
		<form action="{{url('admin/user/check')}}" method="post">
			<h1>管理员登录</h1>
			<div>
				<input type="text" placeholder="用户名" required="" name="username" id="username" />
			</div>
			<div>
				<input type="password" placeholder="密码" required="" name="password" id="password" />
			</div>
			 <div class="">
				<span  class="help-block u-errormessage" id="js-server-helpinfo">{{session()->get('message') ?? ''}}&nbsp;</span>			
			</div> 
			<div>
				<input type="submit" value="登录" class="btn btn-primary" id="js-btn-login"/>
				{{csrf_field()}}
				<a href="#">忘记密码?</a>
			</div>
		</form>
	</section>
	 @if(session()->has('message'))
	<script type="text/javascript">
		var errorObj = document.getElementById('js-server-helpinfo');
		var n = 3;
		var myVar = setInterval(function(){myTimer()},1000);
		function myTimer(){
			n--;
			if(n<0){
				errorObj.innerText = ' ';
				clearTimer();
			}
		}
		function clearTimer(){
			clearInterval(myVar);
		}	
		
	</script>
	 @endif
		
</div>
</body>
</html>