var myIndex = 0;
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("image");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000);
}
var checkScrollBars = function(){
    var b = $('body');
    var normalw = 0;
    var scrollw = 0;
    if(b.prop('scrollHeight')>b.height()){
        normalw = window.innerWidth;
        scrollw = normalw - b.width();
        $('#container').css({marginRight:'-'+scrollw+'px'});
    }
}