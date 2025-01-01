<?php

namespace App\Controller\Admin;

use App\Entity\Vente;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vente::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('article'),
            MoneyField::new('totalHt')->setCurrency('TND'),
            MoneyField::new('totalTtc')->setCurrency('TND'),
            DateField::new('dateVente')->setValue(new \DateTime('now')),
            AssociationField::new('createdBy'),
        ];
    }
    
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('createdBy'));
    }
    //pour la vente: taxe, gratuité et remise (sur 1 ou plusieurs articles ou sur toute la vente)
    //stocker les achats des fournisseurs
    
}
