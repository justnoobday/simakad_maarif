<?php if ($this->session->has_userdata('message'))
{?>
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="fa fa-warning"></i> Alert!</h5>
    <?php echo $this->session->flashdata('message')?>
</div>
<?php }?>
