function hasClassName(objElement, strClass) {
  if (objElement.className) {
    var arrList = objElement.className.split(' ');
    for (var i = 0; i < arrList.length; i++ ) {
      if (arrList[i] == strClass) {
        return true;
      }
    }
  }
  return false;
}

function removeClassName(objElement, strClass) {
  if (objElement.className) {
    var arrList = objElement.className.split(' ');
    for (var i = 0; i < arrList.length; i++ ) {
      if (arrList[i] == strClass) {
        delete arrList[i]
      }
    }
    objElement.className = arrList.join(' ')
    return objElement;
  }
}

function addClassName(objElement, strClass) {
  if (objElement.className) {
    objElement.className = objElement.className + ' ' + strClass
  }
  else {
    objElement.className = strClass
  }
}