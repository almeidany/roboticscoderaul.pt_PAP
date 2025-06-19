document.addEventListener('DOMContentLoaded', function () {
    const track = document.querySelector('.sponsors-carousel-track');
    const items = document.querySelectorAll('.sponsor-item');
    const itemCount = items.length;
    const visibleCount = 4;
    let currentIndex = 0;

    if (itemCount > visibleCount) {
        for (let i = 0; i < visibleCount; i++) {
            const clone = items[i].cloneNode(true);
            track.appendChild(clone);
        }
    }

    function moveCarousel() {
        if (itemCount <= visibleCount) return;

        currentIndex = (currentIndex + 1) % itemCount;
        const itemWidth = items[0].offsetWidth + 20;
        const maxPosition = itemCount * itemWidth;

        if (currentIndex * itemWidth >= maxPosition) {
            track.style.transition = 'none';
            track.style.transform = 'translateX(0)';
            setTimeout(() => {
                track.style.transition = 'transform 0.7s ease-in-out';
                currentIndex = 0;
            }, 10);
        } else {
            track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
        }
    }

    if (itemCount > visibleCount) {
        setInterval(moveCarousel, 3500);
    }
});