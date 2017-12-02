<?php
/**
 * Created by PhpStorm.
 * Admin: gustavo
 * Date: 02/12/17
 * Time: 08:50
 */

namespace Entity;


class HistoricalBorrowers
{
        protected $historicalBorrowerID;
        protected $name;
        protected $memberID;
        protected $date;
        protected $bookID;
        protected $title;
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
    public function getHistoricalBorrowerID()
    {
        return $this->historicalBorrowerID;
    }

    /**
     * @param mixed $historicalBorrowerID
     */
    public function setHistoricalBorrowerID($historicalBorrowerID)
    {
        $this->historicalBorrowerID = $historicalBorrowerID;
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
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getBookID()
    {
        return $this->bookID;
    }

    /**
     * @param mixed $bookID
     */
    public function setBookID($bookID)
    {
        $this->bookID = $bookID;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}