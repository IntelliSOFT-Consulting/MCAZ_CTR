<?php
  $this->Html->script('comments/meeting_dates', ['block' => true]);
?>

<table id="committee-dates" class="table table-condensed table-bordered">
    <thead>
        <tr>
            <th>Meeting Date</th>
            <th>Day</th>
            <th>From</th>
            <th>To</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form class="form-inline">
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="meeting-date" name="meeting_date" placeholder="DD-MM-YYYY">
                    </div>
                </td>
                <td></td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="start-time" name="start_time" placeholder="9:00 AM">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="end-time" name="end_time" placeholder="3:30 PM">
                    </div>
                </td>
                <td>
                    <button id="saveDate" class="btn btn-primary btn-xs"><i class="fa fa-save"></i></button>
                </td>
            </form>
        </tr>
        <?php foreach($committee_dates as $committee_date) { ?>
            <tr>
                <td><?= $committee_date->meeting_date ?></td>
                <td><?= $committee_date->meeting_date ?></td>
                <td><?= $committee_date->start_time ?></td>
                <td><?= $committee_date->end_time ?></td>
                <td><button class="btn btn-defualt btn-xs remove-meeting-date" value="<?= $committee_date->id ?>"><i class="fa fa-minus"></i></button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>