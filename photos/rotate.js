function rotate(id) {
  var climg = document.getElementById(id);
  if (climg.className == r || climg.className == "right") {
    //var from = parseInt(climg.style.right.replace("px",""),10);
    var from = 0;
    var to = 215;
    var duration = 1000;
    var start = new Date().getTime();

    setTimeout(function() {
        var now = (new Date().getTime()) - start;
        var progress = now / duration;
        var result = (to - from) * delta(progress) + from;

        climg.style.right = result + "px";

        if (progress < 1)
            setTimeout(arguments.callee, 10);
    }, 10);
    climg.className = "center"
    document.getElementsByClassName(c)[0].className = "left"
    document.getElementsByClassName(l)[0].className = "right"
  }
  
  if (climg.className == l || climg.className == "left") {
    
  }
}

function delta(progress) {
    return progress;
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