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
  if (!$universal->isLoggedIn()) {
    header('Location: '.DIR.'/login');
  }
?>

<?php
  $title = "Email activation!! • Students Connect";
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
    <img src="<?php echo DIR; ?>/Frontpage/assets/img/favicon.png" alt="">
    <div class="">
      <span>
        <?php
            $e_v = $universal->e_verified($_SESSION['id']);
            if($e_v){
                echo "Your email has already been verified!!";
            } else {
                echo "Your email has been verified!!";
            }
        ?>
      </span>
    </div>
  </div>

</div>

<?php include 'includes/footer.php'; ?>
