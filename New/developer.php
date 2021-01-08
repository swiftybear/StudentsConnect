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
  $title = "{$noti->titleNoti()} Developer • Students Connect";
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

  <div class="dev_div inst">

    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fphoto%2F%3Ffbid%3D4065251653501382%26set%3Da.153570024669584&width=500&show_text=true&height=534&appId" width="500" height="534" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

    <span>Developed by <a href="<?php echo DIR; ?>/profile/takkar007">Marlou Rentucan and Team</a> 20 years old and currently living in Iligan City.</span></br>
    <span><center>He's a full-stack developer and mostly writes code in JavaScript & Visual basic as these are his favourite languages. And why he is programmer - 'coz he thinks programming languages can make anyone a magician!!</center></span>
    <div class="dev_div_links">
      <a href="https://www.facebook.com/pipsqueeeak/" class="sec_btn">Go to Facebook</a>
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
