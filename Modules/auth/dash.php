<?php require '../inc/protect.php';
include '../inc/timer.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <link rel="stylesheet" href="../../Assets/css/dash.css" />
  <body>
    <header>
      <h3>Welcome <?php
      $user = $_SESSION['user'];
      echo $user;
      ?></h3>
      <div class="sub-header">
        <div class="countdown-timer">
          <?php echo gmdate('H:i:s', $remainingTime); ?>
        </div>
        <div class="date_date_set">
          <div class="time-started">
            Time Started: <?php
            $today = date('H:i:s');
            echo $today;
            ?>
          </div>
          <div class="date-started">
            Date Started: <?php
            $today = date('Y/m/d');
            echo $today;
            ?>
          </div>
        </div>
      </div>
      <form method="post">
      <input type="submit" name="logout" value="Logout" disabled>
      <!-- <input type="submit" value=""> -->
    </form>
    </header>
    <!-- <frameset border="0" rows="100%,*" cols="100%" frameborder="no">
          <frame name="TopFrame" scrolling="yes" noresize src="form.php">
          <frame name="bottomFrame" scrolling="no" noresize>
        </frameset> -->
    <div class="exam-section">
      
      <?php if ($remainingTime > 0): ?>
        
    <div class="container">
     <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScS9P4m_dCRm6wBeeV1OwN7HHZKVx7tUNN-pCtfIjfwyFADkg/viewform?embedded=true" frameborder="100" scrolling="yes"></iframe>
    </div>
  <?php else: ?>
    <div class="message">
      You are out of time. Please logout.
    </div>
  <?php endif; ?>
    </div>
    <!-- add the countdown js -->
    <!-- <script src="countdown.js"></script> -->
        <script>
      function startTimer() {
        // get the remaining time from the session variable
        var remainingTime = <?php echo $remainingTime; ?>;

        // update the timer every second
        var intervalId = setInterval(function() {
          remainingTime--;

          // display the remaining time in the timer div
          document.querySelector('.countdown-timer').innerHTML = formatTime(remainingTime);

          // if the remaining time is zero, clear the interval and log the user out
          if (remainingTime <= 0) {
            clearInterval(intervalId);
            window.location = 'logout.php';
          }
        }, 1000);
      }

      function formatTime(timeInSeconds) {
        // convert the time from seconds to hours, minutes, and seconds
        var hours = Math.floor(timeInSeconds / 3600);
        var minutes = Math.floor((timeInSeconds % 3600) / 60);
        var seconds = timeInSeconds % 60;

        // format the time as a string
        return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
      }

      window.onload = function() {
        startTimer();
      };

      iFrameResize({
    log: false,
    checkOrigin: false
  });
    </script>
    <script src="../../Assets/js/iframeResizer.contentWindow.min.js"></script>
  </body>
</html>
