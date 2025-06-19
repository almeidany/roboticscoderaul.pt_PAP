<?php
// Garante que o output ainda não começou, essencial para cookies funcionarem
if (!isset($_COOKIE['cookie_accepted']) && !isset($_COOKIE['cookie_rejected'])):
?>
<style>
    /* Estilo específico para o banner de cookies */
    #cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #004aad; /* Cor de fundo do banner */
        color: #ffffff; /* Cor do texto */
        padding: 16px;
        font-family: 'Segoe UI', sans-serif;
        font-size: 14px;
        z-index: 10000; /* Garantir que o banner esteja sempre visível */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;
        box-shadow: 0 -3px 8px rgba(0, 0, 0, 0.25); /* Sombras do banner */
        text-align: center;
    }

    #cookie-banner p {
        margin: 0;
        max-width: 900px; /* Largura máxima para o texto */
    }

    /* Botões para aceitar ou rejeitar cookies */
    #cookie-banner .cookie-btn-container {
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    #cookie-banner .cookie-btn-accept {
        background-color: #00aaff; /* Cor do botão de aceitação */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    #cookie-banner .cookie-btn-accept:hover {
        background-color: #0088cc; /* Cor ao passar o mouse */
    }

    #cookie-banner .cookie-btn-reject {
        background-color: #cc0000; /* Cor do botão de rejeição */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    #cookie-banner .cookie-btn-reject:hover {
        background-color: #990000; /* Cor ao passar o mouse no botão de rejeição */
    }

    /* Responsividade */
    @media (max-width: 600px) {
        #cookie-banner {
            font-size: 13px;
        }

        #cookie-banner .cookie-btn-container {
            width: 100%;
            justify-content: center;
            flex-direction: row;
            flex-wrap: wrap;
        }

        #cookie-banner .cookie-btn-accept,
        #cookie-banner .cookie-btn-reject {
            flex: 1 1 45%;
            text-align: center;
            padding: 12px;
        }
    }
</style>

<div id="cookie-banner">
    <p>Este site utiliza cookies para melhorar a experiência de navegação, de acordo com o Regulamento Geral sobre a Proteção de Dados (RGPD), Artigo 6.º, n.º 1, alínea f).</p>
    <div class="cookie-btn-container">
        <button class="cookie-btn-accept" onclick="setCookieChoice('accepted')">Aceitar</button>
        <button class="cookie-btn-reject" onclick="setCookieChoice('rejected')">Rejeitar</button>
    </div>
</div>

<script>
function setCookieChoice(choice) {
    // Define o cookie no JS e força reload para garantir leitura em PHP
    let cookieName = (choice === 'accepted') ? 'cookie_accepted' : 'cookie_rejected';
    document.cookie = cookieName + "=true; path=/; max-age=" + (60*60*24*365);
    document.getElementById('cookie-banner').style.display = 'none';

    // Recarrega para garantir que PHP reconhece o cookie
    location.reload();
}
</script>
<?php
endif;
?>