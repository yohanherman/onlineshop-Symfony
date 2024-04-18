<?php

namespace App\Controller\Admin;

use App\Entity\Vins;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VinsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vins::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('productName'),
            TextField::new('productArea'),
            TextField::new('flagpath'),
            TextEditorField::new('description'),
            TextField::new('pathproduct'),
            NumberField::new('productprice'),
            NumberField::new('status'),
            TextField::new('cepage'),
            TextField::new('producttageagreement'),
            TextField::new('producttagtaste'),
            NumberField::new('discountPrice'),
            // AssociationField::new()

        ];
    }
}
