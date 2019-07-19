inc1 = 0;
inc2 = 1;
inc3 = 0;
switcher = 0;

function changeImage(ad_id, list_id, increment) {
    var img = document.getElementById(ad_id);
    img.src = list_id[increment];
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

setInterval(function() {
    inc1++;
    if(inc1>=big_images.length){inc1=0;}
    changeImage("big_picture", big_images, inc1);
}, 3000);

setInterval(function() {
    inc2++;
    inc3++;
    if(inc2>=small_images.length){inc2=0;}
    if(inc3>=small_images.length){inc3=0;}
    changeImage("small_top_ad", small_images, inc2);
    changeImage("small_bottom_ad", small_images, inc3);
}, 2000);
