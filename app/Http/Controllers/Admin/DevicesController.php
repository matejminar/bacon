<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Device\IndexDevice;
use App\Http\Requests\Admin\Device\StoreDevice;
use App\Http\Requests\Admin\Device\UpdateDevice;
use App\Http\Requests\Admin\Device\DestroyDevice;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Device;

class DevicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexDevice $request
     * @return Response|array
     */
    public function index(IndexDevice $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Device::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'ip', 'mac', 'hostname', 'employee_id'],

            // set columns to searchIn
            ['id', 'ip', 'mac', 'hostname']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.device.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.device.create');

        return view('admin.device.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDevice $request
     * @return Response|array
     */
    public function store(StoreDevice $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Device
        $device = Device::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/devices'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/devices');
    }

    /**
     * Display the specified resource.
     *
     * @param  Device $device
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Device $device)
    {
        $this->authorize('admin.device.show', $device);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Device $device
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Device $device)
    {
        $this->authorize('admin.device.edit', $device);

        return view('admin.device.edit', [
            'device' => $device,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDevice $request
     * @param  Device $device
     * @return Response|array
     */
    public function update(UpdateDevice $request, Device $device)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Device
        $device->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/devices'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/devices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyDevice $request
     * @param  Device $device
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyDevice $request, Device $device)
    {
        $device->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
