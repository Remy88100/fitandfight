<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Cocur\Slugify\Slugify;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActiviteRepository")
 * @Vich\Uploadable()
 * @UniqueEntity("Title")
 */
class Activite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=600)
     */
    private $Filename;

    /**
 * @var File|null
 * @Assert\Image(
 *      mimeTypes="image/jpeg")
 * @Vich\UploadableField(mapping="activite_image",fileNameProperty="Filename")
 */   
private $imageFile;

/**
 * @ORM\Column(type="datetime")
 */
private $updated_at;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
       return (new Slugify())->slugify($this->getTitle());
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->Filename;
    }

    public function setFilename( $Filename): Activite
    {
        $this->Filename = $Filename;

        return $this;
    }

    public function getImageFile(): ?File
{
    return $this->imageFile;
}

    public function setImageFile(File $imageFile): self
{
    $this->imageFile = $imageFile;
    if ($this->imageFile instanceof UploadedFile) {
        $this->updated_at = new \DateTime('now');
    }
    return $this;

}
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of Description
     */ 
    public function getDescription(): ?string
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     *
     * @return  self
     */ 
    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }
}
