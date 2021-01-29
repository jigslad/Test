<?php

namespace App\Form;

use App\Entity\Persons;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
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
            ->add('organization')
            ->add('designation')
            ->add('countryid',ChoiceType::class)
            ->add('state')
            ->add('city')
            ->add('zipcode')
            ->add('photoName', FileType::class, array(
                'data_class'=>null,
                'attr' => array(
                    'accept' => 'image/*',
                )
            ))
            ->add('photoContent',HiddenType::class)
            ->add('isSelfEmp', ChoiceType::class, array(
                'choices' => array('Yes' => 1, 'No' => 0),
                'expanded' => true,
            ))
            ->add('gender', ChoiceType::class, array(
                'choices' => array('Male' => 'M', 'Female' => 'F'),
                'expanded' => true,
            ))
            ->add('doj')
            ->add('contacts');
//            ->add('contacts',CollectionType::class,[
//                'entry_type' => ContactsType::class,
//                'allow_add' => true,
//                'allow_delete' => true,
//                'allow_extra_fields' => true
//            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Persons::class,
        ]);
    }
}
