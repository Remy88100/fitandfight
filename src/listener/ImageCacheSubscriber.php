<?php

namespace App\listener;

use App\Entity\Activite;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class ImageCacheSubscriber implements EventSubscriber
{

    private $CacheManager;

    private $UpLoaderHelper;

    public function __construct(CacheManager $CacheManager,UploaderHelper $UpLoaderHelper)
    {
        $this->CacheManager = $CacheManager;
        $this->UpLoaderHelper = $UpLoaderHelper;
    }

    public function getSubscribedEvents()
    {
        return [
            'preRemove',
            'preUpdate'
        ];
    }

    public function preRemove( LifecycleEventArgs $args){
        $entity= $args->getEntity();
        if (!$entity instanceof Activite){
            return;
        }
        $this->CacheManager->remove($this->UpLoaderHelper->asset($entity, 'imageFile'));
    }

    public function preUpdate( PreUpdateEventArgs $args){
        $entity= $args->getEntity();
        if (!$entity instanceof Activite){
            return;
        }
        if ($entity->getImageFile() instanceof UploadedFile){
            $this->CacheManager->remove($this->UpLoaderHelper->asset($entity, 'imageFile'));
        }
    }
}