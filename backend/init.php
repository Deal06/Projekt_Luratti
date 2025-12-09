<?php
require "../backend/main.php";
$json = json_decode(file_get_contents("../backend/data.json"));

$small_data = $json->small;
$medium_data = $json->medium;
$big_data = $json->big;

Server::$server_data = [
  "small" => new Server(
    $small_data->id,
    (array) $small_data->vms,
    $small_data->max_cpu,
    $small_data->used_cpu,
    $small_data->max_ram,
    $small_data->used_ram,
    $small_data->max_disk,
    $small_data->used_disk,
  ),
  "medium" => new Server(
    $medium_data->id,
    (array) $medium_data->vms,
    $medium_data->max_cpu,
    $medium_data->used_cpu,
    $medium_data->max_ram,
    $medium_data->used_ram,
    $medium_data->max_disk,
    $medium_data->used_disk,
  ),
  "big" => new Server(
    $big_data->id,
    (array) $big_data->vms,
    $big_data->max_cpu,
    $big_data->used_cpu,
    $big_data->max_ram,
    $big_data->used_ram,
    $big_data->max_disk,
    $big_data->used_disk,
  ),
];
