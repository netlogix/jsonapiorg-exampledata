<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20160115144741 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {

		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("CREATE TABLE netlogix_jsonapiorg_exampledata_domain_model_node (persistence_object_identifier VARCHAR(40) NOT NULL, parent VARCHAR(40) DEFAULT NULL, title VARCHAR(255) NOT NULL, creationdate DATETIME NOT NULL, dtype VARCHAR(255) NOT NULL, INDEX IDX_D4B68F723D8E604F (parent), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("ALTER TABLE netlogix_jsonapiorg_exampledata_domain_model_node ADD CONSTRAINT FK_D4B68F723D8E604F FOREIGN KEY (parent) REFERENCES netlogix_jsonapiorg_exampledata_domain_model_node (persistence_object_identifier)");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {

		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE netlogix_jsonapiorg_exampledata_domain_model_node DROP FOREIGN KEY FK_D4B68F723D8E604F");
		$this->addSql("DROP TABLE netlogix_jsonapiorg_exampledata_domain_model_node");
	}
}