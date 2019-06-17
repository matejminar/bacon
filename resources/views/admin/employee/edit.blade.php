@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.employee.actions.edit', ['name' => $employee->name]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <employee-form
                :action="'{{ $employee->resource_url }}'"
                :data="{{ $employee->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.employee.actions.edit', ['name' => $employee->name]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.employee.components.form-elements')

                        @include('brackets/admin-ui::admin.includes.media-uploader', [
                            'mediaCollection' => app(App\Models\Employee::class)->getMediaCollection('avatar'),
                            'media' => $employee->getThumbs200ForCollection('avatar'),
                            'label' => 'Avatar'
                        ])

                        <div class="card-header">
                            <i class="fa fa-mobile-phone"></i> Devices
                        </div>
                        <table class="table table-listing">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin.device.columns.id') }}</th>
                                    <th>{{ trans('admin.device.columns.ip') }}</th>
                                    <th>{{ trans('admin.device.columns.mac') }}</th>
                                    <th>{{ trans('admin.device.columns.hostname') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee->devices as $device)
                                    <tr>
                                        <td>{{ $device->id }}</td>
                                        <td>{{ $device->ip }}</td>
                                        <td>{{ $device->mac }}</td>
                                        <td>{{ $device->hostname }}</td>
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" href="{{$device->resource_url}}/edit" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </employee-form>

    </div>

</div>

@endsection