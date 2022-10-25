//for description
var textOverImages = document.getElementsByClassName("product-img");
var previousTextOverImage;
for (var i = 0; i < textOverImages.length; i++) {
    textOverImages[i].onclick = function() {
        var classes = this.classList;
        if (classes.contains("show")) {
            classes.remove("show");
        } else {
            if (previousTextOverImage != null)
                previousTextOverImage.classList.remove("show");
            previousTextOverImage = this;
            classes.add("show");
        }
    }
}

function stopPropagation(event) {
    event.stopPropagation();
}

//for add to cart
$(function() {
    $('.btn').click(function(e) {
        $(this).toggleClass("material-off")
    })
})