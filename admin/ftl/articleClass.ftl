<div class="container">
	<div class="col-sm-8 col-sm-offset-2">
		<form class="form-horizontal" action="{{$SAVE_ARTICLECLASS_URL}}" method="post">
		<h3>文章类别管理</h3>
		<table class="table">
			<thead>
				<tr>
					<th>文章类别</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody id="articleClassDetailTbody">
			{{foreach $list as $item}}
				<tr>
					<td>
					<input type="text" class="text-hide" name="id[]" value="{{$item.ID}}" />
					<input type="text" class="input-lg" name="className[]" value="{{$item.CLASS_NAME}}" required/></td>
					<td><a id="articleClassAdd" onclick="ArticleClass.addHandler()">添加</a></td>
				</tr>
			{{foreachelse}}
				<tr>
					<td>
					<input type="text" class="text-hide" name="id[]"/>
					<input type="text" class="input-lg" name="className[]" required/></td>
					<td><a id="articleClassAdd" onclick="ArticleClass.addHandler()">添加</a></td>
				</tr>
			{{/foreach}}
			</tbody>
		</table>
		<input type="submit" class="btn btn-info btn-block" value="保存" />
		</form>
	</div>
</div>
<script type="text/javascript" src="admin/js/articleClass.js"></script>