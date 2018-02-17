<p>
	Dear <strong><?= $user['email'] ?></strong>,</p>
<p>
	You are getting this email because you have registered as a new user in the <a href="http://45.79.130.91:8765/">MCAZ CTR website</a>. To activate your account, please click on the link below and then proceed to login</p>
<p>
	<a href="http://45.79.130.91:8765/users/activate/<?= $user['activation_key'] ?>">ACTIVATE</a></p>
<p>
	<em>if you did not register, you can safely ignore this email!</em></p>