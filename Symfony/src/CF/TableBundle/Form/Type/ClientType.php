<?php

namespace TableBundle\Form\Type\ClientType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder->add('name', 'name');
		$builder->add('firstName', 'firstName');
		$builder->add('address', 'address');
		$builder->add('zipCode', 'zipCode');
		$builder->add('tel', 'tel');
		$builder->add('email', 'email');
        $builder->add('points', 'points');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TableBundle\Entity\Clients'
        ));
    }

    public function getName()
    {
        return 'clients';
    }
}

?>