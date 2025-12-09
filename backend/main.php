<?php

class Server
{
  public static array $servers;
  public int $id;

  public int $used_cpu = 0;
  public int $used_ram = 0;
  public int $used_disk = 0;

  public readonly int $max_cpu;
  public readonly int $max_ram;
  public readonly int $max_disk;

  function __construct(
    int $id,
    int $max_cpu,
    int $used_cpu,
    int $max_ram,
    int $used_ram,
    int $max_disk,
    int $used_disk,
  ) {
    $this->id = $id;
    $this->max_cpu = $max_cpu;
    $this->used_cpu = $used_cpu;
    $this->max_ram = $max_ram;
    $this->used_ram = $used_ram;
    $this->max_disk = $max_disk;
    $this->used_disk = $used_disk;
  }

  static function select_server(int $cpu, int $ram, int $disk): int | null
  {
    foreach (Server::$servers as $server) {
      if (($server->max_cpu - $server->used_cpu) >= $cpu &&
        ($server->max_ram - $server->used_ram) >= $ram &&
        ($server->max_disk - $server->used_disk) >= $disk
      ) {
        $server->used_cpu = $cpu;
        $server->used_ram = $ram;
        $server->used_disk = $disk;
        return $server->id;
      }
    }
    return null;
  }
}

function main()
{
  require "backend/init.php";
  print_r(Server::select_server(9, 2, 3));
  file_put_contents("backend/data.json", json_encode(Server::$servers, JSON_PRETTY_PRINT));
}

main();
