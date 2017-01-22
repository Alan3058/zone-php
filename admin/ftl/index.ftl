<div class="container">
	<div class="col-sm-8">
		<a class="pull-right"
			href="{{$ARTICLE_NEW_URL}}">发表文章</a>
		{{foreach $list as $item}}
		<h3>
			<a href="{{$item.VIEW_ARTICLE_URL}}">{{$item.TITLE}}</a>
		</h3>
		<ul class="list-inline">
			<li>{{$item.AUTHOR}}</li>
			<li>{{$item.CREATE_TIME}}</li>
			<li>{{$item.CLASS_NAME}}</li>
		</ul>
		<div>{{$item.CONTENT}}</div>
		{{/foreach}}
	</div>
	{{$sidebar}}
</div>
