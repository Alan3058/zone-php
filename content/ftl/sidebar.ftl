<div class="col-sm-3 col-sm-offset-1 sidebar">
	<div class="widget">
		<h3>文章分类</h3>
		<ul class="nav">
			{{foreach $list as $item}}
			<li><a href="{{$CLASS_URL}}{{$item.ID}}">{{$item.CLASS_NAME}}[{{$item.ARTICLE_QTY}}]</a></li>
			{{/foreach}}
		</ul>
	</div>
</div>