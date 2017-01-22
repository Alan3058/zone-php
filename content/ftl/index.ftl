<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
	<!-- 轮播（Carousel）指标 -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0"></li>
		<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
		<div class="item">
			<div class="jumbotron">
				<div id="content" class="container">
					<div class="text-center">
						<h1>Now, Share Your Ideas!</h1>
						<p>Believe yourself,you are the best one.We are together to study and up.</p>
					</div>
					<blockquote>
						<small class="pull-right">ps: Good good study. Day day up.</small>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="item active">
			<div class="jumbotron">
				<div id="content" class="container">
					<div class="text-center">
						<h1>Now, Share Your Ideas!</h1>
						<p>Believe yourself,you are the best one.We are together to study and up.</p>
					</div>
					<blockquote>
						<small class="pull-right">ps: Good good study. Day day up.</small>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="jumbotron">
				<div id="content" class="container">
					<div class="text-center">
						<h1>Now, Share Your Ideas!</h1>
						<p>Believe yourself,you are the best one.We are together to study and up.</p>
					</div>
					<blockquote>
						<small class="pull-right">ps: Good good study. Day day up.</small>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
  	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    	<span class="sr-only">Previous</span>
  	</a>
  	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    	<span class="sr-only">Next</span>
  	</a>
</div>

<div class="container">
	<div class="col-sm-8">
		{{foreach $list as $item}}
		<h3>
			<a href="{{$item.VIEW_ARTICLE_URL}}">{{$item.TITLE}}</a>
		</h3>
		<ul class="list-inline">
			<li>{{$item.AUTHOR}}</li>
			<li>{{$item.CREATE_TIME}}</li>
			<li>{{$item.CLASS_NAME}}</li>
			<li class="pull-right"><a
				href="{{$item.VIEW_ARTICLE_URL}}#replyBlock">评论</a></li>
		</ul>
		<div>{{$item.CONTENT}}</div>
		{{/foreach}}
	</div>
	{{$sidebar}}
</div>
