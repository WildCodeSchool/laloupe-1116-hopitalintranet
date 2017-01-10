<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new HopitalBundle\HopitalBundle(),
            new Vl\AgendaBundle\VlAgendaBundle(),
            new Vl\AnnonceBundle\VlAnnonceBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            // Assetic Bundle
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            // FOSUser Bundle
            new FOS\UserBundle\FOSUserBundle(),

            // Sonata Admin Bundle
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),

            // Sonata Admin Bundle Requirements
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),

            // Sonata EasyExtends
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),

            // Sonata User Bundle
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),

            new Sacha\Application\Sonata\UserBundle\ApplicationSonataUserBundle(),
            new Sacha\Application\Sonata\AdminBundle\ApplicationSonataAdminBundle(),

            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new Sacha\InfoMailBundle\InfoMailBundle(),
            new Sacha\IuchBundle\IuchBundle()


        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }




}
