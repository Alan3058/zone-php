<div class="container">
	<div class="col-sm-8">
		<div>
			<h3>
				{{$TITLE}}
			</h3>
			<ul class="list-inline">
				<li>{{$AUTHOR}}</li>
				<li>{{$CREATE_TIME}}</li>
				<li>{{$CLASS_NAME}}</li>
				<li class="pull-right"><a href="{{$ARTICLE_EDIT_URL}}">编辑</a></li>
			</ul>
			<div>{{$CONTENT}}</div>
		</div>
	</div>
	{{$sidebar}}
</div>
