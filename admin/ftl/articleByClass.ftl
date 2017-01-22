<div class="container">
	<div class="col-sm-8">
		{{foreach $list as $item}}
		<div>
			<h3>
				<a href="{{$item.VIEW_ARTICLE_URL}}">{{$item.TITLE}}</a>
			</h3>
			<ul class="list-inline">
				<li>{{$item.AUTHOR}}</li>
				<li>{{$item.CREATE_TIME}}</li>
				<li>{{$item.CLASS_NAME}}</li>
				<li class="pull-right"><a href="{{$item.ARTICLE_EDIT_URL}}">编辑</a></li>
			</ul>
			<div>{{$item.CONTENT}}</div>
		</div>
		{{/foreach}}
	</div>
	{{$sidebar}}
</div>
