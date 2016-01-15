<?php
namespace Netlogix\JsonApiOrg\ExampleData\Domain\Dto;

/*
 * This file is part of the Netlogix.JsonApiOrg.ExampleData package.
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Scope("singleton")
 */
class NodeResourceInformation extends \Netlogix\JsonApiOrg\Resource\Information\ResourceInformation implements \Netlogix\JsonApiOrg\Resource\Information\ResourceInformationInterface {

	/**
	 * @var string
	 */
	protected $controllerName = 'Node';

	/**
	 * @var string
	 */
	protected $packageKey = 'Netlogix.JsonApiOrg.ExampleData';

	/**
	 * @var
	 */
	protected $resourceClassName = \Netlogix\JsonApiOrg\ExampleData\Domain\Dto\NodeResource::class;

	/**
	 * @var
	 */
	protected $payloadClassName = \Netlogix\JsonApiOrg\ExampleData\Domain\Model\Node::class;

	/**
	 * @return array
	 */
	protected function getResourceControllerArguments($node) {
		return array(
			'node' => $node,
		);
	}

	/**
	 * @return array
	 */
	protected function getRelationshipControllerArguments($node, $relationshipName) {
		return array(
			'node' => $node,
			'relationshipName' => $relationshipName
		);
	}

}