<?php

namespace App\Controller\Admin;

use App\Entity\Topics;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TopicsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Topics::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
        //    yield IdField::new('id');
        yield TextField::new('title'),

        // yield SlugField::new('slug')
        //     ->setTargetFieldName('title'),

        yield TextEditorField::new('content'),
            

        yield DateTimeField::new('createdAt')
            ->hideOnForm()

        // yield DateTimeField::new('updateAt')
            // ->hideOnForm();
        ];
    }
    
}
