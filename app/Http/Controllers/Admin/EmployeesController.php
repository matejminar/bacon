<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Employee\IndexEmployee;
use App\Http\Requests\Admin\Employee\StoreEmployee;
use App\Http\Requests\Admin\Employee\UpdateEmployee;
use App\Http\Requests\Admin\Employee\DestroyEmployee;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Employee;

class EmployeesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexEmployee $request
     * @return Response|array
     */
    public function index(IndexEmployee $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Employee::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'is_at_work', 'last_seen_at'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        // TODO: this could be more sophisticated
        $avatars = [];
        $data->getCollection()->each(function($item) use (&$avatars) {
          $avatarThumbs = $item->getThumbs200ForCollection('avatar');
          $avatars[$item->id] = $avatarThumbs->isEmpty() ? null : config('app.url') . $avatarThumbs->first()['thumb_url'];
        });

        return view('admin.employee.index', ['data' => $data, 'avatars' => $avatars]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.employee.create');

        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEmployee $request
     * @return Response|array
     */
    public function store(StoreEmployee $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Employee
        $employee = Employee::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/employees'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  Employee $employee
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Employee $employee)
    {
        $this->authorize('admin.employee.show', $employee);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Employee $employee
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Employee $employee)
    {
        $this->authorize('admin.employee.edit', $employee);

        return view('admin.employee.edit', [
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEmployee $request
     * @param  Employee $employee
     * @return Response|array
     */
    public function update(UpdateEmployee $request, Employee $employee)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Employee
        $employee->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/employees'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyEmployee $request
     * @param  Employee $employee
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyEmployee $request, Employee $employee)
    {
        $employee->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
