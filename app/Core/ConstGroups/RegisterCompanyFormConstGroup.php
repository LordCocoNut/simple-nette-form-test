<?php declare(strict_types = 1);

namespace App\Core\ConstGroups;

/**
 * Simple set of const related to register company form
 */
class RegisterCompanyFormConstGroup
{
    public const FORM_FIELD_ADDRESS = "address";
    public const FORM_FIELD_COMPANY_NAME = "company_name";
    public const FORM_FIELD_ICO = "ico";
    public const FORM_FIELD_VAT = "vat";
    public const FORM_FIELD_STATUTORY_REPRESENTATIVE_FULL_NAME = "statutory_representative_full_name";

    //TODO: email of statutory representative was not found in ARES swagger doc. Its possible that it cant be downloaded from there
    public const FORM_FIELD_STATUTORY_REPRESENTATIVE_MAIL = "statutory_representative_email";
}