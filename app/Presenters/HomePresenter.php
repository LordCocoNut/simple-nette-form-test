<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Core\Helpers\FormBuilder;
use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{

    public function __construct(private FormBuilder $formBuilder)
    {

    }


    public function createComponentCompanyRegistrationForm(): Nette\Application\UI\Form
    {
        $form = $this->formBuilder->assembleCompanyRegistrationFields(new Nette\Application\UI\Form());
        $form->onSuccess[] = [$this, 'registerCompanyResult'];
        return $form;
    }

    public function registerCompanyResult(Nette\Application\UI\Form $form, $data): void
    {
        $this->flashMessage('Spolecnost registrována.');
        $this->redirect('Home:');
    }
}
