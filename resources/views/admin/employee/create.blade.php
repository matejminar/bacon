@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.employee.actions.create'))

@section('body')

    <div class="container-xl">

        <div class="card">

            <employee-form
                :action="'{{ url('admin/employees') }}'"
                
                inline-template>

                <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="this.action" novalidate>

                    <div class="card-header">
                        <i class="fa fa-plus"></i> {{ trans('admin.employee.actions.create') }}
                    </div>

                    <div class="card-body">

                        @include('admin.employee.components.form-elements')

                        @include('brackets/admin-ui::admin.includes.media-uploader', [
                           'mediaCollection' => app(App\Models\Employee::class)->getMediaCollection('avatar'),
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