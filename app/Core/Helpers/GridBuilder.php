<?php declare(strict_types = 1);

namespace App\Core\Helpers;

use App\Core\ConstGroups\RegisterCompanyFormConstGroup as ConstGroup;
use Ublaboo\DataGrid\DataGrid;

class GridBuilder
{
    /**
     * Assembles fields for datagrid used to display the result of a company registration into the provided datagrid instance
     * @param DataGrid $grid
     * @param bool $withoutPagination
     * @return DataGrid
     */
    public function assembleCompanyRegistrationFields(DataGrid $grid, bool $withoutPagination = true): DataGrid
    {
        $grid->addColumnText(ConstGroup::FORM_FIELD_COMPANY_NAME, "Nazev spolecnosti:");
        $grid->addColumnText(ConstGroup::FORM_FIELD_ADDRESS, "Adresa spolecnosti");
        $grid->addColumnText(ConstGroup::FORM_FIELD_ICO, "ICO:");
        $grid->addColumnText(ConstGroup::FORM_FIELD_VAT, "DIC:");
        $grid->addColumnText(ConstGroup::FORM_FIELD_STATUTORY_REPRESENTATIVE_FULL_NAME, "Jmeno statutarniho zastupce:");

        $withoutPagination && $grid->setPagination(false);

        return $grid;
    }
}