<?php

namespace BlogBundle\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\PostRepository")
 * @ORM\Table(name="posts")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Название поста
     *
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * Тело поста
     *
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * Статус поста
     *
     * @ORM\Column(type="boolean")
     */
    protected $status;

    /**
     * Дата и время создания поста
     *
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    public function __construct()
    {
        $this->setCreatedAt(Carbon::now());
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Post
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Post
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return Carbon::instance($this->created_at);
    }
}
