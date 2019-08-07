$(document).ready(function() {
    var time = $("#timeTrack").data('time');
    var examId = $("#timeTrack").data('exam');
    if(time <= 0){
        alert("Already submitted !");
    } if(examId <= 0){
        alert("Error in exam !");
    }
    else {
        startTimer(time, examId);
    }
});

function startTimer(sec, id) {
    var minutes = Math.floor(sec / 60);
    var seconds = sec - minutes * 60;
    var interval = setInterval(function() {
        sec--;
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;

        if(sec % 3 == 0) {
            sendStatus(sec, id, false);
        }
        
        if (minutes <= 0 && seconds <= 0 && sec <= 0){
            sendStatus(0,id,true);
            clearInterval(interval);
            alert("Time Over");
        } 
        seconds = (seconds < 0 && minutes != 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;

        $('#time').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
    }, 1000);
}

function sendStatus(time, id, isSubmitted = false) {
    $.ajax({
            url: './test/update/status',
            async: true,
            type: 'POST',
            data: {
                remainingTime: time,
                examId : id,
                isSubmitted : isSubmitted
            }
    });
}