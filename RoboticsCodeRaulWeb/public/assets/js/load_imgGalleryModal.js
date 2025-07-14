const galleryImages = document.querySelectorAll('.gallery-image');
const modalGalleryImage = document.getElementById('modalGalleryImage');
const openInNewTabBtn = document.getElementById('openInNewTab');

galleryImages.forEach(img => {
    img.addEventListener('click', () => {
        const imageUrl = img.getAttribute('data-image');
        modalGalleryImage.src = imageUrl;
        openInNewTabBtn.href = imageUrl;
    });
});