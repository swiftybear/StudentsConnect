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
  $title = "{$noti->titleNoti()} About • Students Connect";
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

  <div class="about_div inst">
    <img src="<?php echo DIR; ?>/assets/img/favicon.png" alt="students connect">
    <div class="">
      <span>Students connect is all about exploring notes, messaging students from other courses, department groups, notes photos, interacting with other major students and much more.</span>
  </br>    <span>If you are in the shoes of a freshmen student, you really know how useful this system specially when you are new to college and no new friends yet due to pandemic. This system will serve as a social site specifically designed for interactive sharing of notes for new MSU-IIT students and seniors, faculties as well. </span>
</br>  <span>Finally coming to the point, this website is developed I have no copyright claims see license for templates (creative commons).</span>
  </br>    <span>Students connect is hosted freely, so you'll find it bit slow and many of its features have been removed, such as real-time notifications and updates.</span>
</br>    <span>Designed for students. By students.</span>

    </div>
  </div>

</div>

<?php
if ($universal->isLoggedIn()) {
  include 'includes/footer.php';
} else if ($universal->isLoggedIn() == false) {
  include 'index_include/index_footer.php';
}
?>
