$(document).ready(function() {    
    function progress(timeleft, timetotal, $element) {
        var progressBarWidth = (timeleft / timetotal) * $element.width();
        $element.find('#countdown').animate({ width: progressBarWidth }, timeleft == timetotal ? 0 : 1000, 'linear').html(timeleft);
        
        if(timeleft > 0) {
            setTimeout(function() {
                progress(timeleft - 1, timetotal, $element);
            }, 1000);
        }
    };

    progress(60, 60, $('#progressBar'));

});