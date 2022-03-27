<template>
	<div>
		<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#SendMessage">
  Chat Now
</button>

<!-- Modal -->
<div class="modal fade" id="SendMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Chat With Seller Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	</div>
</template>


<script>
	export default{
		name: 'SendMessage'
	}
</script>

<style>
	.modal-backdrop{
		position: relative;

	}
</style>