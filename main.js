
var img = new Image();
img.src = './macyLogin.png';

window.onload = init; 

function init(){
    gridcanvas = document.getElementById('canvas');
    gridctx = gridcanvas.getContext('2d');
    gridctx.beginPath();
    gridctx.rect(0,0,800,500);
    gridctx.closePath();
    //gridctx.drawImage(img,0,0);
    gridctx.stroke();
    setInterval(start_drawing, 1000); 

}

function start_drawing(){
    gridctx.beginPath();
    gridctx.rect(0,0,800,500);
    gridctx.closePath();
    gridctx.drawImage(img,0,0);
    gridctx.stroke();
}