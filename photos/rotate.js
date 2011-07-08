function rotate(id) {
  var climg = document.getElementById(id);
  if (climg.className == r || climg.className == "right") {
    rightz();
    /*----------clicked_img-----------*/
    var climgstl = window.getComputedStyle(climg, null);
    var clfrom = parseInt(climgstl.getPropertyValue("left").replace("px",""),10);
    var clto = 180;
    var clsizefrom = parseInt(climgstl.getPropertyValue("height").replace("px",""),10);
    var clsizeto = 300;
    /*----------left_img-------------*/
    var limg = document.getElementsByClassName('left')[0];
    var limgstl = window.getComputedStyle(limg, null);
    var lfrom = parseInt(limgstl.getPropertyValue("left").replace("px",""),10);
    var lto = 430;
    /*----------center_img-----------*/
    var cimg = document.getElementsByClassName('center')[0];
    var cimgstl = window.getComputedStyle(cimg, null);
    var cfrom = parseInt(cimgstl.getPropertyValue("left").replace("px",""),10);
    var cto = 0;
    var csizefrom = parseInt(cimgstl.getPropertyValue("height").replace("px",""),10);
    var csizeto = 250;
    /*---------------time--------------*/
    var duration = 1000;
    var start = new Date().getTime();

    setTimeout(function() {
        var now = (new Date().getTime()) - start;
        var progress = now / duration;
        var clposition = clfrom - Math.abs(clto - clfrom) * delta(progress);
        var lposition = lfrom + Math.abs(lto - lfrom) * delta(progress);
        var cposition = cfrom - Math.abs(cto - cfrom) * delta(progress);
        var clheight = clsizefrom + Math.abs(clsizeto - clsizefrom) * delta(progress);
        var cheight = csizefrom - Math.abs(csizeto - csizefrom) * delta(progress);

        climg.style.left = clposition + "px";
        limg.style.left = lposition + "px";
        cimg.style.left = cposition + "px";
        climg.style.height = clheight + "px";
        cimg.style.height = cheight + "px";

        if (progress < 1)
            setTimeout(arguments.callee, 10);
    }, 10);
    document.getElementsByClassName('left')[0].className = "right"
    document.getElementsByClassName('center')[0].className = "left"
    climg.className = "center"
    rightz();
  }
  
  if (climg.className == l || climg.className == "left") {
    leftz();
    /*----------clicked_img-----------*/
    var climgstl = window.getComputedStyle(climg, null);
    var clfrom = parseInt(climgstl.getPropertyValue("left").replace("px",""),10);
    var clto = 180;
    var clsizefrom = parseInt(climgstl.getPropertyValue("height").replace("px",""),10);
    var clsizeto = 300;
    /*------------right_img-----------*/
    var rimg = document.getElementsByClassName('right')[0];
    var rimgstl = window.getComputedStyle(rimg, null);
    var rfrom = parseInt(rimgstl.getPropertyValue("left").replace("px",""),10);
    var rto = 0;
    /*----------center_img-----------*/
    var cimg = document.getElementsByClassName('center')[0];
    var cimgstl = window.getComputedStyle(cimg, null);
    var cfrom = parseInt(cimgstl.getPropertyValue("left").replace("px",""),10);
    var cto = 430;
    var csizefrom = parseInt(cimgstl.getPropertyValue("height").replace("px",""),10);
    var csizeto = 250;
    /*---------------time--------------*/
    var duration = 1000;
    var start = new Date().getTime();

    setTimeout(function() {
        var now = (new Date().getTime()) - start;
        var progress = now / duration;
        var clposition = clfrom + Math.abs(clto - clfrom) * delta(progress);
        var rposition = rfrom - Math.abs(rto - rfrom) * delta(progress);
        var cposition = cfrom + Math.abs(cto - cfrom) * delta(progress);
        var clheight = clsizefrom + Math.abs(clsizeto - clsizefrom) * delta(progress);
        var cheight = csizefrom - Math.abs(csizeto - csizefrom) * delta(progress);

        climg.style.left = clposition + "px";
        rimg.style.left = rposition + "px";
        cimg.style.left = cposition + "px";
        climg.style.height = clheight + "px";
        cimg.style.height = cheight + "px";

        if (progress < 1)
            setTimeout(arguments.callee, 10);
    }, 10);
    document.getElementsByClassName('right')[0].className = "left"
    document.getElementsByClassName('center')[0].className = "right"
    climg.className = "center"
    leftz();
  }
}

function delta(progress) {
    return progress;
}

function leftz() {
  document.getElementsByClassName('right')[0].style.zIndex = "2"
  document.getElementsByClassName('left')[0].style.zIndex = "1"
  document.getElementsByClassName('center')[0].style.zIndex = "3"
}
function rightz() {
  document.getElementsByClassName('right')[0].style.zIndex = "1"
  document.getElementsByClassName('left')[0].style.zIndex = "2"
  document.getElementsByClassName('center')[0].style.zIndex = "3"
}

r = 'right quimby_search_image'
l = 'left quimby_search_image'
c = 'center quimby_search_image'

window.onload = function() {
  document.getElementById('img1').onclick = function() {
    rotate('img1')
  }
  document.getElementById('img2').onclick = function() {
    rotate('img2')
  }
  document.getElementById('img3').onclick = function() {
    rotate('img3')
  }
}