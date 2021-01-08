<script type="text/javascript" src="public/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="public/js/modules.js"></script>
<script type="text/javascript" src="public/js/login_fn.js"></script>
<script type="text/javascript">
  $(function(){
    $('.index_header > .logo').on('click', function(e){
      window.location.href = "../";
    });
    //for replacing illegal characters
    $('.s_username, .s_password, .s_email, .s_firstname, .s_surname, .s_department').on('keyup', function(e){
      replacer($(this));
    });
  });
</script>
<noscript>
  <?php include 'needs/sec_no_script.php'; ?>
</noscript>

<video id="videoBG" poster="../assets/img/poster.png" playsinline autoplay muted loop>
  <source src="../assets/img/IITvideo.mp4" type="video/mp4">
</video>

</body>
</html>

<!-- https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js -->
