<?php include 'template/components/header.php' ?>
<link rel="stylesheet" href="../template/styles/chat.css">
<!-- <script src="https://cdn.tiny.cloud/1/z17gfgevxujzuemvrdmwbdygwnielkig51xlygvl85jbhatz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({
		selector: "#chat_textarea",
		plugins: "emoticons",
		toolbar: "emoticons",
		toolbar_location: "bottom",
		menubar: false,
		width: "100%",
		height: 100,
		resize: "none", // Désactivez la fonction de redimensionnement
		branding: false, // Masquez la signature de l'API TinyMCE
		statusbar: false, // Masquez la barre de statut
		content_css: "../template/styles/chat.css",
	}); -->
</script>
<div class="messenger">
	<div class="sidebar">
		<div class="titre">
			<h2>Discussions</h2>
			<a href="#"><span class="material-icons-outlined" id="button_create_group">add</span></a>
			<!-- <div id="chat_create_group"> -->
			<form action="" method="POST" id="chat_create_group">
				<h3>Créer un groupe de conversation</h3>
				<input type="text" class="amisinput" required placeholder="Nom du groupe...">
				<input type="text" class="amisinput" required placeholder="URL de l'image de groupe...">
				<label for="invites[]">Invitez vos amis :</label>
				<select name="invites[]" id="invites[]" multiple required class="amisinput">
					<option value="ami1">Ami 1</option>
					<option value="ami2">Ami 2</option>
					<option value="ami3">Ami 3</option>
					<option value="ami4">Ami 4</option>
					<option value="ami5">Ami 5</option>
				</select>
				<p class="chat_create_p">Maintenez <code>CTRL + clic gauche</code> pour sélectionner plusieurs amis</p>
				<input type="submit" class="Submitbutton" value="Créer le groupe de conversation">
			</form>
			<!-- </div> -->
		</div>

		<form class="amisinput_div" action="" method="GET">
			<input class="amisinput" type="text" placeholder="Rechercher...">
		</form>

		<ul>
			<li class="chat_conv"><img class="profile_pic" src="../template/img/pp.png" alt="">
				<p>Chris</p>
				<span class="material-icons-outlined chat_conv_more">more_horiz</span>
				<ul class="chat_conv_menu">
					<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
					<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
				</ul>
			</li>
			<li class="chat_conv"><img class="profile_pic" src="../template/img/pp.png" alt="">
				<p>Jonathan</p>
				<span class="material-icons-outlined chat_conv_more">more_horiz</span>
				<ul class="chat_conv_menu">
					<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
					<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
				</ul>
			</li>
			<li class="chat_conv"><img class="profile_pic" src="../template/img/pp.png" alt="">
				<p>Hugo</p>
				<span class="material-icons-outlined chat_conv_more">more_horiz</span>
				<ul class="chat_conv_menu">
					<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
					<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
				</ul>
			</li>
			<li class="chat_conv"><img class="profile_pic" src="../template/img/pp.png" alt="">
				<p>Les aigris</p>
				<span class="material-icons-outlined chat_conv_more">more_horiz</span>
				<ul class="chat_conv_menu">
					<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
					<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
				</ul>
			</li>
			<li class="chat_conv"><img class="profile_pic" src="../template/img/pp.png" alt="">
				<p>Projet Hétic</p>
				<span class="material-icons-outlined chat_conv_more">more_horiz</span>
				<ul class="chat_conv_menu">
					<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
					<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
				</ul>
			</li>
			<li class="chat_conv"><img class="profile_pic" src="../template/img/pp.png" alt="">
				<p>Le groupe Capybara</p>
				<span class="material-icons-outlined chat_conv_more">more_horiz</span>
				<ul class="chat_conv_menu">
					<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
					<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
				</ul>
			</li>

		</ul>
	</div>

	<div class="chat">
		<div class="chatheader">
			<div class="chat_arrow_back_name">
				<a href="#" class="chat_return">
					<span class="material-icons-outlined material-icons-round return_icon">arrow_back</span>
				</a>
				<a href="#">
					<div class="profile-info">
						<img class="profile_pic" src="../template/img/pp.png" alt="">
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

			<div class="msg-sent">
				<div class="message message-sent">
					<p>Hello, long time no see!</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_sent">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-sent">
				<div class="message message-sent">
					<p>How are you?</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_sent">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-received">
				<img class="profile_pic" src="../template/img/pp.png" alt="">
				<div class="message message-received">
					<p>I'm doing well, thank you! What about you? 😊</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_received">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-received">
				<img class="profile_pic" src="../template/img/pp.png" alt="">
				<div class="message message-received">
					<p>I have been really busy recently but now I am on holiday! I am really excited to go the beach!</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_received">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-sent">
				<div class="message message-sent">
					<p>I am fine too.</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_sent">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-sent">
				<div class="message message-sent">
					<p>You are so lucky, I wish to be in holidays too... 😭</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_sent">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-sent">
				<div class="message message-sent">
					<p>I have class everyday until June...</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_sent">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-received">
				<img class="profile_pic" src="../template/img/pp.png" alt="">
				<div class="message message-received">
					<p>Good luck!</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_received">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-received">
				<img class="profile_pic" src="../template/img/pp.png" alt="">
				<div class="message message-received">
					<p>I hope we can hang out together when you will have free time.</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_received">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>


			<div class="msg-sent">
				<div class="message message-sent">
					<p>Yeep me too! I have a project to finish 😖 I hope we will finish at time with my group.</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_sent">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-sent">
				<div class="message message-sent">
					<p>I have to go, see you asap!</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_sent">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
			</div>

			<div class="msg-received">
				<img class="profile_pic" src="../template/img/pp.png" alt="">
				<div class="message message-received">
					<p>Glhf with your project. Cyaa!</p>
				</div>
				<div class="edit-button"><span class="material-icons-outlined chat_more">more_horiz</span>
					<ul class="menu2 menu2_received">
						<li><a href=""><span class="material-icons-outlined">edit</span>Modifier</a></li>
						<li><a href=""><span class="material-icons-outlined">delete</span>Supprimer</a></li>
					</ul>
				</div>
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
			<form class="send-message" action="" method="post">
				<div class="input-with-icon">
					<textarea class="publication_person_comment_input" id="chat_textarea" maxlength="300" required placeholder="Tapez un message..." oninput="autoResize(this)"></textarea>
				</div>
				<a href="#"><span class="material-icons-outlined">sentiment_satisfied</span></a>
				<input type="submit" class="Submitbutton" value="Envoyer">
				<a href="#"><span class="material-icons chat_send">send</span></a>
			</form>
		</div>
	</div>

</div>
</div>
</body>
<script src="../template/scripts/script.js"></script>
<script src="../template/scripts/script_chat.js"></script>

</html>