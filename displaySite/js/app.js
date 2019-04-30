inc1 = 0;
inc2 = 0;
inc3 = 3;
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
  if (switcher == 0) {
    inc1++;
    if(inc1>=big_images.length){inc1=0;}
    changeImage("big_picture", big_images, inc1);
    switcher++;
  }
  else if (switcher == 1) {
    inc2++;
    if(inc2>=small_images.length){inc2=0;}
    changeImage("small_top_ad", small_images, inc2);
    switcher++;
  }
  else if (switcher >= 2){
    inc3++;
    if(inc3>=small_images.length){inc3=0;}
    changeImage("small_bottom_ad", small_images, inc3);
    switcher = 0;
  }
}, 1000);
