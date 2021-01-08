<?php include 'config/declare.php'; ?>

<!-- a universal file that has all the classes included -->
<?php include 'config/classesGetter.php'; ?>

<!-- creating objects -->
<?php
  $universal = new universal;
  $avatar = new Avatar;
  $follow = new follow_system;
  $Post = new post;
  $Time = new time;
  $noti = new notifications;
  $message = new message;
?>

<?php
  if ($universal->isLoggedIn() == false) {
    header('Location:'. DIR .'/welcome');
  }
  $session = $_SESSION['id'];
?>

<?php
  $title = "Admin Page • Students Connect";
  $keywords = "Students Connect, Share and capture your notes!";
  $desc = "Students Connect lets you capture, follow, like and share notes in a better way and tell your story with photos, messages, posts and everything in between MSU IIT students";
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "studentsconnect";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!-- including files for header of document -->
<?php include 'includes/header.php'; ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Department', 'Number of students'],

          <?php
$query = "SELECT count(id) AS count, department FROM users GROUP BY department ASC";

$exec = mysqli_query($con,$query);
while($row = mysqli_fetch_array($exec)){

echo "['".$row['department']."',".$row['count']."],";
}
?>
        ]);

        var options = {
          title: 'Live number of users per department',

          'backgroundColor': '#f0f0f0',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>



    <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Department', 'Number of students'],

          <?php
$query = "SELECT count(hashtag_id) AS count, hashtag FROM hashtag GROUP BY hashtag ASC";

$exec = mysqli_query($con,$query);
while($row = mysqli_fetch_array($exec)){

echo "['".$row['hashtag']."',".$row['count']."],";
}
?>
        ]);

        var options = {
          title: 'Topic trendlines (all departments)',

          'backgroundColor': '#ffe3e3',

        };

        var chart = new google.visualization.ColumnChart(document.getElementById('piechart_3d2'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["geochart"]});
       google.setOnLoadCallback(drawRegionsMap);
       function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Department', 'Number of students'],

          <?php
$query = "SELECT count(id) AS count, department FROM users GROUP BY department";

$exec = mysqli_query($con,$query);
while($row = mysqli_fetch_array($exec)){

echo "['".$row['department']."',".$row['count']."],";
}
?>
        ]);

        var options = {
          title: 'Live number of unique users',
          subtitle: 'suckeer',
          'backgroundColor': '#e3eaff',
          is3D: true,
        };

        var chart = new google.visualization.GeoChart(document.getElementById('piechart_3d3'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Department', 'Number of posts'],

          <?php
$query = "SELECT count(`time`) AS count, `time` FROM post GROUP BY day(`time`)";




$exec = mysqli_query($con,$query);
while($row = mysqli_fetch_array($exec)){

echo "['".$row['time']."',".$row['count']."],";
}
?>
        ]);

        var options = {
          title: 'Live number of unique daily posts',
          subtitle: 'suckeer',
          'backgroundColor': '#e3e4ff',
          is3D: true,
          colors: ['green'],
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
     google.charts.load("current", {packages:["corechart"]});
     google.charts.setOnLoadCallback(drawChart);
     function drawChart() {
       var data = google.visualization.arrayToDataTable([


         ['type', 'count'],

         <?php
$query = "SELECT count(post_id) AS count, type FROM post GROUP BY type";

$exec = mysqli_query($con,$query);
while($row = mysqli_fetch_array($exec)){

echo "['".$row['type']."',".$row['count']."],";
}
?>
       ]);

       var options = {
         'backgroundColor': '#fff5e3',
         title: "Total content type posted",
         bar: {groupWidth: "95%"},
         legend: { position: "none" },
         colors: ['violet'],
       };
       var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
       chart.draw(data, options);
   }
   </script>

   <script type="text/javascript">
         google.charts.load('current', {'packages':['corechart']});
         google.charts.setOnLoadCallback(drawChart);

         function drawChart() {
           var data = google.visualization.arrayToDataTable([
             ['Year', 'Sales', 'Expenses'],
             ['2004',  1000,      400],
             ['2005',  1170,      460],
             ['2006',  660,       1120],
             ['2007',  1030,      540]
           ]);

           var options = {
             'backgroundColor':'#fcffe3',
             title: 'Company Performance',
             curveType: 'function',
             legend: { position: 'bottom' }

           };

           var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

           chart.draw(data, options);
         }
       </script>





<?php include_once 'needs/heading.php'; ?>
<?php include_once 'needs/nav.php'; ?>

<div class="user_info" data-userid="<?php echo $session; ?>" data-sessionid="<?php echo $session; ?>" data-username="<?php echo $universal->getUsernameFromSession(); ?>"></div>

<!-- TO MARK NOTIFICATIONS AS READ -->
<?php $noti->markRead(); ?>

<div class="overlay"></div>
<div class="notify"><span></span></div>
<div class="badshah">
  </br>
<table>
  <tr>   <div  style="width: 1058px; height: 50px; border:3px solid #52c471; background: #c0fcd0;">

    <span style="margin-left:13px; margin-right:13px;">Dashboard control panel:</span>
  <button class="btnwer" onClick="window.location.reload();"><i class="fa fa-refresh"></i> Refresh Charts</button>
  <button class="btnwer" ><i class="fa fa-eraser"></i> Clear cache</button>
  <button class="btnwer" ><i class="fa fa-upload"></i> Export/import data</button>
  <button class="btnwer" onClick="window.location.href='../../../../phpmyadmin/db_structure.php?server=1&db=studentsconnect'"><i class="fa fa-database"></i> View Database</button>
  <button class="btnwer" ><i class="fa fa-exclamation-triangle"></i> Reset stats</button>
  <button class="btnwer" ><i class="fa fa-ban"></i> Ban User</button>
  </div>

  </tr>
</br>
  <span style="margin-bottom:15px;"><b>Date and time:</b> <a id="demozz" style="color:black;"></a></br> <b>Server status: </b><i class='material-icons'style="font-size: 13px; color: green;" >brightness_1</i> Running </span>
<tr>
<th><div id="piechart_3d" style="width: 500px; height: 300px; border:2px solid black;"></div></th>
<th><div id="piechart_3d2" style="width: 500px; height: 300px; border:2px solid black;"></div></th>
<th><div id="curve_chart" style="width: 500px; height: 300px; border:2px solid black;"></div></th>
</tr>
  <tr>
  <th><div id="barchart_values" style="width: 500px; height: 300px; border:2px solid black;"></div></th>
  <th><div id="chart_div" style="width: 500px; height: 300px; border:2px solid black;"></div></th>
  <th><div style="width: 500px; height: 300px; border:2px solid black;">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2789.5243086668042!2d124.24372472979177!3d8.240736836815024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMTQnMjYuMCJOIDEyNMKwMTQnMzkuNyJF!5e0!3m2!1sen!2sph!4v1609324738248!5m2!1sen!2sph" width="500" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div></th>
</tr>
</table>



  </div>

<?php include_once 'needs/prompt.php'; ?>
<?php include_once 'needs/search.php'; ?>

<!-- including the footer of the document -->
<?php include_once 'includes/footer.php'; ?>

<script type="text/javascript">
  $(function(){
    LinkIndicator("notifications");
    $('.notifications').children().filter('.m_n_new').text('');
    $('.notification_span').html("<i class='material-icons'>notifications_none</i>");
  });
</script>
<script>
var d = new Date();
document.getElementById("demozz").innerHTML = d;
</script>
