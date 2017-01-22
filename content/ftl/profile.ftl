<div class="container">
	<div>
	</div>
	<div class="row">
		<form id="userInfo" class="col-md-offset-3 col-md-6 form-horizontal">
			<div class="form-group">
				<h3>基本信息</h3>
				<span class="col-sm-offset-2 error"><?php echo $errorInfo?></span>
			</div>
			<div class="form-group">
				<label class="control-label sr-only">用户名</label>
				<div class="col-sm-12">
					<input type="text" name="userName" class="form-control input-lg"
						placeholder="用户名" required value="{{$USER_NAME}}" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label sr-only">昵称</label>
				<div class="col-sm-12">
					<input type="text" name="nickName" class="form-control input-lg"
						placeholder="昵称" required value="{{$NICK_NAME}}" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label sr-only">邮箱</label>
				<div class="col-sm-12">
					<input type="text" name="email" class="form-control input-lg"
						placeholder="邮箱" required value="{{$EMAIL}}" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label sr-only">手机号码</label>
				<div class="col-sm-12">
					<input type="text" name="mobile" class="form-control input-lg"
						placeholder="手机号码" required value="{{$MOBILE}}" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label sr-only">个人说明</label>
				<div class="col-sm-12">
					<input type="text" name="personalShow" class="form-control input-lg"
						placeholder="个人说明" required value="{{$PERSONAL_SHOW}}" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<a class="btn btn-primary btn-block" onclick="saveUserInfo();">保存</a>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	function saveUserInfo(){
		$.post("profile.php?a=save",$("#userInfo").serialize(),function(data){
			alert(data);
		} );
	}
</script>