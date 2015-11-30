/**
 * Created by alanlucian on 11/29/15.
 */
(function($) {
    if( !$("#audio-list").children()){
        return;
    }

    var playListSize = $("#audio-list").children().length;
    var currentMusicIndex = 1;
    var audioElement = document.createElement('audio');
    var currentMusic ;

    function playMusic(index){
        $("#pause").switchClass("fa-play","fa-pause");
        currentMusic = $("#audio-list li:nth-child("+ index + ")");
        currentMusicIndex = index;
        $("#music-name").html(currentMusic.data("name"));
        audioElement.setAttribute('src', currentMusic.data("file-path"));
        audioElement.play();
    }

    function playNext(){
        console.log(currentMusicIndex , playListSize);
        if( currentMusicIndex == playListSize){
            playMusic(1);
            return;
        }
        playMusic(++currentMusicIndex);
    }

    /**
     * BINDING Click Events
     */

    $("#pause").click(function(){
        if(audioElement.paused){
            $("#pause").switchClass("fa-play","fa-pause");
            audioElement.play();
        } else{
            $("#pause").switchClass("fa-pause","fa-play");
            audioElement.pause();
        }
    });

    $("#next").click(function(){
        playNext();
    });

    $("#audio-list li").click(function(e){
        e.preventDefault();
        playMusic($(this).index()+1);
    });

    playMusic(currentMusicIndex);

})(jQuery);