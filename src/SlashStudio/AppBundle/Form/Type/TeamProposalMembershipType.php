<?php

namespace SlashStudio\AppBundle\Form\Type;

use libphonenumber\PhoneNumberFormat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TeamProposalMembershipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options = [])
    {
        $builder
            ->add('name', null, ['label' => 'form.name'])
            ->add('surname', null, ['label' => 'form.surname'])
            ->add('phone', 'tel', [
                'label' => 'form.phone',
                'default_region' => 'RU',
                'format' => PhoneNumberFormat::NATIONAL,
            ])
            ->add('email', 'email', ['label' => 'form.email',])
            ->add('send', 'submit', ['label' => 'form.send']);
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SlashStudio\AppBundle\Entity\TeamProposalMembership',
            'translation_domain' => 'form_proposals'
        ));
    }

    public function getName()
    {
        return 'team_proposal_membership';
    }
}