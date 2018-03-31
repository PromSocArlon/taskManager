<div class="border border-secondary rounded w-50 h-85 mx-auto mt-5 p-4">
    <div id="team" class="container w-10">
        <div class="row">
            <p>Team <?= $this->clean($data['name']->getName()) ?> has been successfully deleted.</p>
            <a href="?controller=team&action=index" class="button">Continue</a>
        </div>
    </div>
</div>
