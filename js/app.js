inc1 = 0;
inc2 = 0;
inc3 = 0;

images = ["img/large_ad/image1.jpg",
          "img/large_ad/image2.jpg",
          "img/large_ad/image3.jpg",
          "img/large_ad/image4.jpg",
          "img/large_ad/image5.jpg"];

small_ads = ["img/small_ad/image1.png",
             "img/small_ad/image2.png",
             "img/small_ad/image3.png",
             "img/small_ad/image4.png",
             "img/small_ad/image5.png",
             "img/small_ad/image6.png",
             "img/small_ad/image7.png"]

function changeImage(ad_id, list_id, increment) {
    var img = document.getElementById(ad_id);
    img.src = list_id[increment];
    increment++;
    if(increment >= list_id.length){increment = 0;}
    fadeImg(img, 100, false);
}


function fadeImg(el, val, fade){
    if(fade === true){val--;}
    else{val ++;}
    if(val > 0 && val < 100){
        el.style.opacity = val / 100;
        setTimeout(function(){fadeImg(el, val, fade);}, 10);
    }
}

// this doesn't work, see: https://johnresig.com/blog/how-javascript-timers-work/
setInterval(function(){changeImage("big_picture", images, inc1)}, 13000);
setInterval(function(){changeImage("small_top_ad", small_ads, inc2)}, 7000);
setInterval(function(){changeImage("small_bottom_ad", small_ads, inc3)}, 9000);
