$(document).ready(function() {
    startTimer("20");
});

function startTimer(sec) {
    var minutes = Math.floor(sec / 60);
    var seconds = sec - minutes * 60;
    var interval = setInterval(function() {
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes <= 0 && seconds <= 0) {
            clearInterval(interval);
            //alert("Time Over");
        }
        seconds = (seconds < 0 && minutes != 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;

        $('#time').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
    }, 1000);
}