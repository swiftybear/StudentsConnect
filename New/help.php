<?php include 'config/declare.php'; ?>

<!-- a universal file that has all the classes included -->
<?php include 'config/classesGetter.php'; ?>

<!-- creating objects -->
<?php
  $universal = new universal;
  $avatar = new Avatar;
  $post = new post;
  $noti = new notifications;
  $message = new message;
?>

<?php
  $title = "{$noti->titleNoti()} Help for you • Students Connect";
  $keywords = "Students Connect, Share and capture your notes!";
    $desc = "Students Connect lets you capture, follow, like and share notes in a better way and tell your story with photos, messages, posts and everything in between MSU IIT students";
?>

<!-- including files for header of document -->
<?php
  if ($universal->isLoggedIn()) {
    include 'includes/header.php';
    include 'needs/heading.php';
    include 'needs/nav.php';
    include_once 'needs/search.php';
  } else if ($universal->isLoggedIn() == false) {
    include 'index_include/index_header.php';
  }
?>

<div class="overlay"></div>
<div class="notify"><span></span></div>
<div class="badshah">

  <div class="help_div">
    <img src="<?php echo DIR; ?>/images/needs/empty_screen_face-905ec56ff4d5ef0004450379807fd170.gif" alt="">
    <h3>Need Help? Contact Marlou Rentucan.. Video on system tour and tutorial coming soon.</h3>
  </div>

</div>

<?php
if ($universal->isLoggedIn()) {
  include 'includes/footer.php';
} else if ($universal->isLoggedIn() == false) {
  include 'index_include/index_footer.php';
}
?>
