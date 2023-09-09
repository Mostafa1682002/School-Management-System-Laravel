<div>

    @if ($table_show)
        <button class="btn btn-success btn-sm btn-lg ml-0" wire:click="showformadd"
            type="button">{{ trans('Myparent_trans.add_parent') }}</button><br><br>
        <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                style="text-align: center">
                <thead>
                    <tr class="table-success">
                        <th>#</th>
                        <th>{{ trans('Myparent_trans.email') }}</th>
                        <th>{{ trans('Myparent_trans.name_father') }}</th>
                        <th>{{ trans('Myparent_trans.national_id_father') }}</th>
                        <th>{{ trans('Myparent_trans.passport_id_father') }}</th>
                        <th>{{ trans('Myparent_trans.phone_father') }}</th>
                        <th>{{ trans('Myparent_trans.job_father') }}</th>
                        <th>{{ trans('Myparent_trans.processes') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($my_parents as $my_parent)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $my_parent->email }}</td>
                            <td>{{ $my_parent->name_father }}</td>
                            <td>{{ $my_parent->national_id_father }}</td>
                            <td>{{ $my_parent->passport_id_father }}</td>
                            <td>{{ $my_parent->phone_father }}</td>
                            <td>{{ $my_parent->job_father }}</td>
                            <td>
                                <button wire:click="edit({{ $my_parent->id }})"
                                    title="{{ trans('Myparent_trans.edit') }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $my_parent->id }})"
                                    title="{{ trans('Myparent_trans.delete') }}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    @else
        <button class="btn btn-danger btn-sm btn-lg ml-0" wire:click="backtolist"
            type="button">{{ trans('Myparent_trans.backtolist') }}</button><br><br>

        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                        class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>{{ trans('Myparent_trans.step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                        class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>{{ trans('Myparent_trans.step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                        class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                        disabled="disabled">3</a>
                    <p>{{ trans('Myparent_trans.step3') }}</p>
                </div>
            </div>
        </div>


        {{-- Father --}}
        @if ($currentStep != 1)
            <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row my-3">
                    <div class="col">
                        <label for="title">{{ trans('Myparent_trans.email') }}</label>
                        <input type="email" wire:model="email" class="form-control">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{ trans('Myparent_trans.password') }}</label>
                        <input type="password" wire:model="password" class="form-control">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row my-3">
                    <div class="col">
                        <label for="title">{{ trans('Myparent_trans.name_father') }}</label>
                        <input type="text" wire:model="name_father" class="form-control">
                        @error('name_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{ trans('Myparent_trans.name_father_en') }}</label>
                        <input type="text" wire:model="name_father_en" class="form-control">
                        @error('name_father_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row my-3">
                    <div class="col-md-3">
                        <label for="title">{{ trans('Myparent_trans.job_father') }}</label>
                        <input type="text" wire:model="job_father" class="form-control">
                        @error('job_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">{{ trans('Myparent_trans.job_father_en') }}</label>
                        <input type="text" wire:model="job_father_en" class="form-control">
                        @error('job_father_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{ trans('Myparent_trans.national_id_father') }}</label>
                        <input type="text" wire:model="national_id_father" class="form-control">
                        @error('national_id_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{ trans('Myparent_trans.passport_id_father') }}</label>
                        <input type="text" wire:model="passport_id_father" class="form-control">
                        @error('passport_id_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">{{ trans('Myparent_trans.phone_father') }}</label>
                        <input type="text" wire:model="phone_father" class="form-control">
                        @error('phone_father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row my-3">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{ trans('Myparent_trans.nationality_father_id') }}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="nationality_father_id">
                            <option selected>{{ trans('Myparent_trans.choose') }}...</option>
                            @foreach ($nationalities as $national)
                                <option value="{{ $national->id }}">{{ $national->nationality_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('nationality_father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{ trans('Myparent_trans.blood_type_father_id') }}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="type_blood_father_id">
                            <option selected>{{ trans('Myparent_trans.choose') }}...</option>
                            @foreach ($type_bloods as $type_blood)
                                <option value="{{ $type_blood->id }}">{{ $type_blood->blood_name }}</option>
                            @endforeach
                        </select>
                        @error('type_blood_father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{ trans('Myparent_trans.religion_father_id') }}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="religion_father_id">
                            <option selected>{{ trans('Myparent_trans.choose') }}...</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->religion_name }}</option>
                            @endforeach
                        </select>
                        @error('religion_father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{ trans('Myparent_trans.address_father') }}</label>
                    <textarea class="form-control" wire:model="address_father" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('address_father')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                    type="button">{{ trans('Myparent_trans.next') }}
                </button>

            </div>
        </div>
</div>



{{-- Mother  --}}
@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="form-row my-3">
            <div class="col">
                <label for="title">{{ trans('Myparent_trans.name_mother') }}</label>
                <input type="text" wire:model="name_mother" class="form-control">
                @error('name_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Myparent_trans.name_mother_en') }}</label>
                <input type="text" wire:model="name_mother_en" class="form-control">
                @error('name_mother_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row my-3">
            <div class="col-md-3">
                <label for="title">{{ trans('Myparent_trans.job_mother') }}</label>
                <input type="text" wire:model="job_mother" class="form-control">
                @error('job_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{ trans('Myparent_trans.job_mother_en') }}</label>
                <input type="text" wire:model="job_mother_en" class="form-control">
                @error('job_mother_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Myparent_trans.national_id_mother') }}</label>
                <input type="text" wire:model="national_id_mother" class="form-control">
                @error('national_id_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Myparent_trans.passport_id_mother') }}</label>
                <input type="text" wire:model="passport_id_mother" class="form-control">
                @error('passport_id_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Myparent_trans.phone_mother') }}</label>
                <input type="text" wire:model="phone_mother" class="form-control">
                @error('phone_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row my-3">
            <div class="form-group col-md-6">
                <label for="inputCity">{{ trans('Myparent_trans.nationality_mother_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="nationality_mother_id">
                    <option selected>{{ trans('Myparent_trans.choose') }}...</option>
                    @foreach ($nationalities as $national)
                        <option value="{{ $national->id }}">{{ $national->nationality_name }}
                        </option>
                    @endforeach
                </select>
                @error('nationality_mother_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">{{ trans('Myparent_trans.blood_type_mother_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="type_blood_mother_id">
                    <option selected>{{ trans('Myparent_trans.choose') }}...</option>
                    @foreach ($type_bloods as $type_blood)
                        <option value="{{ $type_blood->id }}">{{ $type_blood->blood_name }}</option>
                    @endforeach
                </select>
                @error('type_blood_mother_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputZip">{{ trans('Myparent_trans.religion_mother_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="religion_mother_id">
                    <option selected>{{ trans('Myparent_trans.choose') }}...</option>
                    @foreach ($religions as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->religion_name }}</option>
                    @endforeach
                </select>
                @error('religion_mother_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group my-3">
            <label for="exampleFormControlTextarea1">{{ trans('Myparent_trans.address_mother') }}</label>
            <textarea class="form-control" wire:model="address_mother" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('address_mother')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right mx-1" type="button" wire:click="back(1)">
            {{ trans('Myparent_trans.back') }}
        </button>

        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
            wire:click="secondStepSubmit">{{ trans('Myparent_trans.next') }}</button>

    </div>
</div>
</div>


<div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    @if ($currentStep != 3)
        <div style="display: none" class="row setup-content" id="step-3">
    @endif
    <div class="col-xs-12">
        <div class="col-md-12">
            <div class="form-group my-3">
                <label for="exampleFormControlTextarea1">{{ trans('Myparent_trans.attachemnts') }}</label>
                <input type="file" wire:model="attachemnts" multiple id="" accept="image/*">
                @error('address_mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <h3 style="font-family: 'Cairo', sans-serif;">{{ trans('Myparent_trans.confirm_data') }}</h3><br>
            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right mx-1" type="button"
                wire:click="back(2)">{{ trans('Myparent_trans.back') }}</button>
            @if ($edite_parent)
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="SubmitForm_edite"
                    type="button">{{ trans('Myparent_trans.edit') }}</button>
            @else
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                    type="button">{{ trans('Myparent_trans.finish') }}</button>
            @endif
        </div>
    </div>
</div>
</div>

@endif
</div>
