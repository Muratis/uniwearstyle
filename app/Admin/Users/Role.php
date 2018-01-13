<?php
use App\Role;
use App\Permit;

use SleepingOwl\Admin\Model\ModelConfiguration;
AdminSection::registerModel(Role::class, function (ModelConfiguration $model) {

	$model->setTitle('Роли');
// Display
	$model->onDisplay(function () {
		$display = AdminDisplay::table()->setColumns([
			AdminColumn::text('name')->setLabel('Название роли'),
			AdminColumn::text('slug')->setLabel('Роль'),
		]);
		$display->paginate(15);
		return $display;
	});
// Create And Edit
	$model->onCreateAndEdit(function () {
		$form = AdminForm::panel()->addBody(
			AdminFormElement::text('name', 'Название роли')->required()->unique(),
			AdminFormElement::text('slug', 'Роль')->required()->unique(),
//			AdminColumn::text('slug')->setLabel('Роль')
//			FormItem::multiSelect('categories', 'Categories')->list([1 => 'First', 2 => 'Second', 3 => 'Third'])
//			AdminFormElement::multiselect('permissions', 'permissions')->list([1 => 'First', 2 => 'Second', 3 => 'Third'])
//			AdminFormElement::multiselect('permits', 'Права доступа')->setModelForOptions(new Permit())->setDisplay('name')
			AdminFormElement::multiselect('permits', 'Права доступа')->setModelForOptions(new Permit())->setDisplay('name')
		);
		return $form;
	});
	$model->disableDeleting();

//	$model->onEdit(function () {
//		$form = AdminForm::panel()->addBody(
//			AdminFormElement::text('name', 'Название роли')->required()->unique(),//->setReadOnly(true)
//			AdminFormElement::text('slug', 'Роль')->required()->unique(),//->setReadOnly(true)
//			//AdminFormElement::multiselect('permissions', 'permissions')->setModelForOptions('App\Permit')->setDisplay('name')
//			//AdminFormElement::multiselect('permissions', 'permissi', Role::getPermitsOptions())->setDefaultValue(array(0 => ''))->nullable()
//			AdminFormElement::multiselect('permits', 'Права доступа')->setModelForOptions(new Permit())->setDisplay('name')
//		);
//		return $form;
//	});
//	$model->disableDeleting();
});