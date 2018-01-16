
        <div>
              <?php foreach ($notifications as $notification): ?>
                <div class="alert alert-<?php 
                    if($notification->has('message')) {
                      if(!empty($notification->message->style)) {
                        echo $notification->message->style;
                      } else {
                        echo 'info';
                      }
                    } else { echo 'info'; }
                   ?> alert-dismissible fade in" title="<?= $notification->id ?>" role="alert"> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
                 <div class="article"> <?= (!empty($notification->system_message)) ? $notification->system_message : $notification->user_message ; ?> </div>
                </div>
                <?php endforeach; ?>

                  <hr>
                  <nav aria-label="Page navigation">
                      <ul class="pagination">
                          <?= $this->Paginator->first('<< ' . __('first'), ['model' => 'Notifications']) ?>
                          <?= $this->Paginator->prev('< ' . __('previous'), ['model' => 'Notifications']) ?>
                          <?= $this->Paginator->numbers(['model' => 'Notifications']) ?>
                          <?= $this->Paginator->next(__('next') . ' >', ['model' => 'Notifications']) ?>
                          <?= $this->Paginator->last(__('last') . ' >>', ['model' => 'Notifications']) ?>
                      </ul>
                      <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'Notifications']) ?></small></h6>
                  </nav>

        
        </div>  

<script type="text/javascript">
  $(document).ready(function() {
    $('.article').shorten({
      showChars: 45,
    });

    $('.alert').on('closed.bs.alert', function () {
       console.log($(this).attr('title'));
      var dataToSend = { id : $(this).attr('title')
          };
      $('.help-block').empty();
      $('[id^=fg-]').removeClass("has-error");
      $('#assignModalHeader').addClass("has-error");
      $.ajax({
            async:true,
            type: 'POST',
            url: '/notifications/delete.json',
            data: dataToSend,
            success: function (data) {
                // $('#registrationModal').modal('hide')
                console.log(data);
            },
            error: function (data) {
                //TODO: Remember to remove console.logs during deploy
                console.log(data);                
            },
        });
    })
  });
</script>