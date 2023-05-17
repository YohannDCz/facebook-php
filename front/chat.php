<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/chat.css">
<style>
    body {
        height: 100vh;
    }
</style>

<div class="messenger">
    <div class="sidebar">
        <div class="titre">
            <h2>Discussion</h2>
            <span class="material-icons-outlined" id="iconsidebar">add</span>
        </div>

        <div class="amisinput_div">
            <input class="amisinput" type="text" placeholder="Rechercher...">
        </div>

        <ul>
            <li>
                <img class="profile-pic" src="./img/pp.png" alt="">
                <p>Chris</p>
            </li>

            <li>
                <img class="profile-pic" src="./img/pp.png" alt="">
                <p>Jonathan</p>
            </li>

            <li>
                <img class="profile-pic" src="./img/pp.png" alt="">
                <p>Chris</p>
            </li>

            <li>
                <img class="profile-pic" src="./img/pp.png" alt="">
                <p>Jonathan</p>
            </li>

            <li>
                <img class="profile-pic" src="./img/pp.png" alt="">
                <p>Chris</p>
            </li>

            <li>
                <img class="profile-pic" src="./img/pp.png" alt="">
                <p>Jonathan</p>
            </li>

        </ul>
    </div>

    <div class="chat">
        <div class="chatheader">
            <div class="profile-info">
                <img class="profile-pic" src="./img/pp.png" alt="">
                <h3>chris</h3>
            </div>
            <div class="chat-header-icons">
                <span class="material-icons-outlined">call</span>
                <span class="material-icons-outlined">videocam</span>
            </div>
        </div>

        <div class="messages">

            <div class="chat_list_messages">

                <div class="message message-sent">
                    <p>Hello, how are you?</p>
                </div>

                <div class="message message-received">
                    <p>I'm doing well, thank you!</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>


                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswellI'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

                <div class="message message-sent">
                    <p>I'm fine aswell</p>
                </div>

            </div>


            <div class="send-icons">

                <div class="icons_chat">
                    <span class="material-icons-outlined">add</span>
                    <span class="material-icons-outlined">image</span>
                    <span class="material-icons-outlined" id="description">description</span>
                    <span class="material-icons-outlined" id="gif">gif_box</span>
                </div>

                <div class="send-message">
                    <div class="input-with-icon">
                        <textarea class="publication_person_comment_input" maxlength="300" placeholder="Tapez un message..." oninput="autoResize(this)"></textarea>
                    </div>
                </div>
                <span class="material-icons-outlined">sentiment_satisfied</span>
                <div class="chat_send_button_div">
                    <button class="chat_send_button">Envoyer</button>
                </div>
            </div>

        </div>

    </div>

</div>

</body>
<script src="./scripts/script_chat.js"></script>
<script src="./scripts/script.js"></script>

</html>