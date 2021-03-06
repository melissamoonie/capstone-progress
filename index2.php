<!-- coded with the help of a udemy tutorial -->


<?php 
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post2.php");



if(isset($_POST['post'])){

	$uploadOk = 1;
	$imageName = $_FILES['fileToUpload']['name'];
	$errorMessage = "";

	if($imageName != "") {
		$targetDir = "assets/images/posts/";
		$imageName = $targetDir . uniqid() . basename($imageName);
		$imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);

		if($_FILES['fileToUpload']['size'] > 10000000) {
			$errorMessage = "Sorry your file is too large";
			$uploadOk = 0;
		}

		if(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
			$errorMessage = "Sorry, only jpeg, jpg and png files are allowed";
			$uploadOk = 0;
		}

		if($uploadOk) {
			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imageName)) {
				//image uploaded okay
			}
			else {
				//image did not upload
				$uploadOk = 0;
			}
		}

	}

	if($uploadOk) {
		$post = new Post($con, $userLoggedIn);
		$post->submitPost($_POST['post_text'], 'none', $imageName);
	}
	else {
		echo "<div style='text-align:center;' class='alert alert-danger'>
				$errorMessage
			</div>";
	}

}


 ?>
	<div class="user_details column">
	<h4>Camper Profile</h4>
		<a href="<?php echo $userLoggedIn; ?>">  <img src="<?php echo $user['profile_pic']; ?>"> </a>

		<div class="user_details_left_right">
			<a href="<?php echo $userLoggedIn; ?>">
			<?php 
			echo $user['first_name'] . " " . $user['last_name'];

			 ?>
			</a>
			<br>
			<?php echo "Posts: " . $user['num_posts']. "<br>"; 
			echo "Likes: " . $user['num_likes'];

			?>
		</div>

	</div>
<!-- <div class="user_details_left_right"> --><br><br>
	<br><Br><br><br><br><Br><br><br><br><div class="user_details_left column">


<h4>Trending Articles</h4>
<br>
<ul>Mystery Mountain Toilet</ul>
<ul><b>Camp Verde Hot Springs:</b> How to get there and what to bring.</ul>
<ul>What it takes to do a <b>90 foot backflip</b>. Mental Preparation for the big jump.</ul>
<ul><b>Diving in Cuba:</b> The mysterious hotel diving platform.</ul>
<ul><b>Cliff Diving Legality:</b> An Interview with Jordan Solario</ul>
<ul>Learning to Cliff Dive in My 20's: An Article by Mercedes Cordova</ul>
	</div><br>

<!-- </div> -->

	<div class="main_column column">
<img src="assets/images/backgrounds/banner4.png" width="100%;">



	<h2>Cliff Diving Legality</h2>
<h3>An Interview with Jordan Solorio</h3>
<br>
<p><b>How often do police officers or park rangers crash your party on the cliffs?</b><br><br>

You would surprised on how rarely i get stopped by law enforcement. I've been cliff diving for about a year a half now and id say out of all my times going out to spot after spot I’ve gotten caught and fined about six or seven times. What usually helps is when i get touch with people that have been to places that I'm considering on going to on Information about the spot. i either ask about where to park or If the area is monitored by law enforcement or rangers and that usually helps.<br><br>


<b>Describe an experience where you were stopped from cliff diving by law enforcement. Was the area private or public?</b><br><br>

One time I was diving at a place known as Adams falls in Pennsylvania, I was walking up a trail to jump from the bigger cliff and as everyone was looking at me about to jump i noticed two park rangers approaching our crew from behind. Nobody noticed until i pointed at the rangers and everyone turned around. when i got down they escorted us back to their car but in the end we got off with just a warning. <br><br>


<b>Obviously you have trained very hard to send huge cliffs, but do you think these areas should be publicly available to the untrained?</b><br><br>

No, i wouldn't like to see people who are untrained and unexperienced with diving to be introduced these places that have no lifeguards on duty. Diving from cliffs and waterfalls or basically any other high platform is especially dangerous to people who are both familiar and unfamiliar with diving. in my opinion i believe there should be areas that allow diving for people who would like to be apart of the sport that have both lifeguards and well-taught teachers on location to better coach people on how to dive. <br><br>

There are more deaths from rafting every year but it remains legal. What steps does cliff-diving have to take to legitimize the sport.

i think there should be less of a gap between the practices and competitions of diving at high schools and colleges and cliff diving from waterfalls and other scenic cliff diving spots around the world. 

How do you think deaths from cliff diving have effected the legality and how can the scene turn this public perception around.

i think what people need to see is how much love the cliff diving community has for the sport, its incomparable to anything I've ever seen or been apart of. Divers put their heart and sole into traveling to different places around the world and being more involved with people who share the same love and dedication for diving. 




How do you think cliff diving culture can overcome the taboo, and dangerous reputation associated with hucking your body from heights?

i think what people in the cliff diving community are doing now is a great way for people to look past the common interpretation of jumping off cliffs. There are videos that talk about cleaning up trash from spots to videos that demonstrate safe cliff diving. these are great ideas to have around to show people that we take a lot more precaution and consideration on whenever we go out to cliff dive. 


How are you able to find all these places to practice your diving?

For me it'll come from driving or hiking from place to place or just by talking to friends. theres a lot you can look for depending on the area you go hiking at. Whenever I'm in the mood to find other spots i look for either rivers or bodies of water on maps. Another way i find the majority of the places to go for diving is by a user submitted app called big swings. people from around the world can post either their local spots or places that they've been to that want to share that experience for other people.
</p>

		<form class="post_form" action="index2.php" method="POST" enctype= "multipart/form-data">
		<input type="file" name="fileToUpload" id="fileToUpload">
			<textarea name="post_text" id="post_text" placeholder="Got something to say?"></textarea>
			<input type="submit" name="post" id="post_button" value="Post">
			<hr>

		</form>

		<div class="posts_area"></div>
		<!-- <button id="load_more">Load More Posts</button> -->
		<img id="loading" src="assets/images/icons/loading.gif">


	</div>
<!-- 	<div class="wrapper"><div style="text-align:center;" class="alert alert-success alert-dismissible" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  		for lots of great programming stuff such as bonus tutorials, additional content, tips, tricks and information about my upcoming courses! 
  		</div>

 -->

	<br><br><br><br><br><br><br><br>

			<script>
	var userLoggedIn = '<?php echo $userLoggedIn; ?>';

	$(document).ready(function() {

		$('#loading').show();

		//Original ajax request for loading first posts 
		$.ajax({
			url: "includes/handlers/ajax_load_posts2.php",
			type: "POST",
			data: "page=1&userLoggedIn=" + userLoggedIn,
			cache:false,

			success: function(data) {
				$('#loading').hide();
				$('.posts_area').html(data);
			}
		});

		$(window).scroll(function() {
		//$('#load_more').on("click", function() {

			var height = $('.posts_area').height(); //Div containing posts
			var scroll_top = $(this).scrollTop();
			var page = $('.posts_area').find('.nextPage').val();
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();

			if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
			//if (noMorePosts == 'false') {
				$('#loading').show();

				var ajaxReq = $.ajax({
					url: "includes/handlers/ajax_load_posts.php",
					type: "POST",
					data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
					cache:false,

					success: function(response) {
						$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage 
						$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage 
						$('.posts_area').find('.noMorePostsText').remove(); //Removes current .nextpage 

						$('#loading').hide();
						$('.posts_area').append(response);
					}
				});

			} //End if 

			return false;

		}); //End (window).scroll(function())


	});

	</script>




	</div>
</body>
</html>