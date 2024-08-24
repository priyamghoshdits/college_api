<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Course;
use App\Models\Registration;
use App\Models\Semester;
use App\Models\Session;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'identification_no' => $this->identification_no,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'religion' => $this->religion,
            'mobile_no' => $this->mobile_no,
            'img_url' => asset('public/user_image/'),
            'image' => $this->image,
            'category_id' => $this->category_id,
            'category_name' => Category::find($this->category_id)->name,
            'blood_group' => $this->blood_group,
            'user_type_id' => $this->user_type_id,
            'user_type' => UserType::find($this->user_type_id)->name,
            'email' => $this->email,
            'session_name'=> Session::find($this->session_id)->name ?? null,
            'course_id' => $this->course_id,
            'course_name' => (Course::find($this->course_id))->course_name ?? null,
            'semester_id' => $this->semester_id,
            'semester' => Semester::find($this->semester_id)->name ?? null,
            'abc_id' => $this->abc_id,
            'current_semester_id' => $this->current_semester_id,
            'current_semester' => Semester::find($this->current_semester_id)->name ?? null,
            'session_id' => $this->session_id,
            'aadhaar_card_file' => $this->aadhaar_card_proof != null ? asset("aadhaar_card_proof/{$this->aadhaar_card_proof}") : null,
            'admission_slip_file' => $this->admission_slip != null ? asset("admission_slip/{$this->admission_slip}") : null,
            'dob_proof_file' => $this->dob_proof != null ? asset("dob_proof/{$this->dob_proof}") : null,
            'registration_proof' => $this->registration_proof != null ? asset("registration_proof/{$this->registration_proof}") : null,
            'blood_group_proof' => $this->blood_group_proof != null ? asset("blood_group_proof/{$this->blood_group_proof}") : null,
//            'aadhaar_card_file' => $this->aadhaar_card_proof,
            'session' => Session::find($this->session_id)->name ?? null,
            'admission_date' => $this->admission_date,
            'father_name' => $this->father_name ?? null,
            'father_occupation' => $this->father_occupation,
            'father_phone' => $this->father_phone,
            'mother_name' => $this->mother_name,
            'mother_occupation' => $this->mother_occupation,
            'guardian_name' => $this->guardian_name,
            'guardian_email' => $this->guardian_email,
            'admission_status' => $this->admission_status,
            'material_status' => $this->material_status,
            'emergency_phone_number' => $this->emergency_phone_number,
            'current_address' => $this->current_address,
            'permanent_address' => $this->permanent_address,
            'mother_phone' => $this->mother_phone,
            'guardian_relation' => $this->guardian_relation,
            'guardian_occupation' => $this->guardian_occupation,
            'guardian_phone' => $this->guardian_phone,
            'guardian_address' => $this->guardian_address,
            'agent_id' => $this->agent_id,
            'status' => $this->status,
            'franchise_id' => $this->franchise_id,
            'amount' => $this->amount ?? null,
            'payment_date' => $this->payment_date ?? null,
            'mode_of_payment' => $this->mode_of_payment ?? null,
            'transaction_id' => $this->transaction_id ?? null,
            'refund' => $this->refund ?? null,
            'caution_money_id' => $this->caution_money_id ?? null,
            'caution_money_payment_date' => $this->caution_money_payment_date ?? null,
            'caution_money_mode_of_payment' => $this->caution_money_mode_of_payment ?? null,
            'caution_money_transaction_id' => $this->caution_money_transaction_id ?? null,
            'caution_money' => $this->caution_money ?? null,
            'caution_money_deduction' => $this->caution_money_deduction ?? null,
            'refund_mode_of_payment' => $this->refund_mode_of_payment ?? null,
            'refund_transaction_id' => $this->refund_transaction_id ?? null,
            'refunded_amount' => $this->refunded_amount ?? null,
            'refund_payment_date' => $this->refund_payment_date ?? null,
            'caution_money_refund' => $this->caution_money_refund ?? null,
            'roll_no' => (Registration::whereStudentId($this->id)->first())?(Registration::whereStudentId($this->id)->first())->roll_no : null,
            'registration_no' => (Registration::whereStudentId($this->id)->first())?(Registration::whereStudentId($this->id)->first())->registration_no : null,
        ];
    }
}
