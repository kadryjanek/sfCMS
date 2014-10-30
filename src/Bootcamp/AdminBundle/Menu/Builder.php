<?php

namespace Bootcamp\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Strona główna', [
            'uri' => '#'
        ]);
        $menu->addChild('Poczekalnia', [
            'uri' => '#'
        ]);
        $menu->addChild('Top', [
            'uri' => '#'
        ]);
        $menu->addChild('Losuj', [
            'uri' => '#'
        ]);
        
        return $menu;
    }
    
    public function userMenuAuthenticated(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');
    
        $menu->addChild('User', ['uri' => '#'])
            ->setAttribute('class', 'dropdown')
            ->setLinkAttribute('class', 'dropdown-toggle')
            ->setLinkAttribute('data-toggle', 'dropdown')
            ->setChildrenAttribute('class', 'dropdown-menu');
        
        $menu['User']->addChild('Wyloguj', array('route' => 'fos_user_security_logout'));
    
        return $menu;
    }
    
}