<?php
namespace Netlogix\JsonApiOrg\ExampleData\Domain\Model;

/*
 * This file is part of the Netlogix.JsonApiOrg.ExampleData package.
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Entity
 * @ORM\InheritanceType("JOINED")
 */
class Node {

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var Node
	 * @ORM\ManyToOne(inversedBy="children")
	 */
	protected $parent;

	/**
	 * @var \Doctrine\Common\Collections\Collection<Node>
	 * @ORM\OneToMany(orphanRemoval=true, cascade={"all"}, mappedBy="parent")
	 */
	protected $children;

	/**
	 * @var \DateTime
	 */
	protected $creationDate;

	/**
	 * Node constructor.
	 *
	 * @param string $title
	 */
	public function __construct($title = '') {
		$this->children = new \Doctrine\Common\Collections\ArrayCollection();
		$this->title = $title;
		$this->creationDate = new \DateTime();
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return Node
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * @param Node $parent
	 */
	public function setParent($parent) {
		$this->parent = $parent;
		if ($parent !== NULL) {
			$parent->getChildren()->add($this);
		}
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getChildren() {
		return $this->children;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection $children
	 */
	public function setChildren($children) {
		$this->children = $children;
	}

	/**
	 * @return \DateTime
	 */
	public function getCreationDate () {
		return $this->creationDate;
	}

	/**
	 * @param \DateTime $creationDate
	 */
	public function setCreationDate ($creationDate) {
		$this->creationDate = $creationDate;
	}

}