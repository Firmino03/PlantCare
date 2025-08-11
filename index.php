<?php
require 'database/db.php';

$tipo = $_GET['tipo'] ?? null;

if ($tipo) {
    $stmt = $pdo->prepare("SELECT * FROM plantas WHERE categoria = ?");
    $stmt->execute([$tipo]);
} else {
    $stmt = $pdo->query("SELECT * FROM plantas");
}

$plantas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PlantCare</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header>
    <img src="images/logo.png" alt="Logo PlantCare" class="logo" />
    <nav class="menu">
      <button onclick="window.location.href='index.php'">Página Inicial</button>
      <button onclick="window.location.href='index.php?tipo=alimenticia'">Alimentícias</button>
      <button onclick="window.location.href='index.php?tipo=ornamental'">Ornamentais</button>
      <button onclick="window.location.href='index.php?tipo=medicinal'">Medicinais</button>
    </nav>
  </header>

  <main>
    <section class="grid-container" id="plantas">

      <?php foreach ($plantas as $planta): ?>
        <div class=planta-info>
          
          <div class="planta <?= $planta['categoria'] ?>">
              <div class="planta-info">
                  <h3>🌱 <?= $planta['nome'] ?> </h3>
                  <p><strong>Cuidados:</strong> <?= $planta['cuidados'] ?> </p>
                  <p><strong>Adubo:</strong> <?= $planta['adubos'] ?> </p>
                  <p><strong>Curiosidade:</strong> <?= $planta['curiosidades'] ?> </p>
              </div>
            <a href="<?= $planta['link'] ?> " target="_blank" class="btn-adquirir">Adquirir no Instagram</a> 
          </div>

        </div>
      <?php endforeach; ?>  
      
    </section>
  </main>

  <footer>
    <p><strong>Encontre a sementeira mais próxima:</strong> Av. Alfredo Bandeira de Melo, 689 - Centro, Igarassu - PE, 53640-618</p>
    <p><strong>Instagram da sementeira:</strong> <a href="https://www.instagram.com/santamelia.sementeira?utm_source=ig_web_button_share_sheet&igsh=MTdscjd6YzBoM211bg==" target="_blank">@santamelia.sementeira</a></p>
    
    <div class="mapa-container">
        <h3>Sementeira mais proxima</h3>
        <div class="mapa-responsivo">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.593922394514!2d-34.90983968522206!3d-7.72695899443306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab1b8d30e9c63b%3A0x8e6b18a38b28014!2sAv.%20Alfredo%20Bandeira%20de%20Melo%2C%20689%20-%20Centro%2C%20Igarassu%20-%20PE%2C%2053640-618!5e0!3m2!1spt-BR!2sbr!4v1678886543210!5m2!1spt-BR!2sbr" 
                width="600" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <a 
            href="https://www.google.com/maps/dir/?api=1&destination=Av.+Alfredo+Bandeira+de+Melo,+689+-+Centro,+Igarassu+-+PE,+53640-618" 
            target="_blank" 
            class="btn-rota">
            Ver Rota no Google Maps
        </a>
    </div>

    <strong><a href="modules/plants/create.php">© Todos os direitos reservados</a></strong>
  </footer>

</body>
</html>