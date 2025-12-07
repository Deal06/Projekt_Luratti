<?php

class Server
{
  public int $used_cpu;
  public int $used_ram;
  public int $used_disk;

  public readonly int $max_cpu;
  public readonly int $max_ram;
  public readonly int $max_disk;

  function __construct(
    int $max_cpu,
    int $max_ram,
    int $max_disk
  ) {
    $this->max_cpu = $max_cpu;
    $this->max_ram = $max_ram;
    $this->max_disk = $max_disk;
  }
}

require "init.php";

$small_data = $json->small;
$medium_data = $json->medium;
$big_data = $json->big;

$servers = [
  "small"  => new Server(
    $small_data->max_cpu,
    $small_data->max_ram,
    $small_data->max_disk
  ),
  "medium" => new Server(
    $medium_data->max_cpu,
    $medium_data->max_ram,
    $medium_data->max_disk
  ),
  "big"   => new Server(
    $big_data->max_cpu,
    $big_data->max_ram,
    $big_data->max_disk
  ),
];

file_put_contents("data.json", json_encode($servers, JSON_PRETTY_PRINT));
