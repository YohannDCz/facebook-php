<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/index.css">
<link rel="stylesheet" href="styles/publication.css">

<span class="material-icons-outlined" id="index_menuburger">menu</span>
<ul id="index_menuopen" class="index_menuopen">
  <li><a href="profile.php"><span class="material-icons">person</span>Nom Prénom</a></li>
  <li><a href="friends_list.php"><span class="material-icons-outlined">group</span>Amis</a></li>
  <li><a href="group_list.php"><span class="material-icons">groups</span>Groupes</a></li>
  <li><a href="page_list.php"><span class="material-icons-outlined">newspaper</span>Pages</a></li>
</ul>

<div class="index_main_container">

  <div class="index_route">
    <a href="profile.php">
      <div class="index_list_div">
        <span class="material-icons">person</span>
        <h4 class="gh">Nom Prénom</h4>
      </div>
    </a>

    <a href="friends_list.php">
      <div class="index_list_div">
        <span class="material-icons-outlined">group</span>
        <h4 class="gh">Amis</h4>
      </div>
    </a>

    <a href="group_list.php">
      <div class="index_list_div">
        <span class="material-icons">groups</span>
        <h4 class="gh">Groupes</h4>
      </div>
    </a>

    <a href="page_list.php">
      <div class="index_list_div">
        <span class="material-icons">newspaper</span>
        <h4 class="gh">Pages</h4>
      </div>
    </a>
  </div>



  <div class="index_list_publications">

    <div class="profile_publication_post">
      <div class="profile_publication_div_flex">
        <div>
          <img src="./img/pp.png" alt="profile_picture" class="group_friend_pp">
        </div>
        <div class="profile_publication_div_post">
          <textarea class="publication_person_comment_input" maxlength="500" placeholder="Que voulez-vous dire ?" oninput="autoResize(this)"></textarea>
        </div>
      </div>

      <div class="group_preview_publication_image">
        <div class="group_preview_publication_sub">
          <span class="material-icons">image</span>
          <p>Photo</p>
        </div>

        <div class="group_preview_publication_sub">
          <span class="material-icons">videocam</span>
          <p>Vidéo</p>
        </div>

      </div>
    </div>

    <div class="publication">

      <div class="publication_info">
        <div>
          <img src="./img/pp.png" alt="" class="group_friend_pp">
        </div>
        <div>
          <p>Nom Prénom</p>
        </div>
      </div>


      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus, dolorum perferendis veniam libero sunt dolores aspernatur facilis ipsum consequuntur officiis sint suscipit! Aliquid ipsum doloribus eius ipsa, vitae cupiditate?</p>

      <div class="publication_list_images">
        <img src="./img/blue-texture-marble.png" alt="" class="publication_image">
        <img src="./img/blue-texture-marble.png" alt="" class="publication_image">
        <img src="./img/blue-texture-marble.png" alt="" class="publication_image">
        <img src="./img/blue-texture-marble.png" alt="" class="publication_image">
      </div>

      <div class="publication_post_info">
        <p class="publication_persons_like"><a href="#">X personnes ont aimés</a></p>
        <p class="publication_persons_comment"><a href="#">X commentaires</a></p>
      </div>

      <div class="publication_post_reaction">
        <div class="group_preview_publication_sub">
          <span class="material-icons">thumb_up</span>
          <p>J'aime</p>
        </div>
        <div class="group_preview_publication_sub">
          <span class="material-icons">add_comment</span>
          <p>Commenter</p>
        </div>
        <div class="group_preview_publication_sub">
          <span class="material-icons">send</span>
          <p>Envoyer</p>
        </div>
      </div>


      <div class="publication_list_comments">

        <!-- un commentaire -->

        <div>
          <div class="publication_comment">
            <div class="publication_info">
              <img src="./img/pp.png" alt="" class="group_friend_pp">
            </div>

            <div>
              <div class="publication_person_comment">
                <p class="publication_name">Nom Prénom</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus vel cum dolorum accusantium eius neque odio accusamus, quos sequi alias. Aliquid eligendi commodi harum provident cum voluptatibus vitae, officia blanditiis.</p>
              </div>

              <div class="publication_person_comment_options_reaction">
                <div class="publication_person_comment_options">
                  <p>J'aime</p>
                  <p>Répondre</p>
                  <p>x h</p>
                </div>

                <div class="publication_comment_reaction">
                  <span class="material-icons">thumb_up</span>
                  <p>1000</p>
                </div>
              </div>

              <div class="publication_person_view_answer">
                <span class="material-icons-round">subdirectory_arrow_right</span>
                <p>X réponses</p>
              </div>

            </div>
          </div>
        </div>


        <!-- commentaire qui se répond a un autre-->
        <div class="publication_comment">

          <div class="publication_info">
            <img src="./img/pp.png" alt="" class="group_friend_pp">
          </div>

          <div>
            <div class="publication_person_comment">
              <p class="publication_name">Nom Prénom</p>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus vel cum dolorum accusantium eius neque odio accusamus, quos sequi alias. Aliquid eligendi commodi harum provident cum voluptatibus vitae, officia blanditiis.</p>
            </div>

            <div class="publication_person_comment_options_reaction">
              <div class="publication_person_comment_options">
                <p>J'aime</p>
                <p>Répondre</p>
                <p>x h</p>
              </div>

              <div class="publication_comment_reaction">
                <span class="material-icons">thumb_up</span>
                <p>1000</p>
              </div>
            </div>


            <div>
              <div class="publication_comment">
                <div class="publication_info">
                  <img src="./img/pp.png" alt="" class="group_friend_pp">
                </div>

                <div>
                  <div class="publication_person_comment">
                    <p class="publication_name">Nom Prénom</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus vel cum dolorum accusantium eius neque odio accusamus, quos sequi alias. Aliquid eligendi commodi harum provident cum voluptatibus vitae, officia blanditiis.</p>
                  </div>

                  <div class="publication_person_comment_options_reaction">
                    <div class="publication_person_comment_options">
                      <p>J'aime</p>
                      <p>Répondre</p>
                      <p>x h</p>
                    </div>

                    <div class="publication_comment_reaction">
                      <span class="material-icons">thumb_up</span>
                      <p>1000</p>
                    </div>
                  </div>

                  <div>
                    <div class="publication_comment">
                      <div class="publication_info">
                        <img src="./img/pp.png" alt="" class="group_friend_pp">
                      </div>

                      <div>
                        <div class="publication_person_comment">
                          <p class="publication_name">Nom Prénom</p>
                          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus vel cum dolorum accusantium eius neque odio accusamus, quos sequi alias. Aliquid eligendi commodi harum provident cum voluptatibus vitae, officia blanditiis.</p>
                        </div>
                        <div class="publication_person_comment_options_reaction">
                          <div class="publication_person_comment_options">
                            <p>J'aime</p>
                            <p>Répondre</p>
                            <p>x h</p>
                          </div>

                          <div class="publication_comment_reaction">
                            <span class="material-icons">thumb_up</span>
                            <p>1000</p>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- écrire un commentaire -->

      </div>

      <div>
        <div class="publication_comment">
          <div class="publication_info">
            <img src="./img/pp.png" alt="" class="group_friend_pp">
          </div>

          <div class="publication_person_comment">

            <textarea class="publication_person_comment_input" maxlength="300" placeholder="Ecrire un commentaire..." oninput="autoResize(this)"></textarea>
            <div class="publication_person_emoji_react">
              <div>
                <span class="material-icons-outlined">mood</span>
                <span class="material-icons-outlined">gif</span>
              </div>
              <span class="material-icons">send</span>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- fin publication -->

  </div>



  <div class="index_list_friends">
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>
    <div class="rr">
      <img src="img/pp.png" alt="Photo de profil">
      <span class="ps">Nom Prénom</span>
    </div>



  </div>

</div>


<script src="./scripts/script.js"></script>
<script src="./scripts/script_index.js"></script>

<?php
include 'footer.php'
?>