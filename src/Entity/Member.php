<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MemberRepository")
 */
class Member
{


    const Pack = [
        0 => 'Sport de Combat',
        1 => 'Remise en forme',
    ];


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $postalcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $doctor_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $doctor_adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $doctor_phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emergency_people;

    /**
     * @ORM\Column(type="integer")
     */
    private $emergency_phone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $medical_agreement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $blood_group;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $allergy;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pictures_agreement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pack_choice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostalcode(): ?int
    {
        return $this->postalcode;
    }

    public function setPostalcode(int $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone($phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getDoctorName(): ?string
    {
        return $this->doctor_name;
    }

    public function setDoctorName(string $doctor_name): self
    {
        $this->doctor_name = $doctor_name;

        return $this;
    }

    public function getDoctorAdress(): ?string
    {
        return $this->doctor_adress;
    }

    public function setDoctorAdress(string $doctor_adress): self
    {
        $this->doctor_adress = $doctor_adress;

        return $this;
    }

    public function getDoctorPhone(): ?int
    {
        return $this->doctor_phone;
    }

    public function setDoctorPhone($doctor_phone): self
    {
        $this->doctor_phone = $doctor_phone;

        return $this;
    }

    public function getEmergencyPeople(): ?string
    {
        return $this->emergency_people;
    }

    public function setEmergencyPeople(string $emergency_people): self
    {
        $this->emergency_people = $emergency_people;

        return $this;
    }

    public function getEmergencyPhone(): ?int
    {
        return $this->emergency_phone;
    }

    public function setEmergencyPhone($emergency_phone): self
    {
        $this->emergency_phone = $emergency_phone;

        return $this;
    }

    public function getMedicalAgreement(): ?bool
    {
        return $this->medical_agreement;
    }

    public function setMedicalAgreement(bool $medical_agreement): self
    {
        $this->medical_agreement = $medical_agreement;

        return $this;
    }

    public function getBloodGroup(): ?string
    {
        return $this->blood_group;
    }

    public function setBloodGroup(string $blood_group): self
    {
        $this->blood_group = $blood_group;

        return $this;
    }

    public function getAllergy(): ?string
    {
        return $this->allergy;
    }

    public function setAllergy(string $allergy): self
    {
        $this->allergy = $allergy;

        return $this;
    }

    public function getPicturesAgreement(): ?bool
    {
        return $this->pictures_agreement;
    }

    public function setPicturesAgreement(bool $pictures_agreement): self
    {
        $this->pictures_agreement = $pictures_agreement;

        return $this;
    }

    public function getPackChoice(): ?bool
    {
        return $this->pack_choice;
    }

    public function setPackChoice(bool $pack_choice): self
    {
        $this->pack_choice = $pack_choice;

        return $this;
    }
}
