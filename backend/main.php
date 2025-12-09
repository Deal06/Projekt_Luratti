<?php

class Server
{
  public static array $server_data;
  public int $id;
  public array $vms;

  public int $used_cpu = 0;
  public int $used_ram = 0;
  public int $used_disk = 0;

  public readonly int $max_cpu;
  public readonly int $max_ram;
  public readonly int $max_disk;

  function __construct(
    int $id,
    array $vms,
    int $max_cpu,
    int $used_cpu,
    int $max_ram,
    int $used_ram,
    int $max_disk,
    int $used_disk,
  ) {
    $this->id = $id;
    $this->vms = $vms;
    $this->max_cpu = $max_cpu;
    $this->used_cpu = $used_cpu;
    $this->max_ram = $max_ram;
    $this->used_ram = $used_ram;
    $this->max_disk = $max_disk;
    $this->used_disk = $used_disk;
  }

  static function select_server(String $vm_name, int $cpu, int $ram, int $disk): int | null
  {
    foreach (Server::$server_data as $server) {
      if (
        !in_array($vm_name, $server->vms) &&
        ($server->max_cpu - $server->used_cpu >= $cpu) &&
        ($server->max_ram - $server->used_ram >= $ram) &&
        ($server->max_disk - $server->used_disk >= $disk)
      ) {
        $server->used_cpu = $cpu;
        $server->used_ram = $ram;
        $server->used_disk = $disk;
        $server->vms["$vm_name"] = ["vm_used_cpu" => $cpu, "vm_used_ram" => $ram, "vm_used_disk" => $disk];
        return $server->id;
      }
    }
    return null;
  }

  static function delete_server(String $vm_name_delete): bool
  {
    foreach (Server::$server_data as $server) {

      if (array_key_exists($vm_name_delete, $server->vms)) {
        $vm_array = (array) $server->vms["$vm_name_delete"];

        $server->used_cpu  -= $vm_array["vm_used_cpu"];
        $server->used_ram  -= $vm_array["vm_used_ram"];
        $server->used_disk -= $vm_array["vm_used_disk"];
        unset($server->vms[$vm_name_delete]);
        return true;
      }
    }
    return false;
  }
}
