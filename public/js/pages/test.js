$(document).ready(function() {
    var time = $("#timeTrack").data('time');
    var examId = $("#timeTrack").data('exam');
    if (time <= 0) {
        alert("Already submitted !");
    }
    if (examId <= 0) {
        alert("Error in exam !");
    } else {
        setAlldata();
        startTimer(time, examId);
    }
});


function setAlldata() {
    var id = $("#timeTrack").data('exam');
    $.ajax({
        url: '../update/get',
        async: true,
        type: 'POST',
        data: {
            examId: id
        },
        success: function(response) {
            var decode = JSON.parse(response);
            if (decode.success > 0 && Object.keys(decode.records).length > 0) {
                answered = 0;

                $.each( decode.records, function( key, value ) {
                    answered += value;
                    $("#answeredCategory"+key).data('val', value);
                    $("#answeredCategory"+key).html(value);
                });


                 $('#answered').html(answered);               
                 $('#answered').data('val', answered); 
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error.responseText);
            console.log(error.message);
        }
    });
}



function startTimer(sec, id) {
    var minutes = Math.floor(sec / 60);
    var seconds = sec - minutes * 60;
    var interval = setInterval(function() {
        sec--;
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;

        if (sec % 3 == 0) {
            sendStatus(sec, id, false);
        }

        if (minutes <= 0 && seconds <= 0 && sec <= 0) {
            sendStatus(0, id, true);
            clearInterval(interval);
            BootstrapDialog.show({
                title: 'Thank you.',
                message: 'You test/exam is submitted. Time Over!',
                buttons: [{
                    label: 'Ok',
                    cssClass: 'btn-primary',
                    action: function(dialog) {
                        dialog.close();
                    }
                }]
            });
            document.location.reload();
        }
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;

        $('#time').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
    }, 1000);
}

function sendStatus(time, id, isSubmitted = false) {
    $.ajax({
        url: '../update/status',
        async: true,
        type: 'POST',
        data: {
            remainingTime: time,
            examId: id,
            isSubmitted: isSubmitted
        }
    });
}

$(document).on("click", ".answerRadio", function(e) {
    var target = e.target;
    var answer = target.dataset.choice;
    var qid = target.dataset.qid;
    var cid = target.dataset.cid;
    var id = $("#timeTrack").data('exam');
    var answered = $("#answered").data('val');
    var catAnswered = $("#answeredCategory"+cid).data('val');
    $.ajax({
        url: '../update/answer',
        async: true,
        type: 'POST',
        data: {
            examId: id,
            questionId: qid,
            userAnswer: answer,
        },
        success: function(response) {
            var decode = JSON.parse(response);
            if (decode.newAnswer > 0) {
                answered += 1;
                catAnswered += 1;
                 $('#answered').html(answered);               
                 $('#answered').data('val', answered);  
                 $("#answeredCategory"+cid).data('val', catAnswered);
                 $("#answeredCategory"+cid).html(catAnswered);
            }
        },
        error: function(error) {
            console.log("Error:");
            console.log(error.responseText);
            console.log(error.message);
        }
    });
});

function sleep(time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

function submitTest() {
    var id = $("#timeTrack").data('exam');
    var time = $("#timeTrack").data('time');
    time = (time < 0) ? 0 : time;
    sendStatus(time, id, true);    
}

function animate(sec) {
    
    return;
}


$(document).on("click", "#submitBtn", function(e) {
    e.preventDefault();
    BootstrapDialog.show({
        title: 'Confirm',
        message: 'Are you sure to to submit ?<b> You can\'t retake the test/exam.</b>',
        buttons: [{
            label: 'Yes',
            cssClass: 'btn-primary',
            action: function(dialog) {
                submitTest();
                var target = document.getElementById('target1');
                var spinner = new Spinner({
                    radius: 30,
                    length: 0,
                    width: 10,
                    trail: 40
                }).spin(target);
                sleep(1000).then(() => {
                    spinner.stop();
                    dialog.close();
                    window.location.replace("../");
                });
            }
        }, {
            label: 'No',
            cssClass: 'btn-warning',
            action: function(dialog) {
                dialog.close();
            }
        }]
    });
});

$(".next").click(function() {
    $('#myTabs li.active').next('li').find('a').trigger('click'); 
     $(document).scrollTop(0);
});

$(".toUp").click(function() {
     $(document).scrollTop(0);
});

$(".previous").click(function() {
     $('#myTabs li.active').prev('li').find('a').trigger('click');
     $(document).scrollTop(0);
 });