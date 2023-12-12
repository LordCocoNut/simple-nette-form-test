<?php declare(strict_types = 1);

namespace App\Presenters;

use App\Core\Components\RegistrationResultDataGridControll;
use App\Core\Helpers\FormBuilder;
use App\Core\Helpers\GridBuilder;
use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    public function __construct(private FormBuilder $formBuilder, private GridBuilder $gridBuilder)
    {
    }

    public function renderDefault()
    {
        $this->addComponent(new RegistrationResultDataGridControll($this->gridBuilder), 'resultGrid');
    }

    public function createComponentCompanyRegistrationForm(): Nette\Application\UI\Form
    {
        $form = $this->formBuilder->assembleCompanyRegistrationFields(new Nette\Application\UI\Form());

        $form->onSuccess[] = function (Nette\Application\UI\Form $form, Nette\Utils\ArrayHash $data) {
            //Parse hash to datagrid friendly data
            $this->template->resultData = [(array) $data];
        };

        return $form;
    }
}
