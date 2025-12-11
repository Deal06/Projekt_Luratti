<?php

class Server
{
  public static array $server_data;
  public int $id;
  public array $vms;

  public int $used_cpu = 0;
  public int $used_ram = 0;
  public int $used_ssd = 0;

  public readonly int $max_cpu;
  public readonly int $max_ram;
  public readonly int $max_ssd;

  function __construct(
    int $id,
    array $vms,
    int $max_cpu,
    int $used_cpu,
    int $max_ram,
    int $used_ram,
    int $max_ssd,
    int $used_ssd,
  ) {
    $this->id = $id;
    $this->vms = $vms;
    $this->max_cpu = $max_cpu;
    $this->used_cpu = $used_cpu;
    $this->max_ram = $max_ram;
    $this->used_ram = $used_ram;
    $this->max_ssd = $max_ssd;
    $this->used_ssd = $used_ssd;
  }

  static function select_server(String $vm_name, int $cpu, int $ram, int $ssd): int | null
  {
    foreach (Server::$server_data as $server) {
      if (
        !in_array($vm_name, $server->vms) &&
        ($server->max_cpu - $server->used_cpu >= $cpu) &&
        ($server->max_ram - $server->used_ram >= $ram) &&
        ($server->max_ssd - $server->used_ssd >= $ssd)
      ) {
        $server->used_cpu = $cpu;
        $server->used_ram = $ram;
        $server->used_ssd = $ssd;
        $server->vms["$vm_name"] = ["vm_used_cpu" => $cpu, "vm_used_ram" => $ram, "vm_used_ssd" => $ssd];
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
        $server->used_ssd -= $vm_array["vm_used_ssd"];
        unset($server->vms[$vm_name_delete]);
        return true;
      }
    }
    return false;
  }
}
