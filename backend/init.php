<?php
$json = json_decode(file_get_contents("backend/data.json"));

$small_data = $json->small;
$medium_data = $json->medium;
$big_data = $json->big;

$servers = [
  "small" => new Server(
    $small_data->max_cpu,
    $small_data->used_cpu,
    $small_data->max_ram,
    $small_data->used_ram,
    $small_data->max_disk,
    $small_data->used_disk,
  ),
  "medium" => new Server(
    $medium_data->max_cpu,
    $medium_data->used_cpu,
    $medium_data->max_ram,
    $medium_data->used_ram,
    $medium_data->max_disk,
    $medium_data->used_disk,
  ),
  "big" => new Server(
    $big_data->max_cpu,
    $big_data->used_cpu,
    $big_data->max_ram,
    $big_data->used_ram,
    $big_data->max_disk,
    $big_data->used_disk,
  ),
];
