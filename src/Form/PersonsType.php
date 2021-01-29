<?php

namespace App\Form;

use App\Entity\Persons;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('dob')
            ->add('gender')
            ->add('organization')
            ->add('designation')
            ->add('countryid')
            ->add('state')
            ->add('city')
            ->add('zipcode')
            ->add('photoName', FileType::class, array(
                'attr' => array(
                    'accept' => 'image/*',
                    'multiple' => 'multiple'
                )
            ))
            ->add('photoContent',HiddenType::class)
            ->add('isSelfEmp')
            ->add('doj')
            ->add('contacts',CollectionType::class,[
                'entry_type' => ContactsType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'allow_extra_fields' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Persons::class,
        ]);
    }
}
