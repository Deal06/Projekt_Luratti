<?php

class Server
{
  public int $used_cpu;
  public int $used_ram;
  public int $used_disk;

  public int $max_cpu;
  public int $max_ram;
  public int $max_disk;

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

$small = new Server(8, 32, 16);
$medium = new Server(16, 256, 64);
$big = new Server(64, 512, 128);
