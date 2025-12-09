<?php
require "../backend/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (
    !empty($_POST["vm_name"]) && 30 >= strlen($_POST["vm_name"]) &&
    !empty($_POST["cpu"]) &&
    !empty($_POST["ram"]) &&
    !empty($_POST["disk"])
  ) {
    $vm_name = htmlspecialchars($_POST["vm_name"]);
    $cpu = htmlspecialchars($_POST["cpu"]);
    $ram = htmlspecialchars($_POST["ram"]);
    $disk = htmlspecialchars($_POST["disk"]);

    Server::select_server($vm_name, $cpu, $ram, $disk);
    file_put_contents("../backend/data.json", json_encode(Server::$server_data, JSON_PRETTY_PRINT));
  } else if (!empty($_POST["vm_name_delete"])) {
    Server::delete_server($_POST["vm_name_delete"]);
    file_put_contents("../backend/data.json", json_encode(Server::$server_data, JSON_PRETTY_PRINT));
  }
}
