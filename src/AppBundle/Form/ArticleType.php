<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ArticleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array(
            'attr' => array(
                'placeholder' => 'Your title'
            )
        ))
            ->add('headerImage', FileType::class, array(
            'label' => 'Upload the header file'
        ))
            ->add('author')
            ->add('content');
    }
}