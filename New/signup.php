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
  $title = "Signup • Students Connect";
  $keywords = "Students Connect, Share and capture your notes!";
  $desc = "Students Connect lets you capture, follow, like and share notes in a better way and tell your story with photos, messages, posts and everything in between MSU IIT students";
?>

<?php include 'index_include/index_header.php'; ?>

<div class="container">

  <div class="log_sign">
    <a href="login" class="pri_btn">Already have an account?</a>
  </div>

  <div class="input_wrapper">
    <div class="display_text">
      <span>Start studying now!</span>
    </div>
    <div class="sign_up_div">
      <form class="sign_up" id="sign_up" action="" method="post">
        <input type="text" name="s_username" value="" autocomplete="off" placeholder="Username" class="s_username big_input" spellcheck="false" mssg="" maxlength="30" required autofocus>
        <div class="username_checker">
          <span class="checker_text">username not available</span>
          <span class="checker_icon">
            <i class="fa fa-frown-o" aria-hidden="true"></i>
          </span>
        </div>
        <input type="text" name="s_first_name" value="" autocomplete="off" placeholder="First name" class="s_firstname small_input" spellcheck="false" maxlength="20" required>
        <input type="text" name="s_surname" value="" autocomplete="off" placeholder="Surname" class="s_surname small_input" spellcheck="false" maxlength="20" required>


        <select name="s_department" value="" class="s_department"  autocomplete="off" spellcheck="false" type="text" maxlength="30" required>
          <option value ="" disabled selected>Select your department</option>
          <option value ="CBAA">CBAA</option>
          <option value ="CASS">CASS</option>
          <option value ="CCS">CCS</option>
          <option value ="COET">COET</option>
          <option value ="CON">CON</option>
          <option value ="CED">CED</option>
          <option value ="CSM">CSM</option>
          <option value ="OTHERS">Others (Org,DSA,OVCAA etc.)</option>
        </select>

        <input type="email" name="s_email" value="" autocomplete="off" placeholder="Email" class="s_email big_input" spellcheck="false" maxlength="52" required>
        <input type="password" name="s_password" value="" autocomplete="off" placeholder="Password" class="s_password big_input"  maxlength="32" spellcheck="false" required id="password">
        <span class="show_psswrd" id="show_psswrd">
          <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
        <div class="psswrd_strength">
          <div class="one"></div>
          <div class="two"></div>
          <div class="three"></div>
          <div class="four"></div>
        </div><br>
        <input type="checkbox" id="s_terms" name="s_terms" class="s_terms" required>
        <label for="s_terms" class="terms">I agree to <a href="https://docs.google.com/document/d/1jEf9A6RvzW_-Dw5l5knQxmTLjsPOHdZMkrC6Gy8Vsa0/edit?usp=sharing" target="_blank" class="a_pri">Students Connect Terms</a></label>
        <input type="submit" name="s_submit" value="Sign up for free" class="s_submit" >
      </form>
    </div>
  </div>

  <div class="notify">
    <span></span>
  </div>

</div>

<div class="overlay-2"></div>
<?php include 'index_include/index_footer.php'; ?>

<script type="text/javascript">


  $(function(){

    $('.s_username').username_checker();

    $('input[type="password"]').psswrd_strength();

    $('form').on('submit', (function(e){
      e.preventDefault();
      $('.s_submit').val('Please wait...Loading');
      $('.s_submit').prop('disabled', true);

      $('.overlay-2').show();

      var username = $('.s_username').val();
      var firstname = $('.s_firstname').val();
      var surname = $('.s_surname').val();
      var email = $('.s_email').val();
      var password = $('.s_password').val();
      var terms = $('.s_terms').val();
      var department = $('.s_department').val();
      $.ajax({
        url: DIR+"/ajaxify/ajax_requests/register_requests.php",
        method: 'POST',
        cache: false,
        data: {
          username: username,
          firstname: firstname,
          surname: surname,
          email: email,
          password: password,
          terms: terms,
          department: department
        },
        success: function(data){
          console.log(data);
          if (data == "Successfull") {
            console.log('yepp');
            $('.s_submit').prop('disabled', true);
            $('.s_submit').prop('value', 'Redirecting..');
            $('.overlay-2').show();
            // window.location.href = DIR+"/success";
            window.location.href = DIR;
          } else {
            $('.s_submit').prop('disabled', false);
            $('.overlay-2').hide();
            $('.notify').notify({ value: 'Hello ' + username + '!! Your email is already registered, Please login.' });
          }
        }
      });
    }));

    $('#show_psswrd').togglePassword({
      input: document.getElementById('password')
    });

  });


</script>
