<h2><?= h($subject) ?></h2>
<h4>จากคุณ <?=h($contact->full_name)?></h4>
<h5>โทร: <?=h($contact->tel)?></h5>
<h5>อีเมล: <?=h($contact->email)?></h5>
<h5>ข้อความ</h5>
<p><?=h($contact->message)?></p>