<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('lastLogin')
            ->add('roles')
            ->add('id')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username', null, [
                'label' => 'Логин'
            ])
            ->add('email', null, [
                'label' => 'E-mail'
            ])
            ->add('enabled', null, [
                'label'=>'Включено'
            ])
            ->add('lastLogin', null, [
                'label'=>'Визит'
            ])
            ->add('roles', null, [
                'label'=>'Роль'
            ])
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
                'label'=>'Действие'
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username',TextType::class,[
                'label' => 'Логин'
            ])
            ->add('email',EmailType::class,[
                'label' => 'E-mail'
            ])
            ->add('enabled',CheckboxType::class,[
                'label'=>'Включено'
            ])
            ->add('password',PasswordType::class, [
                'label' => 'Пароль'
            ])
            ->add('roles',null,[
                'label' => 'Роль'
            ])
            ->add('avatarFile',FileType::class, [
                'label' => 'Аватар'
            ])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('roles')
            ->add('avatarFile', null, array('template' => 'AppBundle:Admin:list_image.html.twig'))
        ;
    }
}
