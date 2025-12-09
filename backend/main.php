<?php

class Server
{
  public int $used_cpu = 0;
  public int $used_ram = 0;
  public int $used_disk = 0;

  public readonly int $max_cpu;
  public readonly int $max_ram;
  public readonly int $max_disk;

  function __construct(
    int $max_cpu,
    int $used_cpu,
    int $max_ram,
    int $used_ram,
    int $max_disk,
    int $used_disk,
  ) {
    $this->max_cpu = $max_cpu;
    $this->used_cpu = $used_cpu;
    $this->max_ram = $max_ram;
    $this->used_ram = $used_ram;
    $this->max_disk = $max_disk;
    $this->used_disk = $used_disk;
  }
}

function main()
{
  require "backend/init.php";
  file_put_contents("backend/data.json", json_encode($servers, JSON_PRETTY_PRINT));
}

main();
