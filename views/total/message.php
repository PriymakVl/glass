<?php

    require_once ('./helpers/message.php');
    
    $message = Message::getFromSession();
    
    ?>

<? if(isset($message)): ?>
    <div class="messages-wrp">
        <p class="<?=$message['class']?>"><?=$message['text']?></p>
    </div>
<? endif; ?>
