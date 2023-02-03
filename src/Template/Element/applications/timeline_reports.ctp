<?php
$this->assign('MyApplications', 'active');
$checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
$nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';
$numb = 1;
?>

<span id="amendment_cnt" style="display: none;">
    <?php
    if (isset($amendment)) {
        preg_match_all('!\d+!', $amendment->protocol_no, $matches);
        echo $matches[0][2];
    }
    ?></span>

<div class="row">
    <div class="col-xs-12">
        <?php
        echo $this->fetch('form-actions');
        ?>
        <div id="tabs">
            <?php
            echo $this->fetch('tabs');
            ?>
            <div id="tabs-1">

                <table class="table table-striped table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Time/Count</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Total Time</th>
                            <td><?= $total_time ?></td>
                        </tr>
                        <tr>
                            <th>Report Number</th>
                            <td><?= $report_count ?></td>
                        </tr>
                        <tr>
                            <th>Mean Time</th>
                            <td><?= $mean_time ?></td>
                        </tr>
                        <tr>
                            <th>Median Time</th>
                            <td><?= $median_time ?></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>Protocol No</th>
                        <th>Approval Time</th>
                        <th>MCAZ Time</th>
                        <th>Applicant Time</th>
                        <th>Stage Time</th>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($applications as $application) :
                        ?>
                            <tr>
                                <td><?= $application['protocol_no']; ?></td>
                                <td><?= $application['approval_time']; ?></td>
                                <td><?= $application['mcaz_time']; ?></td>
                                <td><?= $application['applicant_time']; ?></td>
                                <td><?php
                                    foreach ($application['stage_time'] as  $stage_days) {
                                        echo $stage_days;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php echo $this->fetch('endjs') ?>
</div>
<?= $this->fetch('submit_buttons') ?>