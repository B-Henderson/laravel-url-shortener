<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>URL Shortener</title>

	<link rel="author" href="humans.txt">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
	<link rel="stylesheet" href="{{ URL::to('css/global.css')}}">
</head>
<body>
	<div class="container">
		<h1 class="title">Shortern a URL</h1>

		@if($errors->has('url'))
		<p>{{$errors->first('url')}}</p>
		@endif

		@if(Session::has('global'))
		<p>{!! Session::get('global') !!}</p>

		@endif
		<form action="{{ route('make')  }}" method="post">
			{{ csrf_field() }}
			<div class="field has-addons">
				<div class="control is-expanded">
					<input class=" input is-medium is-info" type="url" placeholder="Input Url" name="url" {{(Request::old('url')) ? 'value='. Request::old('url') . '' : ''}}>
				</div>
				<div class="control">
					<input type="submit" class="button is-link is-medium" value="Shorten">
				</div>
			</div>
		</form>
	</div>
	<script src="js/main.js"></script>
</body>
</html>
