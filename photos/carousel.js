Carousel = {
  
  init: function() {
    this.imgsArray = [{'img': document.getElementById('img1'), 'style': 'left'}, {'img': document.getElementById('img2'), 'style': 'center'}, {'img': document.getElementById('img3'), 'style': 'right'}]
  },
  
  FPS: 25,
  duration: 1000,
  delay: function() {
    return this.duration / this.FPS
  },
  
  bind: function() {
    this.imgsArray[0].img.onclick = function() {
      if (Carousel.imgsArray[0].style == 'left') {
        Carousel.rotateLeft()
      }
      if (Carousel.imgsArray[0].style == 'right') {
        Carousel.rotateRight()
      }
    }
    this.imgsArray[1].img.onclick = function() {
      if (Carousel.imgsArray[1].style == 'left') {
        Carousel.rotateLeft()
      }
      if (Carousel.imgsArray[1].style == 'right') {
        Carousel.rotateRight()
      }
    }
    this.imgsArray[2].img.onclick = function() {
      if (Carousel.imgsArray[2].style == 'left') {
        Carousel.rotateLeft()
      }
      if (Carousel.imgsArray[2].style == 'right') {
        Carousel.rotateRight()
      }
    }
  },
  
  rotateLeft: function() {
    for (var i = 0; i < Carousel.imgsArray.length; i++ ) {
      switch (Carousel.imgsArray[i].style) {
        case "left":
          var l_img = Carousel.imgsArray[i].img
          Carousel.imgsArray[i].img.style.zIndex = "2"
          break
        case "center":
          var c_img = Carousel.imgsArray[i].img
          Carousel.imgsArray[i].img.style.zIndex = "3"
          break
        case "right":
          var r_img = Carousel.imgsArray[i].img
          Carousel.imgsArray[i].img.style.zIndex = "1"
          break
      }
    }
    /*----------clicked_img-----------*/
    var l_imgStl = window.getComputedStyle(l_img, null)
    var l_from = parseInt(l_imgStl.getPropertyValue("left").replace("px",""),10)
    var l_to = 180
    var l_size_from = parseInt(l_imgStl.getPropertyValue("height").replace("px",""),10)
    var l_size_to = 300
    var l_top_from = parseInt(l_imgStl.getPropertyValue("top").replace("px",""),10)
    var l_top_to = 0
    /*------------right_img-----------*/
    var r_imgStl = window.getComputedStyle(r_img, null)
    var r_from = parseInt(r_imgStl.getPropertyValue("left").replace("px",""),10)
    var r_to = 0
    /*----------center_img-----------*/
    var c_imgStl = window.getComputedStyle(c_img, null)
    var c_from = parseInt(c_imgStl.getPropertyValue("left").replace("px",""),10)
    var c_to = 500
    var c_size_from = parseInt(c_imgStl.getPropertyValue("height").replace("px",""),10)
    var c_size_to = 200
    var c_top_from = parseInt(c_imgStl.getPropertyValue("top").replace("px",""),10)
    var c_top_to = 50
    /*---------------animate--------------*/
    var start = new Date().getTime()
    setTimeout(function() {
        var now = (new Date().getTime()) - start
        var progress = now / Carousel.duration
        var l_position = l_from + Math.abs(l_to - l_from) * deltaPos(progress)
        var r_position = r_from - Math.abs(r_to - r_from) * deltaPos(progress)
        var c_position = c_from + Math.abs(c_to - c_from) * deltaPos(progress)
        var l_height = l_size_from + Math.abs(l_size_to - l_size_from) * deltaSize(progress)
        var c_height = c_size_from - Math.abs(c_size_to - c_size_from) * deltaSize(progress)
        var l_top = l_top_from - Math.abs(l_top_to - l_top_from) * deltaSize(progress)
        var c_top = c_top_from + Math.abs(c_top_to - c_top_from) * deltaSize(progress)

        l_img.style.left = l_position + "px"
        r_img.style.left = r_position + "px"
        c_img.style.left = c_position + "px"
        l_img.style.height = l_height + "px"
        c_img.style.height = c_height + "px"
        l_img.style.top = l_top + "px"
        c_img.style.top = c_top + "px"
        
        if (progress > 0.5) {
          c_img.style.zIndex = '2'
          l_img.style.zIndex = '3'
        }
        if (progress < 1)
            setTimeout(arguments.callee, Carousel.delay())
    }, Carousel.delay());
    
    for (var i = 0; i < Carousel.imgsArray.length; i++ ) {
      switch (Carousel.imgsArray[i].style) {
        case "left":
          Carousel.imgsArray[i].style = 'center'
          Carousel.imgsArray[i].img.className = 'center'
          break
        case "center":
          Carousel.imgsArray[i].style = 'right'
          Carousel.imgsArray[i].img.className = 'right'
          break
        case "right":
          Carousel.imgsArray[i].style = 'left'
          Carousel.imgsArray[i].img.className = 'left'
          break
      }
    }
  
  },
  
  rotateRight: function() {
    for (var i = 0; i < Carousel.imgsArray.length; i++ ) {
      switch (Carousel.imgsArray[i].style) {
        case "left":
          var l_img = Carousel.imgsArray[i].img
          Carousel.imgsArray[i].img.style.zIndex = "1"
          break
        case "center":
          var c_img = Carousel.imgsArray[i].img
          Carousel.imgsArray[i].img.style.zIndex = "3"
          break
        case "right":
          var r_img = Carousel.imgsArray[i].img
          Carousel.imgsArray[i].img.style.zIndex = "2"
          break
      }
    }
    /*----------clicked_img-----------*/
    var r_imgStl = window.getComputedStyle(r_img, null)
    var r_from = parseInt(r_imgStl.getPropertyValue("left").replace("px",""),10)
    var r_to = 180
    var r_size_from = parseInt(r_imgStl.getPropertyValue("height").replace("px",""),10)
    var r_size_to = 300
    var r_top_from = parseInt(r_imgStl.getPropertyValue("top").replace("px",""),10)
    var r_top_to = 0
    /*----------left_img-------------*/
    var l_imgStl = window.getComputedStyle(l_img, null)
    var l_from = parseInt(l_imgStl.getPropertyValue("left").replace("px",""),10)
    var l_to = 500
    /*----------center_img-----------*/
    var c_imgStl = window.getComputedStyle(c_img, null)
    var c_from = parseInt(c_imgStl.getPropertyValue("left").replace("px",""),10)
    var c_to = 0
    var c_size_from = parseInt(c_imgStl.getPropertyValue("height").replace("px",""),10)
    var c_size_to = 200
    var c_top_from = parseInt(c_imgStl.getPropertyValue("top").replace("px",""),10)
    var c_top_to = 50
    /*---------------animate--------------*/
    var start = new Date().getTime()
    setTimeout(function() {
        var now = (new Date().getTime()) - start
        var progress = now / Carousel.duration
        var r_position = r_from - Math.abs(r_to - r_from) * deltaPos(progress)
        var l_position = l_from + Math.abs(l_to - l_from) * deltaPos(progress)
        var c_position = c_from - Math.abs(c_to - c_from) * deltaPos(progress)
        var r_height = r_size_from + Math.abs(r_size_to - r_size_from) * deltaSize(progress)
        var c_height = c_size_from - Math.abs(c_size_to - c_size_from) * deltaSize(progress)
        var r_top = r_top_from - Math.abs(r_top_to - r_top_from) * deltaSize(progress)
        var c_top = c_top_from + Math.abs(c_top_to - c_top_from) * deltaSize(progress)

        r_img.style.left = r_position + "px"
        l_img.style.left = l_position + "px"
        c_img.style.left = c_position + "px"
        r_img.style.height = r_height + "px"
        c_img.style.height = c_height + "px"
        r_img.style.top = r_top + "px"
        c_img.style.top = c_top + "px"
        
        if (progress > 0.5) {
          r_img.style.zIndex = '3'
          c_img.style.zIndex = '2'
        }
        if (progress < 1)
            setTimeout(arguments.callee, Carousel.delay());
    }, Carousel.delay());
    
    for (var i = 0; i < Carousel.imgsArray.length; i++ ) {
      switch (Carousel.imgsArray[i].style) {
        case "left":
          Carousel.imgsArray[i].style = 'right'
          Carousel.imgsArray[i].img.className = 'right'
          break
        case "center":
          Carousel.imgsArray[i].style = 'left'
          Carousel.imgsArray[i].img.className = 'left'
          break
        case "right":
          Carousel.imgsArray[i].style = 'center'
          Carousel.imgsArray[i].img.className = 'center'
          break
      }
    }
  
  }
}

function deltaSize(progress) {
    return progress
}
function deltaPos(progress) {
    return Math.pow(progress ,2)
}

window.onload = function() {
  Carousel.init()
  Carousel.bind()
}
