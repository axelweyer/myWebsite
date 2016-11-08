<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Axel Weyer - My Resume</title>
    <meta name="description" content="Axel Weyer's personnal website with my resume, my projects, my designs. Discover my professional career and contact me. ">
    <meta name="keywords" content="axel, weyer, resume, projects, cv" />
    <meta name="robots" content="axel, weyer, resume, projects, cv" />
    <meta name="author" content="Axel Weyer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/logo.png" />

    <!-- CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/utils/horizBarChart.css" rel="stylesheet">
    <link href="css/utils/freewall.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div id="content">
		<div id="topHeader">
			<p><i class="fa fa-envelope" aria-hidden="true"></i> Available for Freelance</p>
		</div>
		<div id="navigation">
			<span class="helper"></span>
			<img src="img/logo.png">
			<a class="hvr-underline-from-center <?php if(!isset($_GET['url']) || $_GET['url']=="home") echo ' green'; ?>" href="<?php echo URL; ?>home">
				RESUME
			</a>
			<a class="hvr-underline-from-center <?php if(isset($_GET['url']) && $_GET['url']=="projects") echo 'green'; ?>" href="<?php echo URL; ?>projects">
				PROJECTS
			</a>
			<a class="hvr-underline-from-center <?php if(isset($_GET['url']) && $_GET['url']=="design") echo 'green'; ?>" href="<?php echo URL; ?>design">
				PORTFOLIO
			</a>
			<a class="hvr-underline-from-center <?php if(isset($_GET['url']) && $_GET['url']=="blog") echo 'green'; ?>" href="<?php echo URL; ?>blog">
				BLOG
			</a>
			<a class="hvr-underline-from-center <?php if(isset($_GET['url']) && $_GET['url']=="toolbox") echo 'green'; ?>" href="<?php echo URL; ?>toolbox">
				MY TOOLBOX
			</a>
			<a class="hvr-underline-from-center pointer" id="contactButton">
				CONTACT
			</a>
		</div>
