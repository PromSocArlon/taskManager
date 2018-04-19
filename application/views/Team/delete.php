<?php
echo '<b>Team deleted!<b>';
header("refresh: 1; url=?controller=team&action=index");

/*
<div id="team" class="container w-10">
        <div class="row">
            <p>Team <?= $this->clean($data['name']->getName()) ?> has been successfully deleted.</p>
            <a href="?controller=team&action=index" class="button">Continue</a>
        </div>
    </div>
</div> */