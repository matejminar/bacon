@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.employee.actions.index'))

@section('styles')
    {{--FIXME: hacky way to do this--}}
    <script>
        window.avatars = {!!json_encode($avatars) !!};
    </script>
@endsection

@section('body')
    <employee-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/employees') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.employee.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/employees/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.employee.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">
                                        
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                            </div>
                        </form>
@{{avatars}}
                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th is='sortable' :column="'id'">{{ trans('admin.employee.columns.id') }}</th>
                                    <th>{{ trans('admin.employee.columns.avatar') }}</th>
                                    <th is='sortable' :column="'name'">{{ trans('admin.employee.columns.name') }}</th>
                                    <th is='sortable' :column="'is_at_work'">{{ trans('admin.employee.columns.is_at_work') }}</th>
                                    <th is='sortable' :column="'last_seen_at'">{{ trans('admin.employee.columns.last_seen_at') }}</th>
                                    <th is='sortable' :column="'is_published'">{{ trans('admin.employee.columns.is_published') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td>@{{ item.id }}</td>
                                    <td>
                                        <img v-if="window.avatars[item.id]" class="avatar-photo" :src="window.avatars[item.id]" :alt="item.name">
                                    </td>
                                    <td>@{{ item.name }}</td>
                                    <td>
                                        <i class="fa boolean-icon" :class="{'fa-times': !item.is_at_work, 'fa-check': item.is_at_work}"></i>
                                    </td>
                                    <td>@{{ item.last_seen_at | datetime }}</td>
                                    <td>
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].is_published" @change="toggleSwitch(item.resource_url, 'is_published', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

	                    <div class="no-items-found" v-if="!collection.length > 0">
		                    <i class="icon-magnifier"></i>
		                    <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
		                    <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/employees/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.employee.actions.create') }}</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </employee-listing>

@endsection