<?php

namespace App\Form;

use App\Entity\Prestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', type: TextType::class, options: [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Nom"
                ]])
            ->add('extrait', type: TextType::class, options: [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Extrait"
                ]])
            ->add('description', type: TextareaType::class, options: [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Description"
                ]])
            ->add('remuneration', type: NumberType::class, options: [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Rémunération"
                ]])
            ->add('dateDeCreation', type: TextType::class, options: [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "j-m-A"
                ]])
            ->add('numero', type: TextType::class, options: [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Numéro"
                ]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestation::class,
        ]);
    }
}
