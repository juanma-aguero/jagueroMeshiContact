<?php

namespace Jaguero\MeshiContactBundle\Entity;


class ContactFormData
{

    private $yourName;

    private $yourEmail;

    private $subject;

    private $yourMessage;

    /**
     * @return mixed
     */
    public function getYourName()
    {
        return $this->yourName;
    }

    /**
     * @param mixed $yourName
     */
    public function setYourName($yourName)
    {
        $this->yourName = $yourName;
    }

    /**
     * @return mixed
     */
    public function getYourEmail()
    {
        return $this->yourEmail;
    }

    /**
     * @param mixed $yourEmail
     */
    public function setYourEmail($yourEmail)
    {
        $this->yourEmail = $yourEmail;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getYourMessage()
    {
        return $this->yourMessage;
    }

    /**
     * @param mixed $yourMessage
     */
    public function setYourMessage($yourMessage)
    {
        $this->yourMessage = $yourMessage;
    }


}