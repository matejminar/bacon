<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': this.fields.name && this.fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.employee.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': this.fields.name && this.fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.employee.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_seen_at'), 'has-success': this.fields.last_seen_at && this.fields.last_seen_at.valid }">
    <label for="last_seen_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.employee.columns.last_seen_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.last_seen_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('last_seen_at'), 'form-control-success': this.fields.last_seen_at && this.fields.last_seen_at.valid}" id="last_seen_at" name="last_seen_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('last_seen_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_seen_at') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_at_work'), 'has-success': this.fields.is_at_work && this.fields.is_at_work.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_at_work" type="checkbox" v-model="form.is_at_work" v-validate="''" data-vv-name="is_at_work"  name="is_at_work_fake_element">
        <label class="form-check-label" for="is_at_work">
            {{ trans('admin.employee.columns.is_at_work') }}
        </label>
        <input type="hidden" name="is_at_work" :value="form.is_at_work">
        <div v-if="errors.has('is_at_work')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_at_work') }}</div>
    </div>
</div>


