<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link href="/assets/css/posts.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		
		$('#post_form').submit(function(){
			$.post(
				$('#post_form').attr('action'),
				$('#post_form').serialize(),
				function(post) {
					console.log(post.post_message);
					$('#main').append('<div class="allposts">'+post.post_message+'</div>');
				},
				"json"
			);
			return false;
		});

		$('#get_data').submit(function(){
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(posts) {
					console.log(posts);
					for(post in posts){
					$('#main').append("<div class='allposts'>"+posts[post].post_message+"</div>");
					};
				},
				"json"
			);
			return false;
		});

		$('#get_data').submit();
	});
	</script>
</head>
<body>
<div id="container">
<h1>My Posts:</h1>
<div id="main">
	
</div>
	<h4>Add a note:</h4>
	<form action="/index.php/posts/getdata" id="get_data"></form>
	<form action="/index.php/posts/postdata" method="post" id="post_form">
		<textarea name="message" id="post_text" cols="30" rows="5"></textarea>
		<input type="submit" value="Post It!" class="btn btn-info">
	</form>
</div>
</body>
</html>