<div class="container">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<form action="{{$SAVE_ARTICLE_URL}}" class="form-horizontal" method="post">
			<input type="text" name="id" value="{{$ID}}"
				class="text-hide" />
			<div class="form-group">
				<label class="control-label sr-only">文章标题</label>
				<div class="col-sm-12">
					<input type="text" name="title"
						value="{{$TITLE}}" class="input-lg col-sm-12"
						placeholder="文章标题" required />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<input class="input" type="checkbox" name="isPublic" value="1" {{if $IS_PUBLIC==1}}checked{{/if}}>是否公开</input>
					<input class="input" type="checkbox" name="isPublish" value="1" {{if $IS_PUBLISH==1}}checked{{/if}}>是否发布</input>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label sr-only">类别</label>
				<div class="col-sm-12">
					<select name="classId" class="form-control">
						<option></option>
						{{foreach $list as $item}}
						<option value="{{$item.ID}}" {{if $CLASS_ID == $item.ID}} selected{{/if}}>{{$item.CLASS_NAME}}</option>
						{{/foreach}}
 					</select>
				</div>
			</div>
			<!-- 加载编辑器的容器 -->
			<div class="form-group">
				<div class="col-sm-12">
					<script id="container" name="content" type="text/plain">{{$CONTENT}}</script>
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
<!-- 配置文件 -->
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
   var ue = UE.getEditor('container',{autoHeightEnabled: false,initialFrameHeight:400});
</script>
