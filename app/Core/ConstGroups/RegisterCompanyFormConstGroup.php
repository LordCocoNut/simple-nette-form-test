<?php

namespace App\Core\ConstGroups;

/**
 * Simple set of const related to register company form
 */
class RegisterCompanyFormConstGroup
{
    const FORM_FIELD_ADDRESS = "address";
    const FORM_FIELD_COMPANY_NAME = "company_name";
    const FORM_FIELD_ICO = "ico";
    const FORM_FIELD_VAT = "vat";
    const FORM_FIELD_STATUTORY_REPRESENTATIVE_FULL_NAME = "statutory_representative_full_name";

    //TODO: email of statutory representative was not found in ARES swagger doc. Its possible that it cant be downloaded from there
    const FORM_FIELD_STATUTORY_REPRESENTATIVE_MAIL = "statutory_representative_email";
}