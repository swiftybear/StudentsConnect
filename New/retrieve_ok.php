<?php include 'config/declare.php'; ?>

<!-- a universal file that has all the classes included -->
<?php include 'config/classesGetter.php'; ?>

<!-- creating objects -->
<?php
  $universal = new universal;
?>

<?php
  if ($universal->isLoggedIn()) {
    header('Location: '.DIR);
  }
?>

<?php
  $title = "Thanks for registering • Students Connect";
  $keywords = "Students Connect, Share and capture your notes!";
    $desc = "Students Connect lets you capture, follow, like and share notes in a better way and tell your story with photos, messages, posts and everything in between MSU IIT students";
?>

<?php include 'index_include/index_header.php'; ?>

<div class="badshah">

  <div class="about_div inst thanks_div">
    <img src="<?php echo DIR; ?>/Frontpage/assets/img/favicon.png" alt="">
    <div class="">
      <span>A message has been sent to you email. Check your inbox and click on the link provided in the message to retrieve your account.</span>
    </div>
  </div>

</div>

<?php include 'index_include/index_footer.php'; ?>
