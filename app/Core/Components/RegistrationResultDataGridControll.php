<?php declare(strict_types = 1);

namespace App\Core\Components;

use App\Core\Helpers\GridBuilder;
use Nette\Application\UI\Control;
use Ublaboo\DataGrid\DataGrid;

/**
 * Comonent used to render table of the company registration results
 */
class RegistrationResultDataGridControll extends Control
{
    public function __construct(private GridBuilder $gridBuilder)
    {

    }

    /**
     * @param array<array{'company_name': string, address:string, company_name: string, ico: string, vat: string, statutory_representative_full_name: string}> $data
     * @return void
     */
    public function render(array $data = [])
    {
        $grid = $this->gridBuilder->assembleCompanyRegistrationFields(new DataGrid());
        $grid->setDataSource($data);

        $this->addComponent($grid, 'theGrid');
        $this->template->render(__DIR__ . '/templates/register_result_datagrid.latte');
    }
}