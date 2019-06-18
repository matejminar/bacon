<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UpdateDevices;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;

class ApiDevicesController extends Controller
{
  public function updateDevices(UpdateDevices $request) {
    $devices = collect($request->validated());

    // create new or update existing devices
    $devices->each(function($item) {
      Device::updateOrCreate(
        ['mac' => $item['mac']],
        ['ip' => $item['ip'], 'hostname' => $item['hostname']]
      );
    });

    // reset state of all employees
    // TODO: optimize these queries
    Employee::query()->update(['is_at_work' => false]);

    // update employees that are at work
    Employee::whereHas('devices', function($query) use ($devices) {
      $query->whereIn('mac', $devices->pluck('mac'));
    })->update(['is_at_work' => true, 'last_seen_at' => now()]);

    return response('ok', 200);
  }
}
