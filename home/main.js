
var img = new Image();
img.src = './macyHome.png';

window.onload = init; 

function init(){
    gridcanvas = document.getElementById('canvas');
    gridctx = gridcanvas.getContext('2d');
    gridctx.beginPath();
    gridctx.rect(0,0,1000,2000);
    gridctx.closePath();
    //gridctx.drawImage(img,0,0);
    gridctx.stroke();
    setInterval(start_drawing, 1000/60); //60fps

}

function start_drawing(){
    gridctx.beginPath();
    gridctx.rect(0,0,1000,2000);
    gridctx.closePath();
    gridctx.drawImage(img,0,0);
    gridctx.stroke();
}