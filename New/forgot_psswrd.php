<?php
  $title = "Forgot password • Students Connect";
  $keywords = "Students Connect, Share and capture your notes!";
  $desc = "Students Connect lets you capture, follow, like and share notes in a better way and tell your story with photos, messages, posts and everything in between MSU IIT students";
?>

<?php include 'index_include/index_header.php'; ?>
<div class="notify"><span></span></div>
<div class="forgot">
  <div class="forgot_info">
    <span>Password retrieval</span>
  </div>
  <div class="forgot_main">
    <form class="forgot_form" action="" method="post">
      <span>Please enter the email you registered with</span>
      <input type="text" name="forgot_text" value="" placeholder="Your email.." required spellcheck="false" autofocus class="forget_text" id="forget_text">
      <input type="submit" name="forgot_submit" value="Recover" class="f_p_submit">
    </form>
  </div>
</div>

<div class="overlay-2"></div>

<?php include 'index_include/index_footer.php'; ?>
<script type="text/javascript">
  $('.forgot').passwordRetrieval();
</script>
