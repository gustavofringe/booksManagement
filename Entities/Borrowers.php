<?php
/**
 * Created by PhpStorm.
 * Admin: gustavo
 * Date: 01/12/17
 * Time: 08:55
 */

namespace Entity;


class Borrowers
{
    protected $borrowerID;
    protected $name;
    protected $memberID;
    /**
     * __construct
     * @param mixed $data
     * @return mixed
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    /**
     * hydrate
     * @param mixed $donnees
     * @return mixed
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBorrowerID()
    {
        return $this->borrowerID;
    }

    /**
     * @param mixed $borrowerID
     */
    public function setBorrowerID($borrowerID)
    {
        $this->borrowerID = $borrowerID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMemberID()
    {
        return $this->memberID;
    }

    /**
     * @param mixed $memberID
     */
    public function setMemberID($memberID)
    {
        $this->memberID = $memberID;
        return $this;
    }
}