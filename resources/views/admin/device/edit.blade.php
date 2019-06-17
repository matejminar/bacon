@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.device.actions.edit', ['name' => $device->id]))

@section('body')

    <div class="container-xl">

        <div class="card">

            <device-form
                :action="'{{ $device->resource_url }}'"
                :employees="{{ $employees->toJson() }}"
                :data="{{ $device->toJson() }}"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.device.actions.edit', ['name' => $device->id]) }}
                    </div>

                    <div class="card-body">

                        @include('admin.device.components.form-elements')

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
		                    {{ trans('brackets/admin-ui::admin.btn.save') }}
	                    </button>
                    </div>

                </form>

        </device-form>

    </div>

</div>

@endsection