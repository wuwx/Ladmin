@extends('web.layout.web')

@section('css')
<link href="{{asset('backend/plugins/md-editor/css/editormd.preview.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
		<!-- BEGIN PAGE CONTAINER -->
<div class="page-container page-body-background">

	<!-- BEGIN BREADCRUMBS -->
	<div class="row breadcrumbs margin-bottom-40">
		<div class="container">
			<div class="col-md-4 col-sm-4">
				<h1>博客</h1>
			</div>
			<div class="col-md-8 col-sm-8">
				<ul class="pull-right breadcrumb">
					<li><a href="index.html">首页</a></li>
					<li><a href="{{url('/blog')}}">博客</a></li>
					<li class="active">{{$article['title']}}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END BREADCRUMBS -->

	<!-- BEGIN CONTAINER -->
	<div class="container min-hight" >
		<!-- BEGIN BLOG -->
		<div class="row">
			<!-- BEGIN LEFT SIDEBAR -->
			<div class="col-md-9 col-sm-9 blog-posts margin-bottom-40 padding-right-30">

				<div class="row">

					<div id="editormd-view">
						<h1 class="text-center">{{$article['title']}}</h1>
						<p>
							<spa class="margin-left-10"><i class="glyphicon glyphicon-calendar"></i> {{$article['created_at']}}</spa>
							<span class="margin-left-10"><i class="glyphicon glyphicon-user"></i> {{$article['author']}}</span>
							<span class="margin-left-10"><i class="glyphicon glyphicon-eye-open"></i></span>
						</p>

						<textarea style="display: none" name="editormd-markdown-doc">{{$article['content']}}</textarea>
					</div>

					<div class="white_bg padding20">
						<hr class="blog-post-sep">

						<div id="SOHUCS" sid="{{$article['id']}}"></div>
					</div>

				</div>


			</div>
			<!-- END LEFT SIDEBAR -->

			<!-- BEGIN RIGHT SIDEBAR -->
			<div class="col-md-3 col-sm-3 blog-sidebar">

				<!-- BEGIN BLOG TAGS -->
				<div class="blog-tags margin-bottom-20">
					<h2>Tags</h2>
					<ul>
						<li><a href="#"><i class="fa fa-tags"></i>OS</a></li>
						<li><a href="#"><i class="fa fa-tags"></i>Metronic</a></li>
						<li><a href="#"><i class="fa fa-tags"></i>Dell</a></li>
						<li><a href="#"><i class="fa fa-tags"></i>Conquer</a></li>
						<li><a href="#"><i class="fa fa-tags"></i>MS</a></li>
						<li><a href="#"><i class="fa fa-tags"></i>Google</a></li>
						<li><a href="#"><i class="fa fa-tags"></i>Keenthemes</a></li>
						<li><a href="#"><i class="fa fa-tags"></i>Twitter</a></li>
					</ul>
				</div>
				<!-- END BLOG TAGS -->
			</div>
			<!-- END RIGHT SIDEBAR -->
		</div>
		<!-- END BEGIN BLOG -->
	</div>
	<!-- END CONTAINER -->

</div>
<!-- END BEGIN PAGE CONTAINER -->
@endsection

		
@section('js')
	<script src="{{asset('backend/plugins/md-editor/lib/marked.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/prettify.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/raphael.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/underscore.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/sequence-diagram.min.js')}}"></script>

	<script src="{{asset('backend/plugins/md-editor/lib/flowchart.min.js')}}"></script>
	<script src="{{asset('backend/plugins/md-editor/lib/jquery.flowchart.min.js')}}"></script>

	<script src="{{asset('backend/plugins/md-editor/js/editormd.js')}}"></script>
	<script type="text/javascript">
		$(function() {
			var editormdView;
			var markdown  = "";
			editormdView = editormd.markdownToHTML("editormd-view", {
				markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
				//htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
				htmlDecode      : "style,script,iframe",  // you can filter tags decode
				//toc             : false,
				theme : "dark",
				previewTheme : "dark",
				editorTheme : "pastel-on-dark",
				tocm            : true,    // Using [TOCM]
				//tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
				//gfm             : false,
				//tocDropdown     : true,
				// markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
				emoji           : true,
				taskList        : true,
				tex             : true,  // 默认不解析
				flowChart       : true,  // 默认不解析
				sequenceDiagram : true,  // 默认不解析
			});

			//console.log("返回一个 jQuery 实例 =>", testEditormdView);

			// 获取Markdown源码
			//console.log(testEditormdView.getMarkdown());

			//alert(testEditormdView.getMarkdown());

		});

	</script>

	<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
	<script type="text/javascript">
		window.changyan.api.config({
			appid: 'cysBeFLSg',
			conf: '85d88bacecaced21c43f8ded47c1760f'
		});
	</script>

@endsection
