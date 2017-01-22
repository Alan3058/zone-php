<div class="container">
	<div class="col-sm-8">
		<div class="row">
			<h3>{{$TITLE}}</h3>
			<ul class="list-inline">
				<li>{{$AUTHOR}}</li>
				<li>{{$CREATE_TIME}}</li>
				<li>{{$CLASS_NAME}}</li>
				<li class="pull-right"><a href="#replyBlock">评论</a></li>
			</ul>
			<div>{{$CONTENT}}</div>
		</div>
		{{$articleReply}}
		<div class="row">
			<form action="{{$SAVE_REPLAY_URL}}" class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-sm-12">
						<h3 id="replyBlock">评论</h3>
					</div>
				</div>
				<!-- 加载编辑器的容器 -->
				<div class="form-group">
					<div class="col-sm-12">
						<script id="container" name="content" type="text/plain"></script>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label sr-only">你的用户名</label>
					<div class="col-sm-12">
						<input type="text" name="replierName"
							class="form-control input-lg" placeholder="输入你的用户名" required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label sr-only">你的邮箱</label>
					<div class="col-sm-12">
						<input type="text" name="replierEmail"
							class="form-control input-lg" placeholder="输入你的邮箱，我们将不会公开"
							required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label sr-only">验证码</label>
					<div class="col-sm-9">
						<input type="text" name="checkCode"
							class="form-control input-lg" placeholder="验证码" required />
					</div>
					<div class="col-sm-3">
						<img id="checkpic" onclick="this.src='checkCode.php?'+Math.random();" src='checkCode.php' />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" class="btn btn-primary btn-block" value="确定" />
					</div>
				</div>
			</form>
		</div>
	</div>
	{{$sidebar}}
</div>
<!-- 配置文件 -->
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
	var ue = UE.getEditor('container');
</script>
