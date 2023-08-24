<?php include_once("templates/header.php"); ?>
<div class="container" id="view-contact-container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title"><?= $contact["NAME"] ?></h1>
    <p class="bold">Telefone:</p>
    <p><?= $contact["PHONE"] ?></p>
    <p class="bold">Observações:</p>
    <p><?= $contact["OBSERVATIONS"] ?></p>
  </div>
</body>
  </html>
