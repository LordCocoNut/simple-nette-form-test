<?php

namespace App\Core\Helpers;

use App\Core\ConstGroups\RegisterCompanyFormConstGroup as ConstGroup;
use Nette\Application\UI\Form;

class FormBuilder
{
    public function assembleCompanyRegistrationFields(Form $formInstance, bool $addSubmit = true): Form
    {
        //php www/index.php clear-cache

        $requiredFiledText = "Toto pole je povinne.";

        $formInstance->addText(ConstGroup::FORM_FIELD_COMPANY_NAME, "Nazev spolecnosti:")->setRequired($requiredFiledText);
        $formInstance->addText(ConstGroup::FORM_FIELD_ADDRESS, "Adresa spolecnosti")->setRequired($requiredFiledText);
        $formInstance->addText(ConstGroup::FORM_FIELD_ICO, "ICO:")->setRequired($requiredFiledText);
        $formInstance->addText(ConstGroup::FORM_FIELD_VAT, "DIC:")->setRequired($requiredFiledText);
        $formInstance->addText(ConstGroup::FORM_FIELD_STATUTORY_REPRESENTATIVE_FULL_NAME, "Jmeno statutarniho zastupce:")->setRequired($requiredFiledText);


        $addSubmit && $formInstance->addSubmit('send', 'Registrovat');
        return $formInstance;
    }
}