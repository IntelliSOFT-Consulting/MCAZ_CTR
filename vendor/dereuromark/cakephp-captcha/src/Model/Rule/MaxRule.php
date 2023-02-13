<?php
namespace Captcha\Model\Rule;

use Cake\Core\Configure;
use Cake\Datasource\EntityInterface;

class MaxRule {

	/**
	 * @param \Captcha\Model\Entity\Captcha $entity
	 * @param array $options
	 *
	 * @return bool
	 */
	public function __invoke(EntityInterface $entity, array $options) {
		$limit = Configure::read('maxPerUser') ?: 1000;

		/** @var \Captcha\Model\Table\CaptchasTable $repository */
		$repository = $options['repository'];

		return $repository->getCount($entity->ip, $entity->session_id) < $limit;
	}

}
