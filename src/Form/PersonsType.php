<?php

namespace App\Form;

use App\Entity\Persons;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
            ->add('countryid')
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
            ->add('doj');
        $builder->add('contacts', HiddenType::class);
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $user = $event->getData();
            $form = $event->getForm();
            dump($user);
//            exit();
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Persons::class,
        ]);
    }
}
