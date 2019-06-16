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