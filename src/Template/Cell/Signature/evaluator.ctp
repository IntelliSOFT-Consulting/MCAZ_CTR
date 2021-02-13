<?php if(isset($user->name)) { ?>
<h4 class="text-center">
<?php          
      echo  "<span>".$user->name.": </span><img src='".$this->Url->build(substr($user->dir, 8) . '/' . $user->file, true)."' style='width: 30%;' alt=''>";
?>
</h4>
<?php } ?>