<?php 
	/* Check session */
	include('config/session.php');

	/* Session expiry */
	include('config/session_expiry.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dev Quiz</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" type="text/css" href="css/home.css">

	<!-- Include header (links to css files and navbar) -->
	<?php include('templates/header.php') ?>

	<div id="content">
		<!-- Header -->
		<header id="website_purpose">
			<h2>Hello <?php echo $_SESSION['username'] ;?></h2>
			<h2>Welcome to DEVQUIZ</h2>
			<h4>The most comprehensive resource with a lot of quality programming quiz, questions and tutorials that help you to improve you programming knowledge.</h4>
		</header>

		<!-- Main tag(includes explaination about technologies and some examples) -->
		<main id="main">
			<!-- Explaination HTML -->
			<div class="card-container technology_explanation box" id="box_html_explanation">
				<div class="card">
				    <div class="front">
						<h4>HTML (HyperText Markup Language)</h4>
					</div>
					<div class="back">
						<p>
						The code that is used to structure a web page and its content. For example, content could be structured within a set of paragraphs, a list of bulleted points, or using images and data tables. As the title suggests, this article will give you a basic understanding of HTML and its functions.
						</p>
						<!-- Level buttons -->
						<div>
							<button id="level1" onclick="redirect(1,1);";>Beginner</button>
							<button id="level2" onclick="redirect(1,2);";>Intermediate</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Example HTML -->
			<div class="box" id="box_html_example">
				<pre>
					&lt;!DOCTYPE html&gt;
					&lt;html&gt;
					&lt;title&gt;Welcome to HTML Web Development&lt;/title&gt;
					&lt;body&gt;
					&lt;/body&gt;
					&lt;/html&gt;
				</pre>
			</div>

			<!-- Explaination CSS -->
			<div class="card-container technology_explanation box" id="box_css_explanation">
				<div class="cardCSS">
				    <div class="front">
						<h4>CSS (Cascading Style Sheets)</h4>
					</div>
					<div class="back">
						<p>
							A style sheet language that specifies how documents are presented to users — how they are styled, laid out
							CSS can be used for very basic document text styling — for example changing the color and size of headings and links. It can be used to create layout
						</p>
						<!-- Level buttons -->
						<div>
							<button id="level1" onclick="redirect(2,1);";>Beginner</button>
							<button id="level2" onclick="redirect(2,2);";>Intermediate</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Example CSS -->
			<div class="box" id="box_css_example">
				<pre>
					body {
						background-color:#d0d4ff; }
					h2 {
						color:green;
						text-align:center; }
					p {
					font-family:"Times New Roman";
					font-size:24px; }
				</pre>	
			</div>

			<!-- Explaination JavaScript -->
			<div class="card-container technology_explanation box" id="box_js_explanation">
				<div class="cardJS">
				    <div class="front">
						<h4>JavaScript</h4>
					</div>
					<div class="back">				
						<p>
							A programming language that adds interactivity to your website (for example games, responses when buttons are pressed or data is entered in forms, dynamic styling, and  animation). This article helps you get started with this exciting language and gives you an idea of what is possible.				
						</p>
						<!-- Level buttons -->
						<div>
							<button id="level1" onclick="redirect(3,1);";>Beginner</button>
							<button id="level2" onclick="redirect(3,2);";>Intermediate</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Example JavaScript -->
			<div class="box" id="box_js_example">
				<pre>
					let iceCream = 'chocolate';
					if(iceCream === 'chocolate') {
						alert('Yay, I love chocolate ice cream!');    
					} else {
						alert('Awwww, but chocolate is my favorite...');    
					}
				</pre>	
			</div>
		</main>
	</div>

	<!-- Include footer -->
	<?php include('templates/footer.php') ?>

	<!-- JS -->
	<script type="text/javascript" src="js/anime.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>