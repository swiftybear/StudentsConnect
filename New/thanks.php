<?php include 'config/declare.php'; ?>

<!-- a universal file that has all the classes included -->
<?php include 'config/classesGetter.php'; ?>

<!-- creating objects -->
<?php
  $universal = new universal;
  $avatar = new Avatar;
  $noti = new notifications;
  $message = new message;
?>

<?php
  if (!$universal->isLoggedIn() || $universal->e_verified($_SESSION['id'])) {
    header('Location: '.DIR.'/login');
  }
?>

<?php
  $title = "Thanks for registering • Students Connect";
  $keywords = "Students Connect, Share and capture your notes!";
  $desc = "Students Connect lets you capture, follow, like and share notes in a better way and tell your story with photos, messages, posts and everything in between MSU IIT students";
?>

<?php
  include 'includes/header.php';
  include 'needs/heading.php';
  include 'needs/nav.php';
?>

<div class="badshah">

  <div class="about_div inst thanks_div">
    <img src="<?php echo DIR; ?>/assets/img/favicon.png" alt="students connect" style="width: 40px; height: 40px;">
    <div class="">
      <span><center>A message has been sent to you email. Check your inbox and click on the link provided in the message to verify your email. </center></br> <b><center> Feature under development. please ignore this and go to home or profile etc. </center></br> <center>Enjoy ! </center> <b></span>
    </div>
  </div>

</div>

<?php include 'includes/footer.php'; ?>
