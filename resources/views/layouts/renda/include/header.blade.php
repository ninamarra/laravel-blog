<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="{{ config('blog.description', 'Hello Nina') }}">
		<meta name="author" content="{{ config('blog.author', 'Hello Nina') }}">
		<link rel="icon" href="favicon.ico">
		<title>{{ config('blog.title', 'Hello Nina') }}</title>
		<!-- Bootstrap core CSS -->
		<link href="{{ asset('post/css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="{{ asset('post/css/style.css') }}" rel="stylesheet">
	</head>
	<body>
