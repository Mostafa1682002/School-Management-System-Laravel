<?php

namespace App\Http\Livewire;

use App\Models\Myparent;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Type_Blood;
use App\Models\Parent_attachemnt;
use App\Models\ParentAttachment;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    public $table_show = true;
    public $edite_parent = false;
    public $attachemnts = [];
    public $successMessage = '';
    public $parent_id = 0;
    public $email, $password, $name_father, $name_father_en,
        $job_father, $job_father_en, $national_id_father,
        $type_blood_father_id, $nationality_father_id,
        $address_father, $religion_father_id,
        $passport_id_father, $phone_father,

        $name_mother, $name_mother_en, $job_mother, $job_mother_en,
        $national_id_mother, $passport_id_mother, $phone_mother, $nationality_mother_id,
        $type_blood_mother_id, $religion_mother_id, $address_mother;

    public function render()
    {
        return view(
            'livewire.add-parent',
            [
                'nationalities' => Nationality::get(),
                "religions" => Religion::get(),
                "type_bloods" => Type_Blood::get(),
                "my_parents" => Myparent::get(),
            ]
        );
    }

    //Validate
    public function updated($propertyName)
    {
        $this->validateOnly(
            $propertyName,
            [
                //Father
                'email' => "required|email|unique:myparents,email," . $this->parent_id,
                'password' => "required|string|min:5",
                'name_father' => "required|regex:/^[\p{Arabic} ]+/u",
                'name_father_en' => "required|regex:/^[a-zA-Z ]+/",
                "job_father" => "required|regex:/^[\p{Arabic} ]+/u",
                "job_father_en" => "required|regex:/^[a-zA-Z ]+/",
                "national_id_father" => "required|string|min:10|max:14|regex:/^[0-9]+/|unique:myparents,national_id_father," . $this->parent_id,
                "passport_id_father" => "required|string|min:10|max:14|regex:/^[0-9]+/|unique:myparents,passport_id_father," . $this->parent_id,
                "type_blood_father_id" => "required|exists:type__bloods,id",
                "nationality_father_id" => "required|exists:nationalities,id",
                "religion_father_id" => "required|exists:religions,id",
                "address_father" => "required",
                "phone_father" => "required|string|min:10|max:14|regex:/01[0-2,5]{1}[0-9]{8}$/|unique:myparents,phone_father," . $this->parent_id,

                //Mother
                'name_mother' => "required|regex:/^[\p{Arabic} ]+/u",
                'name_mother_en' => "required|regex:/^[a-zA-Z ]+/",
                "job_mother" => "required|regex:/^[\p{Arabic} ]+/u",
                "job_mother_en" => "required|regex:/^[a-zA-Z ]+/",
                "national_id_mother" => "required|string|min:10|max:14|regex:/^[0-9]+/|unique:myparents,national_id_mother," . $this->parent_id,
                "passport_id_mother" => "required|string|min:10|max:14|regex:/^[0-9]+/|unique:myparents,passport_id_mother," . $this->parent_id,
                "type_blood_mother_id" => "required|exists:type__bloods,id",
                "nationality_mother_id" => "required|exists:nationalities,id",
                "religion_mother_id" => "required|exists:religions,id",
                "address_mother" => "required",
                "phone_mother" => "required|string|min:10|max:14|regex:/01[0-2,5]{1}[0-9]{8}$/|unique:myparents,phone_mother," . $this->parent_id,
            ],
            [
            ],
            [
                'email' => trans('Myparent_trans.email'),
                'password' => trans('Myparent_trans.password'),
                'name_father' => trans('Myparent_trans.name_father'),
                'name_father_en' => trans('Myparent_trans.name_father_en'),
                'job_father' => trans('Myparent_trans.job_father'),
                'job_father_en' => trans('Myparent_trans.job_father_en'),
                "national_id_father" => trans('Myparent_trans.national_id_father'),
                'passport_id_father' => trans('Myparent_trans.passport_id_father'),
                "type_blood_father_id" => trans('Myparent_trans.blood_type_father_id'),
                "nationality_father_id" => trans('Myparent_trans.nationality_father_id'),
                "religion_father_id" => trans('Myparent_trans.religion_father_id'),
                "address_father" => trans('Myparent_trans.address_father'),
                "phone_father" => trans('Myparent_trans.phone_father'),
                //Mother
                'name_mother' => trans('Myparent_trans.name_mother'),
                'name_mother_en' => trans('Myparent_trans.name_mother_en'),
                'job_mother' => trans('Myparent_trans.job_mother'),
                'job_mother_en' => trans('Myparent_trans.job_mother_en'),
                "national_id_mother" => trans('Myparent_trans.national_id_mother'),
                'passport_id_mother' => trans('Myparent_trans.passport_id_mother'),
                "type_blood_mother_id" => trans('Myparent_trans.blood_type_mother_id'),
                "nationality_mother_id" => trans('Myparent_trans.nationality_mother_id'),
                "religion_mother_id" => trans('Myparent_trans.religion_mother_id'),
                "address_mother" => trans('Myparent_trans.address_mother'),
                "phone_mother" => trans('Myparent_trans.phone_mother')
            ]
        );
    }

    public function firstStepSubmit()
    {
        $this->validate([
            //Father
            'email' => "required|email|unique:myparents,email," . $this->parent_id,
            'password' => "required|string|min:5",
            'name_father' => "required|regex:/^[\p{Arabic} ]+/u",
            'name_father_en' => "required|regex:/^[a-zA-Z ]+/",
            "job_father" => "required|regex:/^[\p{Arabic} ]+/u",
            "job_father_en" => "required|regex:/^[a-zA-Z ]+/",
            "national_id_father" => "required|string|min:10|max:14|regex:/^[0-9]+/|unique:myparents,national_id_father," . $this->parent_id,
            "passport_id_father" => "required|string|min:10|max:14|regex:/^[0-9]+/|unique:myparents,passport_id_father," . $this->parent_id,
            "type_blood_father_id" => "required|exists:type__bloods,id",
            "nationality_father_id" => "required|exists:nationalities,id",
            "religion_father_id" => "required|exists:religions,id",
            "address_father" => "required",
            "phone_father" => "required|string|min:10|max:14|regex:/01[0-2,5]{1}[0-9]{8}$/|unique:myparents,phone_father," . $this->parent_id,
        ], [
        ],
            [
            //Father
            'email' => trans('Myparent_trans.email'),
            'password' => trans('Myparent_trans.password'),
            'name_father' => trans('Myparent_trans.name_father'),
            'name_father_en' => trans('Myparent_trans.name_father_en'),
            'job_father' => trans('Myparent_trans.job_father'),
            'job_father_en' => trans('Myparent_trans.job_father_en'),
            "national_id_father" => trans('Myparent_trans.national_id_father'),
            'passport_id_father' => trans('Myparent_trans.passport_id_father'),
            "type_blood_father_id" => trans('Myparent_trans.blood_type_father_id'),
            "nationality_father_id" => trans('Myparent_trans.nationality_father_id'),
            "religion_father_id" => trans('Myparent_trans.religion_father_id'),
            "address_father" => trans('Myparent_trans.address_father'),
            "phone_father" => trans('Myparent_trans.phone_father'),
        ]);
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            //Mother
            'name_mother' => "required|regex:/^[\p{Arabic} ]+/u",
            'name_mother_en' => "required|regex:/^[a-zA-Z ]+/",
            "job_mother" => "required|regex:/^[\p{Arabic} ]+/u",
            "job_mother_en" => "required|regex:/^[a-zA-Z ]+/",
            "national_id_mother" => "required|string|min:10|max:14|regex:/^[0-9]+/|unique:myparents,national_id_mother," . $this->parent_id,
            "passport_id_mother" => "required|string|min:10|max:14|regex:/^[0-9]+/|unique:myparents,passport_id_mother," . $this->parent_id,
            "type_blood_mother_id" => "required|exists:type__bloods,id",
            "nationality_mother_id" => "required|exists:nationalities,id",
            "religion_mother_id" => "required|exists:religions,id",
            "address_mother" => "required",
            "phone_mother" => "required|string|min:10|max:14|regex:/01[0-2,5]{1}[0-9]{8}$/|unique:myparents,phone_mother," . $this->parent_id
        ], []
            , [
            //Mother
            'name_mother' => trans('Myparent_trans.name_mother'),
            'name_mother_en' => trans('Myparent_trans.name_mother_en'),
            'job_mother' => trans('Myparent_trans.job_mother'),
            'job_mother_en' => trans('Myparent_trans.job_mother_en'),
            "national_id_mother" => trans('Myparent_trans.national_id_mother'),
            'passport_id_mother' => trans('Myparent_trans.passport_id_mother'),
            "type_blood_mother_id" => trans('Myparent_trans.blood_type_mother_id'),
            "nationality_mother_id" => trans('Myparent_trans.nationality_mother_id'),
            "religion_mother_id" => trans('Myparent_trans.religion_mother_id'),
            "address_mother" => trans('Myparent_trans.address_mother'),
            "phone_mother" => trans('Myparent_trans.phone_mother')
        ]);
        $this->currentStep = 3;
    }


    public function submitForm()
    {
        Myparent::create([
            "email" => $this->email,
            "password" => $this->password,
            "name_father" => ["ar" => $this->name_father, "en" => $this->name_father_en],
            "national_id_father" => $this->national_id_father,
            "passport_id_father" => $this->passport_id_father,
            "job_father" => ['ar' => $this->job_father, "en" => $this->job_father_en],
            "nationality_father_id" => $this->nationality_father_id,
            "type_blood_father_id" => $this->type_blood_father_id,
            "religion_father_id" => $this->religion_father_id,
            "address_father" => $this->address_father,
            "phone_father" => $this->phone_father,
            //Mother
            "name_mother" => ["ar" => $this->name_mother, "en" => $this->name_mother_en],
            "national_id_mother" => $this->national_id_mother,
            "passport_id_mother" => $this->passport_id_mother,
            "job_mother" => ['ar' => $this->job_mother, "en" => $this->job_mother_en],
            "nationality_mother_id" => $this->nationality_mother_id,
            "type_blood_mother_id" => $this->type_blood_mother_id,
            "religion_mother_id" => $this->religion_mother_id,
            "address_mother" => $this->address_mother,
            "phone_mother" => $this->phone_mother,
        ]);

        $id = Myparent::latest()->first()->id;
        if ($this->attachemnts) {
            foreach ($this->attachemnts as $attachemnt) {
                $attachemnt->storeAs($id, $attachemnt->getClientOriginalName(), 'parent_attachemnt');
                ParentAttachment::create([
                    'file_name' => $id . "/" . $attachemnt->getClientOriginalName(),
                    'myparent_id' => $id,
                ]);
            }
        }
        return redirect()->route('add_parent')->with('save', '000');
    }

    //Show Form Add Parent
    public function showformadd()
    {
        $this->table_show = false;
    }


    //Back To Last Page
    public function back($num)
    {
        $this->currentStep -= $num;
    }

    //Back To List Of Parent
    public function backtolist()
    {
        $this->table_show = true;
    }


    //Edite Parent
    public function edit($id)
    {
        //Hidden Table
        $this->table_show = false;
        //Show Form Edite
        $this->edite_parent = true;
        $this->parent_id = $id;

        $myparent = Myparent::find($id);
        $this->email = $myparent->email;
        $this->password = $myparent->password;
        $this->name_father = $myparent->getTranslation('name_father', 'ar');
        $this->name_father_en = $myparent->getTranslation('name_father', 'en');
        $this->job_father = $myparent->getTranslation('job_father', 'ar');
        $this->job_father_en = $myparent->getTranslation('job_father', 'en');
        $this->national_id_father = $myparent->national_id_father;
        $this->passport_id_father = $myparent->passport_id_father;
        $this->phone_father = $myparent->phone_father;
        $this->nationality_father_id = $myparent->nationality_father_id;
        $this->type_blood_father_id = $myparent->type_blood_father_id;
        $this->religion_father_id = $myparent->religion_father_id;
        $this->address_father = $myparent->address_father;
        $this->name_mother = $myparent->getTranslation('name_mother', 'ar');
        $this->name_mother_en = $myparent->getTranslation('name_mother', 'en');
        $this->job_mother = $myparent->getTranslation('job_mother', 'ar');
        $this->job_mother_en = $myparent->getTranslation('job_mother', 'en');
        $this->national_id_mother = $myparent->national_id_mother;
        $this->passport_id_mother = $myparent->passport_id_mother;
        $this->phone_mother = $myparent->phone_mother;
        $this->nationality_mother_id = $myparent->nationality_mother_id;
        $this->type_blood_mother_id = $myparent->type_blood_mother_id;
        $this->religion_mother_id = $myparent->religion_mother_id;
        $this->address_mother = $myparent->address_mother;
    }

    public function SubmitForm_edite()
    {
        if ($this->parent_id) {
            $parent = Myparent::find($this->parent_id);
            $parent->update([
                "email" => $this->email,
                "password" => $this->password,
                "name_father" => ["ar" => $this->name_father, "en" => $this->name_father_en],
                "national_id_father" => $this->national_id_father,
                "passport_id_father" => $this->passport_id_father,
                "job_father" => ['ar' => $this->job_father, "en" => $this->job_father_en],
                "nationality_father_id" => $this->nationality_father_id,
                "type_blood_father_id" => $this->type_blood_father_id,
                "religion_father_id" => $this->religion_father_id,
                "address_father" => $this->address_father,
                "phone_father" => $this->phone_father,
                //Mother
                "name_mother" => ["ar" => $this->name_mother, "en" => $this->name_mother_en],
                "national_id_mother" => $this->national_id_mother,
                "passport_id_mother" => $this->passport_id_mother,
                "job_mother" => ['ar' => $this->job_mother, "en" => $this->job_mother_en],
                "nationality_mother_id" => $this->nationality_mother_id,
                "type_blood_mother_id" => $this->type_blood_mother_id,
                "religion_mother_id" => $this->religion_mother_id,
                "address_mother" => $this->address_mother,
                "phone_mother" => $this->phone_mother,
            ]);


            if ($this->attachemnts) {
                foreach ($this->attachemnts as $attachemnt) {
                    $attachemnt->storeAs($this->parent_id, $attachemnt->getClientOriginalName(), 'parent_attachemnt');
                    ParentAttachment::create([
                        'file_name' => $this->parent_id . "/" . $attachemnt->getClientOriginalName(),
                        'myparent_id' => $this->parent_id,
                    ]);
                }
            }
            return redirect()->route('add_parent')->with('update', '000');
        }
    }


    //Delete Parent
    public function delete($id)
    {
        // $this->parent_id = $id;
        if (Myparent::with('attachments')->find($id)) {
            Storage::disk('parent_attachemnt')->deleteDirectory($id);
        }
        Myparent::find($id)->delete();
        return redirect()->route('add_parent')->with('delete', '000');
    }
}
