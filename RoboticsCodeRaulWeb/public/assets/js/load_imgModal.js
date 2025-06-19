const imageElements = document.querySelectorAll('.news-image');
const modalImage = document.getElementById('modalNewsImage');

imageElements.forEach(img => {
    img.addEventListener('click', () => {
        const imageUrl = img.getAttribute('data-image');
        modalImage.src = imageUrl;
    });
});