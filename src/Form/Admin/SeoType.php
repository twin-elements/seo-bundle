<?php

namespace TwinElements\SeoBundle\Form\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TwinElements\FormExtensions\Type\ToggleChoiceType;
use TwinElements\SeoBundle\Entity\Seo;

class SeoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
                'label' => 'te_seo.title'
            ])
            ->add('description', TextareaType::class, [
                'required' => true,
                'label' => 'te_seo.description',
                'attr' => [
                    'rows' => 3
                ]
            ])
            ->add('keywords', TextareaType::class, [
                'required' => false,
                'label' => 'te_seo.keywords',
                'attr' => [
                    'rows' => 2
                ]
            ])
            ->add('noIndex', ToggleChoiceType::class,[
                'label' => 'No index',
                'help' => 'te_seo.no_index_help',
                'empty_data' => 0,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Seo::class,
            'label' => 'te_seo.bundle_name',
            'translation_domain' => 'messages',
            'block_name' => 'seo_type1',
            'block_prefix' => 'seo_type2'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'seo_type';
    }
}
