<div class="text-center" style="margin-top: 50px;">
  <h3>Add ID and CSV</h3>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <?php echo $this->Form->create($documentEnt, ['name'=>'add_post', 'class'=>'was-validated',
       'enctype'=>'multipart/form-data']) ?>
      <div class="form-group">
        <?//= $this->Form->control('id', ['type'=>'text', 'class'=>'form-control','placeholder'=>'Enter id','required'=>true]);?>
         <?= $this->Form->control('user_id', ['type'=>'text', 'class'=>'form-control','placeholder'=>'Enter id','required'=>true]); ?>
      </div>
      <div class="form-group">
        <?= $this->Form->control('post_document', ['type'=>'file', 'class'=>'form-control','required'=>false]); ?>
        <h5>Or input .CSV as text</h5>
        <?= $this->Form->control('post_document', ['type'=>'textarea', 'class'=>'form-control','required'=>false]); ?>
      </div>
      <button type="submit" class="btn btn-success" style="float: right;">Save</button>
      <?php echo $this->Form->end() ?>
    </div>
  </div>
</div>