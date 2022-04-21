<?php
namespace services\dao;

 use models\Organization;
 use Ubiquity\controllers\Controller;

 /**
  * Class OrgaRepository
  */
class OrgaRepository extends \Ubiquity\orm\repositories\ViewRepository{
	public function __construct(Controller $ctrl) {
		parent::__construct($ctrl, Organization::class);
	}
}
