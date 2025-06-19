document.addEventListener('DOMContentLoaded', function () {
    const yearButtons = document.getElementById('yearButtons');
    const mainContent = document.getElementById('mainContent');
    const carouselInner = document.getElementById('carouselInner');

    // Anos disponíveis
    const years = [2024, 2025];
    const recentYear = Math.max(...years);

    // Subtítulos e imagens específicas para cada ano
    const data = {
        2024: {
            'BotOlympics': ['img/bot1.jpg', 'img/bot2.jpg','img/bot3.jpg', 'img/bot4.jpg', 'img/bot5.jpg'],
            'Festival Nacional da Robótica': ['img/f4.jpg', 'img/f1.jpg', 'img/f2.jpg', 'img/f3.jpg', 'img/f5.jpg'],
            'Olimpíadas da Robótica': ['img/o1.jpg', 'img/o2.jpg', 'img/o3.jpg', 'img/o4.jpg', 'img/o5.jpg'],
            'Olimpíadas da Robótica (WRO)': ['img/t3.jpg', 'img/t2.jpg', 'img/t1.jpg', 'img/t4.jpg', 'img/t5.jpg'],
            'Workshops': ['img/workshop_2024_1.jpg', 'img/workshop_2024_2.jpg', 'img/workshop_2024_3.jpg', 'img/workshop_2024_4.jpg', 'img/workshop_2024_5.jpg'],
            'Atividades': ['img/a1.jpg', 'img/a2.jpg', 'img/a3.jpg', 'img/a4.jpg', 'img/a5.jpg']
        },
        2025: {
            'BotOlympics': ['img/bot01.jpeg', 'img/bot_2024_3.jpg', 'img/bot_2024_4.jpg', 'img/bot_2024_5.jpg', 'img/bot_2024_6.jpg', 'img/bot_2024_7.jpg', 'img/bot_2024_8.jpg', 'img/bot_2024_9.jpg',],
            'Game Jam': ['img/g1.jpg', 'img/g2.jpg', 'img/g3.jpg', 'img/g4.jpg', 'img/g5.jpg' ],
            'Olimpíadas da Robótica': ['img/brevemente.png'],
            'Roboparty': ['img/roboparty_2025_1.jpg', 'img/roboparty_2025_2.jpg', 'img/roboparty_2025_4.jpg', 'img/roboparty_2025_5.jpg', 'img/roboparty_2025_6.jpg', 'img/roboparty_2025_7.jpg', 'img/roboparty_2025_8.jpg', 'img/roboparty_2025_9.jpg', 'img/roboparty_2025_10.jpg',],
            'Workshops': ['img/atividades_2025_4.jpg', 'img/atividades_2025_2.jpg', 'img/atividades_2025_3.jpg', 'img/atividades_2025_1.jpg', 'img/atividades_2025_5.jpg'],
            'Atividades': ['img/workshop1.jpg']
        }
    };

    // Função para carregar subtítulos e imagens
    function loadContent(year) {
        mainContent.innerHTML = '';
        const yearData = data[year];

        for (const subtitle in yearData) {
            const colElement = document.createElement('div');
            colElement.className = 'col-lg-4 col-md-6 col-sm-12 mb-4';

            const cardElement = document.createElement('div');
            cardElement.className = 'card h-100';

            const imageElement = document.createElement('img');
            imageElement.src = yearData[subtitle][0];
            imageElement.alt = subtitle;
            imageElement.className = 'card-img-top img-fluid';
            imageElement.style.cursor = 'pointer';
            imageElement.addEventListener('click', () => {
                openAlbumModal(year, subtitle);
            });

            const cardBody = document.createElement('div');
            cardBody.className = 'card-body text-center';

            const subtitleText = document.createElement('h5');
            subtitleText.className = 'card-title';
            subtitleText.textContent = subtitle;

            cardBody.appendChild(subtitleText);
            cardElement.appendChild(imageElement);
            cardElement.appendChild(cardBody);
            colElement.appendChild(cardElement);
            mainContent.appendChild(colElement);
        }

        // Atualizar botão ativo
        document.querySelectorAll('#yearButtons .btn').forEach(btn => {
            btn.classList.remove('active');
            btn.classList.remove('btn-primary');
            btn.classList.add('btn-outline-primary');
        });
        document.querySelector(`#yearButtons .btn[data-year="${year}"]`).classList.add('active', 'btn-primary');
        document.querySelector(`#yearButtons .btn[data-year="${year}"]`).classList.remove('btn-outline-primary');
    }

    // Função para abrir o modal do álbum
    function openAlbumModal(year, subtitle) {
        carouselInner.innerHTML = '';
        const albumImages = data[year][subtitle];

        albumImages.forEach((image, index) => {
            const carouselItem = document.createElement('div');
            carouselItem.className = 'carousel-item' + (index === 0 ? ' active' : '');

            const imgElement = document.createElement('img');
            imgElement.src = image;
            imgElement.className = 'd-block w-100 img-fluid';
            imgElement.alt = subtitle;

            carouselItem.appendChild(imgElement);
            carouselInner.appendChild(carouselItem);
        });

        const modal = new bootstrap.Modal(document.getElementById('albumModal'));
        document.getElementById('albumModalLabel').textContent = subtitle;
        modal.show();
    }

    // Injetar botões de ano
    years.forEach(year => {
        const button = document.createElement('button');
        button.className = 'btn btn-outline-primary mx-2 my-1';
        button.textContent = year;
        button.setAttribute('data-year', year);
        button.addEventListener('click', () => {
            loadContent(year);
        });
        yearButtons.appendChild(button);
    });

    // Carregar automaticamente o ano mais recente
    loadContent(recentYear);
});