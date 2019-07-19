<?php 

namespace App\Traits;

use App\Invoice;
use Auth;
use App\Loan;
use App\Institution;

trait InstitutionTrait
{

    public function getUserInstitution()
    {
        // Get user institution
        $institution = Institution::where('id', Auth::user()->institution_id)->with('principal_disbursed','premium_due')->withCount('uninsured_loans')->first();

        return $institution;
    }
    public function getIraInstitution()
    {
        // Get user institution
        $institution = Institution::where('id', Auth::user()->institution_id)->with('principal_disbursed','premium_due')->withCount('uninsured_loans')->first();

        return $institution;
    }
    public function getUnderwriterInstitution()
    {
        // Get user institution
        $institution = Institution::where('id', Auth::user()->institution_id)->with('products.policies','premium_paid')->withCount('underwriter_policies','underwriter_claims')->first();

        return $institution;
    }
    public function getInstitutionInstitution()
    {
        // Get user institution
        $institution = Institution::where('id', Auth::user()->institution_id)->with('principal_disbursed','premium_due')->withCount('uninsured_loans')->first();

        return $institution;
    }
}