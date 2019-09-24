<?php

namespace App\Entity;
use Captcha\Bundle\CaptchaBundle\Validator\Constraints as CaptchaAssert;



class Contact 
{
    private $name;

/**
 * Getter for Name
 *
 * @return [type]
 */
public function getName()
{
    return $this->name;
}

/**
 * Setter for Name
 * @var [type] name
 *
 * @return self
 */
public function setName($name)
{
    $this->name = $name;
    return $this;
}

    private $prenom;

    private $adresse;
    
    private $postalcode;

    private $ville;

    private $birthday;
    

    private $email;

/**
 * Getter for Email
 *
 * @return [type]
 */
public function getEmail()
{
    return $this->email;
}

/**
 * Setter for Email
 * @var [type] email
 *
 * @return self
 */
public function setEmail($email)
{
    $this->email = $email;
    return $this;
}


    private $phone;

/**
 * Getter for Phone
 *
 * @return [type]
 */
public function getPhone()
{
    return $this->phone;
}

/**
 * Setter for Phone
 * @var [type] phone
 *
 * @return self
 */
public function setPhone($phone)
{
    $this->phone = $phone;
    return $this;
}


    private $message;

/**
 * Getter for Message
 *
 * @return [type]
 */
public function getMessage()
{
    return $this->message;
}

/**
 * Setter for Message
 * @var [type] message
 *
 * @return self
 */
public function setMessage($message)
{
    $this->message = $message;
    return $this;
}


 

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of postalcode
     */ 
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set the value of postalcode
     *
     * @return  self
     */ 
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

     /**
   * @CaptchaAssert\ValidCaptcha(
   *      message = "CAPTCHA validation failed, try again."
   * )
   */
  private $captchaCode;
  /**
   * Get message = "CAPTCHA validation failed, try again."
   */ 
  public function getCaptchaCode()
  {
    return $this->captchaCode;
  }

  /**
   * Set message = "CAPTCHA validation failed, try again."
   *
   * @return  self
   */ 
  public function setCaptchaCode($captchaCode)
  {
    $this->captchaCode = $captchaCode;

    return $this;
  }


}