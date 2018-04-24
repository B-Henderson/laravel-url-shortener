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
		<form action="" method="post">
			<div class="field">
				<label class="label">Url</label>
				<div class="control">
					<input class="input" type="url" placeholder="Input Url">					
				</div>
			</div>
			<div class="field is-grouped">
				<div class="control">
					<input type="submit" class="button is-link" value="Shorten">
				</div>
			</div>
		</form>
	</div>
	<script src="js/main.js"></script>
</body>
</html>