<?= $user['name'] ?> ( <?= $user['email'] ?> ) wrote:

<?= $user['name'] ?>

<?= $this->Url->build(['controller' => 'Users', 'action'=> 'view', $user['id']], true) ?>