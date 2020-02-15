var count = 0;

function setProfImg() {
    var img = document.getElementById("prof-image");
    var width = img.offsetWidth;
    img.style.height = width + 'px';
}

function resImg() {
    var resInt = setInterval(function() {
        console.log(document.getElementsByTagName("li")[0].offsetWidth);
        count++;
        setProfImg();
        if (count == 125) {
            clearInterval(resInt);
            count = 0;
        }
    }, 1);
}

function resizeNav() {
    var nav = document.getElementById("navigation");
    nav.classList.toggle("active");
    resImg();
}

setProfImg();
document.getElementById('btn').addEventListener('click', resizeNav);
window.addEventListener('resize', setProfImg);