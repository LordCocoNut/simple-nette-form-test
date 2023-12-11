<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Core\Components\RegistrationResultDataGridControll;
use App\Core\Helpers\{FormBuilder, GridBuilder};
use Nette;
use Ublaboo\DataGrid\DataGrid;


final class HomePresenter extends Nette\Application\UI\Presenter
{

    private $assembleCompanyRegistrationFields;

    public function __construct(private FormBuilder $formBuilder, private GridBuilder $gridBuilder)
    {
    }

    public function renderDefault()
    {
        $this->template->data = [];
        $this->addComponent(new RegistrationResultDataGridControll($this->gridBuilder), 'resultGrid');
    }

    public function createComponentCompanyRegistrationForm(): Nette\Application\UI\Form
    {
        $this->assembleCompanyRegistrationFields = $this->formBuilder->assembleCompanyRegistrationFields(new Nette\Application\UI\Form());
        $form = $this->assembleCompanyRegistrationFields;

        $form->onSuccess[] = function (Nette\Application\UI\Form $form, Nette\Utils\ArrayHash $data) {
            //Parse hash to datagrid friendly data
            $this->template->resultData = [(array)$data];
        };
        return $form;
    }


}
