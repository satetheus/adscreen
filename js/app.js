x = 0;

images = ["img/large_ad/image1.jpg",
          "img/large_ad/image2.jpg",
          "img/large_ad/image3.jpg",
          "img/large_ad/image4.jpg",
          "img/large_ad/image5.jpg"];

function changeImage() {
    var img = document.getElementById("big_picture");
    img.src = images[x];
    x++;
    if(x >= images.length){
      x = 0;
    }
    fadeImg(img, 100, false);
    setTimeout("changeImage()", 10000);
}


function fadeImg(el, val, fade){
    if(fade === true){val--;}
    else{val ++;}

    if(val > 0 && val < 100){
        el.style.opacity = val / 100;
        setTimeout(function(){fadeImg(el, val, fade);}, 10);
    }
}


setTimeout("changeImage()", 10000);
