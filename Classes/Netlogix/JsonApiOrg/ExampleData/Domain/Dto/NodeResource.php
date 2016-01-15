<?php
namespace Netlogix\JsonApiOrg\ExampleData\Domain\Dto;

/*
 * This file is part of the Netlogix.JsonApiOrg.ExampleData package.
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

/**
 * This node extends the original AbstractResource, basically to configure
 * exposed fields and let the property mapper know about the type of the
 * payload object.
 */
class NodeResource extends \Netlogix\JsonApiOrg\Domain\Dto\AbstractResource implements \Netlogix\JsonApiOrg\Schema\ResourceInterface {

	/**
	 * @var \Netlogix\JsonApiOrg\ExampleData\Domain\Model\Node
	 */
	protected $payload;

	/**
	 * @var array<string>
	 */
	protected $attributesToBeApiExposed = array(
		'title'
	);

	/**
	 * @var array<string>
	 */
	protected $relationshipsToBeApiExposed = array(
		'children' => \Netlogix\JsonApiOrg\Schema\Relationships::RELATIONSHIP_TYPE_COLLECTION,
		'parent' => \Netlogix\JsonApiOrg\Schema\Relationships::RELATIONSHIP_TYPE_SINGLE,
	);

	/**
	 * Resource constructor.
	 *
	 * @param \Netlogix\JsonApiOrg\ExampleData\Domain\Model\Node $payload
	 * @param \Netlogix\JsonApiOrg\Resource\Information\ResourceInformationInterface $converter
	 */
	public function __construct(\Netlogix\JsonApiOrg\ExampleData\Domain\Model\Node $payload, \Netlogix\JsonApiOrg\Resource\Information\ResourceInformationInterface $converter) {
		parent::__construct($payload, $converter);
	}

	/**
	 * @return \Netlogix\JsonApiOrg\ExampleData\Domain\Model\Node
	 */
	public function getPayload() {
		return parent::getPayload();
	}

}
