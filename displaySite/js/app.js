inc1 = 0;
inc2 = 1;
inc3 = 0;
inc4 = 0;

function changeImage(ad_id, list_id, increment) {
    var img = document.getElementById(ad_id);
    img.src = list_id[increment];
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

if(rotSettings['mode']=='multi') {
    document.documentElement.style.backgroundImage = "none";
    document.getElementById('big_picture').style.visibility = "visible";
    document.getElementById('small_top_ad').style.visibility = "visible";
    document.getElementById('small_bottom_ad').style.visibility = "visible";

    setInterval(function() {
        inc1++;
        if(inc1>=big_images.length){inc1=0;}
        changeImage("big_picture", big_images, inc1);
    }, rotSettings['largeRot']);
    
    setInterval(function() {
        inc2++;
        inc3++;
        if(inc2>=small_images.length){inc2=0;}
        if(inc3>=small_images.length){inc3=0;}
        changeImage("small_top_ad", small_images, inc2);
        changeImage("small_bottom_ad", small_images, inc3);
    }, rotSettings['smallRot']);
}

else {
    document.getElementById('big_picture').style.visibility = "hidden";
    document.getElementById('small_top_ad').style.visibility = "hidden";
    document.getElementById('small_bottom_ad').style.visibility = "hidden";

    setInterval(function() {
        inc4++;
        if(inc4>=single_images.length){inc4=0;}
        document.documentElement.style.backgroundImage = `url('${single_images[inc4]}')`;
    }, rotSettings['singleRot']);
} 