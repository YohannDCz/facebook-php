<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/chat.css">

<div class="messenger">
	<div class="sidebar">
		<div class="titre">
			<h2>Discussions</h2>
			<a href="#"><span class="material-icons-outlined">add</span></a>
		</div>

		<div class="amisinput_div">
			<input class="amisinput" type="text" placeholder="Rechercher...">
		</div>

		<ul>
			<li><img class="profile_pic" src="./img/pp.png" alt="">chris</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
			<li><img class="profile_pic" src="./img/pp.png" alt="">Jonathan</li>
		</ul>
	</div>

	<div class="chat">
		<div class="chatheader">
			<div class="chat_arrow_back_name" >
				<a href="#" class="chat_return">
					<span class="material-icons-outlined material-icons-round return_icon">arrow_back</span>
				</a>
				<a href="#">
					<div class="profile-info">
						<img class="profile_pic" src="./img/pp.png" alt="">
						<h4>chris</h4>
					</div>
				</a>
			</div>

			<div class="chat-header-icons">
				<a href="#"><span class="material-icons">call</span></a>
				<a href="#"><span class="material-icons">videocam</span></a>
			</div>
		</div>

		<div class="messages">
			<div class="message message-sent">
				<p>Hello, how are you?</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-sent">
				<p>I'm fine aswell</p>
			</div>
		</div>
		<div class="send-icons">
			<div class="icons_chat">
				<div class="icons_chat_sub">
					<a href="#"><span class="material-icons-outlined">add</span></a>
					<a href="#"><span class="material-icons-outlined">image</span></a>
				</div>
				<div class="icons_chat_sub">
					<a href="#"><span class="material-icons-outlined" id="description">description</span></a>
					<a href="#"><span class="material-icons-outlined" id="gif">gif_box</span></a>
				</div>
			</div>
			<div class="send-message">
				<div class="input-with-icon">
					<textarea class="publication_person_comment_input" maxlength="300" placeholder="Tapez un message..." oninput="autoResize(this)"></textarea>
				</div>
				<a href="#"><span class="material-icons-outlined">sentiment_satisfied</span></a>
				<button class="Submitbutton">Envoyer</button>
				<a href="#"><span class="material-icons chat_send">send</span></a>

			</div>
		</div>
	</div>
</div>
</div>
</body>
<script src="./scripts/script.js"></script>
<script src="./scripts/script_chat.js"></script>

</html>