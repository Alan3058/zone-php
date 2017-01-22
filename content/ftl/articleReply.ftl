<div class="row">
	<div>
		<h3>回复</h3>
	</div>
	<ul class="list-group">
		{{foreach $list as $item}}
		<div class="list-group-item">
			<div class="head">
				<h4>{{$item.REPLIER_NAME}}</h4>
			</div>
			<div class="body">{{$item.CONTENT}}</div>
			<div class="foot">
				<span class="operation"> <a href="#" class="btn-default"><span
						class="glyphicon glyphicon-thumbs-up"></span><span></span></a> <a
					href="#" class="btn-default"><span
						class="glyphicon glyphicon-thumbs-down"></span><span></span></a>
				</span> <span class="pull-right">{{$item.CREATE_TIME}}</span>
			</div>
		</div>
		{{/foreach}}
	</ul>
</div>
