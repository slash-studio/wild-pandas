<?php

namespace SlashStudio\AppBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class SlideAdmin extends BaseAdmin
{
    protected $translationDomain = 'admin_content';

    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'position',
    ];

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('translations', 'a2lix_translations', [
                        'fields' => [
                            'title' => [
                                'label' => 'show.label_title',
                                'translation_domain' => $this->translationDomain,
                            ],
                            'subtitle' => [
                                'label' => 'show.label_subtitle',
                                'translation_domain' => $this->translationDomain,
                            ],
                        ],
                    ])
                   ->add('position', 'number')
                   ->add('image', 'sonata_media_type', ['required' => false, 'provider' => 'sonata.media.provider.image', 'context' => 'sliders'])
                   ->end();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title', 'text', ['route' => ['name' => 'show']])
                   ->add('subtitle')
                   ->add('position', 'number');
        parent::configureListFields($listMapper);
    }


    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper->add('title')->add('subtitle')->add('position', 'number');
    }
}
