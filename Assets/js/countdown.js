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
      