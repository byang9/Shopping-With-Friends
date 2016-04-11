
var img = new Image();
img.src = 'macy.png';

window.onload = init; 

$(document).ready(function() {
    $('#bt1').click(function() {
        $('#fr1').attr('action',
                       'mailto:ptn47812@uga.edu?subject=Hello%20again' +
                       $('#tb1').val() + '&body=' + $('#tb2').val());
        $('#fr1').submit();
    });
});

function init(){
    gridcanvas = document.getElementById('canvas');
    gridctx = gridcanvas.getContext('2d');
    gridctx.beginPath();
    gridctx.rect(0,0,1500,2000);
    gridctx.closePath();
    gridctx.drawImage(img,0,0);
    gridctx.stroke();
    setInterval(start_drawing, 1000/60); //60fps

}

function start_drawing(){
    gridctx.beginPath();
    gridctx.rect(0,0,1500,2000);
    gridctx.closePath();
    gridctx.drawImage(img,0,0);
    gridctx.stroke();
}