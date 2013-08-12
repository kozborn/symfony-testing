<?php

// src/Blogger/BlogBundle/Entity/Blog.php

namespace Blog\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Blog\BlogBundle\Entity\Repository\ArticleRepository")
 * @ORM\Table(name="blog_articles")
 * @ORM\HasLifecycleCallbacks
 */
class Article {

  public function __construct() {
    $this->setCreated(new \DateTime());
    $this->setUpdated(new \DateTime());
  }

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string")
   */
  protected $title;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $author;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $category;

  /**
   * @ORM\Column(type="text")
   */
  protected $content;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $image;

  /**
   * @ORM\Column(type="text")
   */
  protected $tags;

  /**
   * @ORM\OneToMany(targetEntity="Comment", mappedBy="article")
   */
  protected $comments;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $created;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $updated;

  public function addComment(Comment $comment) {
    $this->comments[] = $comment;
  }

  public function getComments() {
    return $this->comments;
  }

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set title
   *
   * @param string $title
   * @return Article
   */
  public function setTitle($title) {
    $this->title = $title;

    return $this;
  }

  /**
   * Get title
   *
   * @return string 
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Set author
   *
   * @param string $author
   * @return Article
   */
  public function setAuthor($author) {
    $this->author = $author;

    return $this;
  }

  /**
   * Get author
   *
   * @return string 
   */
  public function getAuthor() {
    return $this->author;
  }

  /**
   * Set content
   *
   * @param string $content
   * @return Article
   */
  public function setContent($content) {
    $this->content = $content;

    return $this;
  }

  /**
   * Get content
   *
   * @return string 
   */
  public function getContent($length = null) {
    if ($length > 0)
      return substr($this->content, 0, $length);
    else
      return $this->content;
  }

  /**
   * Set image
   *
   * @param string $image
   * @return Article
   */
  public function setImage($image) {
    $this->image = $image;

    return $this;
  }

  /**
   * Get image
   *
   * @return string 
   */
  public function getImage() {
    return $this->image;
  }

  /**
   * Set tags
   *
   * @param string $tags
   * @return Article
   */
  public function setTags($tags) {
    $this->tags = $tags;

    return $this;
  }

  /**
   * Get tags
   *
   * @return string 
   */
  public function getTags() {
    return $this->tags;
  }

  /**
   * Set created
   *
   * @param \DateTime $created
   * @return Article
   */
  public function setCreated($created) {
    $this->created = $created;

    return $this;
  }

  /**
   * Get created
   *
   * @return \DateTime 
   */
  public function getCreated() {
    return $this->created;
  }

  /**
   * Set updated
   *
   * @param \DateTime $updated
   * @return Article
   */
  public function setUpdated($updated) {
    $this->updated = $updated;

    return $this;
  }

  /**
   * Get updated
   *
   * @return \DateTime 
   */
  public function getUpdated() {
    return $this->updated;
  }

  /**
   * @ORM\PreUpdate
   */
  public function setUpdatedValue() {
    $this->setUpdated(new \DateTime());
  }

  /**
   * Set category
   *
   * @param string $category
   * @return Article
   */
  public function setCategory($category) {
    $this->category = $category;

    return $this;
  }

  /**
   * Get category
   *
   * @return string 
   */
  public function getCategory() {
    return $this->category;
  }

  /**
   * Remove comments
   *
   * @param \Blog\BlogBundle\Entity\Comment $comments
   */
  public function removeComment(\Blog\BlogBundle\Entity\Comment $comments) {
    $this->comments->removeElement($comments);
  }

  public function __toString() {
    return $this->getTitle();
  }

}