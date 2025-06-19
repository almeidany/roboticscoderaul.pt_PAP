document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll('[data-bs-toggle="modal"][data-image]');
    const modalImage = document.getElementById("modalSponsersImage");

    images.forEach((img) => {
        img.addEventListener("click", function () {
            const src = this.getAttribute("data-image");
            modalImage.setAttribute("src", src);
        });
    });
});
