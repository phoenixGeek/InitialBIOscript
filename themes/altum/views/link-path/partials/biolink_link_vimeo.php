<?php defined('ALTUMCODE') || die() ?>

<div class="my-3 embed-responsive embed-responsive-16by9 link-iframe-round">
    <iframe id="iframe" class="embed-responsive-item" scrolling="no" frameborder="no" src="https://player.vimeo.com/video/486330218?autoplay=1&api=1&player_id=player_1"></iframe>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://player.vimeo.com/api/player.js"></script>

<script>

    var iframe = document.querySelector('iframe');
    var player = new Vimeo.Player(iframe);
    var location_url = '<?= $data->link->location_url?>';
    var splitResult = location_url.split('/');
    var startTime = parseInt(splitResult[4]);
    var endTime = parseInt(splitResult[5]);

    player.ready().then(function() {
        console.log('iframe here :', iframe);
        
        // iframe.contents('.vp-center')
        // var container = document.getElementById("player_1").parentNode.parentNode,

        // playbar = container.querySelector('div .progress-js .playhead'),
        // apiConsole = container.querySelector('.log .info');
        
        // //function apiLog(message) {
        //     //  apiConsole.innerHTML = message*100+'%';
        // //}
        
        // function Progress(message){
        //     playbar.style.width = message+'%';
        // }
        // the player is ready
    });

    player.setCurrentTime(startTime).then(function(seconds) {

    }).catch(function(error) {
        switch (error.name) {
            case 'RangeError':
                break;

            default:
                break;
        }
    });

    player.on('timeupdate', function(data) {
        // console.log("data: ", data)
        if (data.seconds > endTime || data.seconds < startTime) {
            player.pause();
            
            player.destroy().then(function() {
                // the player was destroyed
            }).catch(function(error) {
                // an error occurred
            });
            $("iframe").click(false);
        }
    });

</script>