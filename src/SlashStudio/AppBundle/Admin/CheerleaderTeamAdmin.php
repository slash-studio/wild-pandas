<?php

namespace SlashStudio\AppBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class CheerleaderTeamAdmin extends BaseAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('General')
                       ->add('name')
                       ->add('description', 'textarea')
                       ->add('image', 'sonata_type_model_list', ['required' => false,], ['link_parameters' => ['context' => 'team']])
                    ->end();

                   //  ->with('Achievements')
                   //     ->add(
                   //          'achievements',
                   //          'sonata_type_collection',
                   //          ['by_reference' => false, 'label' => false],
                   //          [ 'edit' => 'inline', 'inline' => 'table']
                   //      )
                   // ->end()
                   // ->with('Contacts', array('collapsed' => true))
                   //     ->add('captain', 'sonata_type_model_list', ['btn_add' => false, 'required' => false])
                   //     ->add('managerName', 'text', ['required' => false])
                   //     ->add('managerPhone', 'text', ['required' => false])
                   //     ->add('managerEmail', 'text', ['required' => false])
                   //  ->end();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name', 'text', ['route' => ['name' => 'show']])
                   ->add('description', 'textarea');
        parent::configureListFields($listMapper);
    }


    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper->with('General')
                       ->add('name')
                       ->add('description', 'textarea')
                   ->end();
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['show', 'list', 'edit']);
    }

}
