<?php
namespace Netlogix\JsonApiOrg\ExampleData\Controller;

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
 * @Flow\Scope("singleton")
 */
class NodeController extends \Netlogix\JsonApiOrg\Controller\ApiController {

	/**
	 * @var \Netlogix\JsonApiOrg\ExampleData\Domain\Repository\NodeRepository
	 * @Flow\Inject
	 */
	protected $nodeRepository;

	/**
	 * Name of the action method argument which acts as the resource for the
	 * RESTful controller. If an argument with the specified name is passed
	 * to the controller, the show, update and delete actions can be triggered
	 * automatically.
	 *
	 * @var string
	 */
	protected $resourceArgumentName = 'node';

	/**
	 *
	 */
	public function demoAction() {

	}

	/**
	 * This action os only to be called internally, showing as subrequest
	 * showing a single Resource object not being wrapped by a TopLevel object.
	 *
	 * @param \Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node
	 */
	public function showUnwrappedAction(\Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node) {
		$this->view->assign('value', $node);
	}

	/**
	 * This action shows all existing nodes in no particular order.
	 * Since nodes is a tree structure, only showing those with no parent
	 * by default might be the desired behavior but for the sake of providing
	 * an example for default API features all nodes are returned.
	 */
	public function listAction() {

		$all = $this->nodeRepository->findAll();
		$topLevel = $this->relationshipIterator->createTopLevel($all);

		$this->view->assign('value', $topLevel);
	}

	/**
	 * @param \Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node
	 */
	public function createAction(\Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node) {

		$this->nodeRepository->add($node->getPayload());

		$this->response->setStatus(201);
		$this->response->setHeader('Content-Location', $node->getLinks()['self']);

		$this->forward('show', NULL, NULL, array('node' => $node->getPayload()));
	}

	/**
	 * @param \Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node
	 * @param string $relationshipName
	 */
	public function createRelationshipAction(\Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node, $relationshipName) {
		// TODO: Implement
	}

	/**
	 *
	 * @param \Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node $node
	 */
	public function showAction(\Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node) {

		$topLevel = $this->relationshipIterator->createTopLevel($node->getPayload());

		$this->view->assign('value', $topLevel);
	}

	/**
	 * Returns the "self" object of the relationship.
	 *
	 * @param \Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node
	 * @param string $relationshipName
	 */
	public function showRelationshipAction(\Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node, $relationshipName) {

		$relationship = \TYPO3\Flow\Reflection\ObjectAccess::getProperty($node->getRelationships(), $relationshipName);

		$this->view->assign('value', $relationship);
	}

	/**
	 * Returns the "self" object of the relationship.
	 *
	 * @param \Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node,
	 * @param string $relationshipName
	 */
	public function showRelatedAction(\Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource $node, $relationshipName) {

		$relationship = \TYPO3\Flow\Reflection\ObjectAccess::getPropertyPath($node, $relationshipName);
		$topLevel = $this->relationshipIterator->createTopLevel($relationship);

		$this->view->assign('value', $topLevel);
	}

	/**
	 * @param \Netlogix\JsonApiOrg\Schema\Resource $node
	 */
	public function updateAction(\Netlogix\JsonApiOrg\Schema\Resource $node) {
		// TODO: Implement
	}

	/**
	 * @param \Netlogix\JsonApiOrg\Schema\Resource $node
	 * @param string $relationshipName
	 */
	public function updateRelationshipAction(\Netlogix\JsonApiOrg\Schema\Resource $node, $relationshipName) {
		// TODO: Implement
	}

	/**
	 * @param \Netlogix\JsonApiOrg\Schema\Resource $node
	 */
	public function deleteAction(\Netlogix\JsonApiOrg\Schema\Resource $node) {
		// TODO: Implement
	}

	/**
	 * @param \Netlogix\JsonApiOrg\Schema\Resource $node
	 * @param string $relationshipName
	 */
	public function deleteRelationshipAction(\Netlogix\JsonApiOrg\Schema\Resource $node, $relationshipName) {
		// TODO: Implement
	}

}