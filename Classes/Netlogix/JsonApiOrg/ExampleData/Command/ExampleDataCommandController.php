<?php
namespace Netlogix\JsonApiOrg\ExampleData\Command;

/*
 * This file is part of the Netlogix.JsonApiOrg.ExampleData package.
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use Netlogix\JsonApiOrg\ExampleData\Domain\Model\Node;

/**
 * @Flow\Scope("singleton")
 */
class ExampleDataCommandController extends \TYPO3\Flow\Cli\CommandController {

	/**
	 * @var \Netlogix\JsonApiOrg\ExampleData\Domain\Repository\NodeRepository
	 * @Flow\Inject
	 */
	protected $nodeRepository;

	/**
	 * Creates a new node tree
	 */
	public function createCommand() {

		$root = new Node('Root node');

			$firstChild = new Node('First level child');
			$firstChild->setParent($root);

				$firstChildOfFirstChild = new Node('Second level child');
				$firstChildOfFirstChild->setParent($firstChild);

				$secondChildOfFirstChild = new Node('Second level child, 2nd edition');
				$secondChildOfFirstChild->setParent($firstChild);

			$secondChild = new Node('First level child, 2nd edition');
			$secondChild->setParent($root);

				$firstChildOfSecondChild = new Node('Second level child, 3rd edition');
				$firstChildOfSecondChild->setParent($secondChild);

				$secondChildOfSecondChild = new Node('Second level child, 4th edition');
				$secondChildOfSecondChild->setParent($secondChild);

				$thirdChildOfSecondChild = new Node('Second level child, 5th edition');
				$thirdChildOfSecondChild->setParent($secondChild);

			$thirdChild = new Node('First level child, 4rd edition');
			$thirdChild->setParent($root);

		$this->nodeRepository->add($root);


	}

	/**
	 * Removes all nodes from the repository
	 */
	public function pruneCommand() {
		$this->nodeRepository->removeAll();
	}

}
