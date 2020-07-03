<?php if ($this->session->has_userdata('success'))
{?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="fa fa-v" style="size: 12px"></i> Alert!</h5>
        <?php echo $this->session->flashdata('success')?>
    </div>
<?php }?>
