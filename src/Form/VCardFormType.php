<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class VCardFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, [
                'label' => 'Имя:',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('last_name', TextType::class, [
                'label' => 'Фамилия:',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('tel', TextType::class, [
                'label' => 'Телефон:',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Email:',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('org', TextType::class, [
                'label' => 'Организация:',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('title', TextType::class, [
                'label' => 'Должность:',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('postcode', TextType::class, [
                'label' => false,
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Почтовый индекс'
                ]
            ])
            ->add('country', TextType::class, [
                'label' => false,
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Страна'
                ]
            ])
            ->add('region', TextType::class, [
                'label' => false,
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Регион'
                ]
            ])
            ->add('streetHouseNumber', TextType::class, [
                'label' => false,
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Улица, дом, номер кв. или офиса'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => false,
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Город'
                ]
            ])
            ->add('url', TextType::class, [
                'label' => 'Сайт:',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('bday', DateType::class, [
                'label' => 'Дата рождения:',
                'required' => false,
                'widget' => 'choice',
                'empty_data' => '',
                'years' => range(date('Y'), date('Y') - 100),
            ])
            ->add('note', TextType::class, [
                'label' => 'Комментарий:',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('size', IntegerType::class, [
                'label' => false,
                'required' => false,
                'mapped' => false,
                'row_attr' => [
                    'class' => 'mb-0'
                ],
                'attr' => [
                    'class' => 'mb-0',
                    'min' => 1,
                    'max' => 25,
                    'value' => 5,
                ]
            ])
            ->add('color_bg', ColorType::class, [
                'label' => false,
                'required' => false,
                'mapped' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'value' => '#ffffff',
                ]
            ])
            ->add('color_qr', ColorType::class, [
                'label' => false,
                'required' => false,
                'mapped' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('add', SubmitType::class, [
                'label' => 'Создать QR код',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }
}