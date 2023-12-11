<?php declare(strict_types = 1);

namespace App\Core\Helpers;

use App\Core\ConstGroups\RegisterCompanyFormConstGroup as ConstGroup;
use Nette\Application\UI\Form;

class FormBuilder
{
    /**
     * Assembles fields related to the company registration into a provided form
     * @param Form $formInstance
     * @param bool $addSubmit
     * @return Form
     */
    public function assembleCompanyRegistrationFields(Form $formInstance, bool $addSubmit = true): Form
    {
        //php www/index.php clear-cache

        $requiredFiledText = "Toto pole je povinne.";

        $formInstance->addText(ConstGroup::FORM_FIELD_ICO, "ICO:")->setRequired($requiredFiledText)->addRule(Form::PATTERN, 'Format ICO neni spravne. Melo by se jednat o cislo o 8 znacich.', '^\d{0,8}$');
        $formInstance->addText(ConstGroup::FORM_FIELD_COMPANY_NAME, "Nazev spolecnosti:")->setRequired($requiredFiledText);
        $formInstance->addText(ConstGroup::FORM_FIELD_ADDRESS, "Adresa spolecnosti")->setRequired($requiredFiledText);
        $formInstance->addText(ConstGroup::FORM_FIELD_VAT, "DIC:")->setRequired($requiredFiledText)->addRule(Form::PATTERN, 'Format DIC neni spravne. Melo by se jednat o cislo o 8 znacich s prefixem kodu zeme (cz, sk...).', '^\w{2}\d{8}$');
        $formInstance->addText(ConstGroup::FORM_FIELD_STATUTORY_REPRESENTATIVE_FULL_NAME, "Jmeno statutarniho zastupce:")->setRequired($requiredFiledText);


        $addSubmit && $formInstance->addSubmit('send', 'Registrovat');

        return $formInstance;
    }
}