<div class="row">
    <div class="col-xs-12">
        <?php 
            foreach ($application->application_stages as $application_stage) {
        ?>
            <p><a href="#" class="btn btn-primary btn-lg">
                <?= $application_stage->description ?> - <?= $application_stage->stage ?> 
                <br><small class="muted"><?= $application_stage->created ?></small>
                </a>
            </p>
            <p>
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </p>
        <?php
            }
        ?>
    </div>
</div>