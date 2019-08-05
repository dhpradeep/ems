$(document).ready(function() {
    startTimer("36");
});

function startTimer(sec) {
    //sec to minute converter
    var minutes = Math.floor(sec / 60);
    var seconds = sec - minutes * 60;
    var interval = setInterval(function() {
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        //minutes = (minutes < 10) ?  minutes : minutes;
        $('#time').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
    }, 1000);
}