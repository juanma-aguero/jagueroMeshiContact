<?php

namespace Jaguero\MeshiContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactForm
 *
 * @ORM\Table(name="meshi_contact_form")
 * @ORM\Entity(repositoryClass="Jaguero\MeshiContactBundle\Repository\ContactFormRepository")
 */
class ContactForm
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="yourName", type="string", length=255, nullable=true)
     */
    private $yourName;

    /**
     * @var string
     *
     * @ORM\Column(name="yourEmail", type="string", length=255, nullable=true)
     */
    private $yourEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=true)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="yourMessage", type="text", nullable=true)
     */
    private $yourMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="redirect_url", type="string", length=255, nullable=true)
     */
    private $redirectUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="to_email", type="string", length=255)
     */
    private $toEmail;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ContactForm
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set yourName
     *
     * @param string $yourName
     *
     * @return ContactForm
     */
    public function setYourName($yourName)
    {
        $this->yourName = $yourName;

        return $this;
    }

    /**
     * Get yourName
     *
     * @return string
     */
    public function getYourName()
    {
        return $this->yourName;
    }

    /**
     * Set yourEmail
     *
     * @param string $yourEmail
     *
     * @return ContactForm
     */
    public function setYourEmail($yourEmail)
    {
        $this->yourEmail = $yourEmail;

        return $this;
    }

    /**
     * Get yourEmail
     *
     * @return string
     */
    public function getYourEmail()
    {
        return $this->yourEmail;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return ContactForm
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set yourMessage
     *
     * @param string $yourMessage
     *
     * @return ContactForm
     */
    public function setYourMessage($yourMessage)
    {
        $this->yourMessage = $yourMessage;

        return $this;
    }

    /**
     * Get yourMessage
     *
     * @return string
     */
    public function getYourMessage()
    {
        return $this->yourMessage;
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param string $redirectUrl
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * @return string
     */
    public function getToEmail()
    {
        return $this->toEmail;
    }

    /**
     * @param string $toEmail
     */
    public function setToEmail($toEmail)
    {
        $this->toEmail = $toEmail;
    }


}

