<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="frontend/styles.css">
  <title>UberCloud</title>
</head>


<body>
  <header>
    <h1>UberCloud - Demo (Modul 346)</h1>
  </header>

  <main>
    <div class="summary">
      <div class="summary-item">
        <p>Laufende VMs:</p>
      </div>

      <div class="summary-item">
        <p>Monatlicher Gesamtumsatz:</p>
      </div>
    </div>

    <?php // Validation
    require "backend/init.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (
        !empty($_POST["vm_name"]) && 30 >= strlen($_POST["vm_name"]) &&
        !empty($_POST["cpu"]) &&
        !empty($_POST["ram"]) &&
        !empty($_POST["ssd"])
      ) {
        $vm_name = htmlspecialchars($_POST["vm_name"]);
        $cpu = htmlspecialchars($_POST["cpu"]);
        $ram = htmlspecialchars($_POST["ram"]);
        $ssd = htmlspecialchars($_POST["ssd"]);

        Server::select_server($vm_name, $cpu, $ram, $ssd);
        file_put_contents("backend/data.json", json_encode(Server::$server_data, JSON_PRETTY_PRINT));
      } else if (!empty($_POST["vm_name_delete"])) {
        Server::delete_server($_POST["vm_name_delete"]);
        file_put_contents("backend/data.json", json_encode(Server::$server_data, JSON_PRETTY_PRINT));
      }
    }
    ?>

    <?php // Getting the usage values for bar statistics below
    foreach (Server::$server_data as $server) {
      if ($server->id == 0) $s_bar = array(
        "cpu" => $server->used_cpu / $server->max_cpu * 100,
        "ram" => $server->used_ram / $server->max_ram * 100,
        "ssd" => $server->used_ssd / $server->max_ssd * 100
      );
      if ($server->id == 1) $m_bar = array(
        "cpu" => $server->used_cpu / $server->max_cpu * 100,
        "ram" => $server->used_ram / $server->max_ram * 100,
        "ssd" => $server->used_ssd / $server->max_ssd * 100
      );
      if ($server->id == 2) $b_bar = array(
        "cpu" => $server->used_cpu / $server->max_cpu * 100,
        "ram" => $server->used_ram / $server->max_ram * 100,
        "ssd" => $server->used_ssd / $server->max_ssd * 100
      );
    }
    ?>
    <div class="server">
      <!-- SMALL -->
      <div class="small">
        <h2 class="smallText">Small</h2>
        <div class="diagrammSmall">
          <div class="bar cpu" style="height:<?= $s_bar['cpu'] ?>%;"><?= $s_bar['cpu'] ?>%</div>
          <div class="bar ram" style="height:<?= $s_bar['ram'] ?>%;"><?= $s_bar['ram'] ?>%</div>
          <div class="bar ssd" style="height:<?= $s_bar['ssd'] ?>%;"><?= $s_bar['ssd'] ?>%</div>
        </div>
        <div class="diagrammText">
          <h4 class="cpu">CPU: </h4>
          <h4 class="ram">RAM: </h4>
          <h4 class="ssd">SSD: </h4>
        </div>
      </div>

      <!-- MEDIUM -->
      <div class="medium">
        <h2 class="mediumText">Medium</h2>
        <div class="diagrammMedium">
          <div class="bar cpu" style="height:<?= $m_bar['cpu'] ?>%;"><?= $m_bar['cpu'] ?>%</div>
          <div class="bar ram" style="height:<?= $m_bar['ram'] ?>%;"><?= $m_bar['cpu'] ?>%</div>
          <div class="bar ssd" style="height:<?= $m_bar['ssd'] ?>%;"><?= $m_bar['ssd'] ?>%</div>
        </div>
        <div class="diagrammText">
          <h4 class="cpu">CPU: </h4>
          <h4 class="ram">RAM: </h4>
          <h4 class="ssd">SSD: </h4>
        </div>
      </div>

      <!-- BIG -->
      <div class="big">
        <h2 class="bigText">Big</h2>
        <div class="diagrammBig">
          <div class="bar cpu" style="height:<?= $b_bar['cpu'] ?>%;"><?= $b_bar['cpu'] ?>%</div>
          <div class="bar ram" style="height:<?= $b_bar['ram'] ?>%;"><?= $b_bar['ram'] ?>%</div>
          <div class="bar ssd" style="height:<?= $b_bar['ssd'] ?>%;"><?= $b_bar['ssd'] ?>%</div>
        </div>
        <div class="diagrammText">
          <h4 class="cpu">CPU: </h4>
          <h4 class="ram">RAM: </h4>
          <h4 class="ssd">SSD: </h4>
        </div>
      </div>
    </div>

    <div class="grid">

      <!-- VM anlegen -->
      <div class="card">
        <h2>Virtuelle Maschine mieten</h2>

        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
          <label for="vm_name">Name der VM</label>
          <input type="text" id="vm_name" name="vm_name" placeholder="z.B webserver-01 (max 30 zeichen)" required>

          <label for="cpu">Anzahl Prozessoren (Cores)</label>
          <select name="cpu" id="cpu" required>
            <option value="">Bitte wählen</option>
            <!-- do kann meh au eh foreach loop mache -->
            <option value="1">1 Cores </option>
            <option value="2">2 Cores </option>
            <option value="4">4 Cores </option>
            <option value="8">8 Cores </option>
            <option value="16">16 Cores</option>
          </select>

          <label for="ram">Anzahl Arbeitsspeicher</label>
          <select name="ram" id="ram" required>
            <option value="">Bitte wählen</option>
            <!-- do kann meh au eh foreach loop mache -->
            <option value="8">8 GB Arbeitsspeicher</option>
            <option value="16">16 GB Arbeitsspeicher</option>
            <option value="32">32 GB Arbeitsspeicher</option>
            <option value="64">64 GB Arbeitsspeicher</option>
            <option value="128">128 GB Arbeitsspeicher</option>
          </select>

          <label for="ssd">Anzahl Speicherplatz</label>
          <select name="ssd" id="ssd" required>
            <option value="">Bitte wählen</option>
            <!-- do kann meh au eh foreach loop mache -->
            <option value="2">2 TB Speicher</option>
            <option value="4">4 TB Speicher</option>
            <option value="8">8 TB Speicher</option>
            <option value="16">16 TB Speicher</option>
            <option value="32">32 TB Speicher</option>
          </select>

          <button type="submit">VM erstellen</button>
        </form>
      </div>

      <!-- VM lösche -->
      <div class="card">
        <h2>Virtuelle Maschine löschen</h2>
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
          <label for="vm_name_delete">Name der VM</label>
          <input type="text" id="vm_name_delete" name="vm_name_delete" placeholder="z.B webserver-01" required>

          <button type="submit" class="delete">WM löschen</button>

          <p>
            Hinweis: die vm wird gelöscht!!!!!!!!1!!1!
          </p>
        </form>
      </div>

      <!-- Liste der VMs -->
      <div class="card">
        <h2>Laufende virtuelle Maschinen</h2>
        <ul>
          <?php
          foreach (Server::$server_data as $server) {
            foreach ($server->vms as $vmname => $values) {
              echo "<li>$vmname</li>";
            }
          }
          ?>
        </ul>
      </div>

      <!-- Preis -->
      <div class="card">
        <h2>Preis</h2>
      </div>

    </div>
  </main>

  <footer>
    UberCloud
  </footer>


</body>

</html>
