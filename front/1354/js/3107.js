
function changeImage(element) {
    var newSrc = element.getAttribute('data-src');
    
    document.getElementById('mainImage').src = newSrc;
}