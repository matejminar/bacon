<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ip'), 'has-success': this.fields.ip && this.fields.ip.valid }">
    <label for="ip" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.device.columns.ip') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ip" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ip'), 'form-control-success': this.fields.ip && this.fields.ip.valid}" id="ip" name="ip" placeholder="{{ trans('admin.device.columns.ip') }}">
        <div v-if="errors.has('ip')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ip') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mac'), 'has-success': this.fields.mac && this.fields.mac.valid }">
    <label for="mac" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.device.columns.mac') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mac" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mac'), 'form-control-success': this.fields.mac && this.fields.mac.valid}" id="mac" name="mac" placeholder="{{ trans('admin.device.columns.mac') }}">
        <div v-if="errors.has('mac')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mac') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hostname'), 'has-success': this.fields.hostname && this.fields.hostname.valid }">
    <label for="hostname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.device.columns.hostname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.hostname" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('hostname'), 'form-control-success': this.fields.hostname && this.fields.hostname.valid}" id="hostname" name="hostname" placeholder="{{ trans('admin.device.columns.hostname') }}">
        <div v-if="errors.has('hostname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hostname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('employee_id'), 'has-success': this.fields.employee_id && this.fields.employee_id.valid }">
    <label for="employee_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.device.columns.employee_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.employee_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('employee_id'), 'form-control-success': this.fields.employee_id && this.fields.employee_id.valid}" id="employee_id" name="employee_id" placeholder="{{ trans('admin.device.columns.employee_id') }}">
        <div v-if="errors.has('employee_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('employee_id') }}</div>
    </div>
</div>


