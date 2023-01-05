<a href="#" data-toggle="modal" data-target="#approveMemberModal{{$tip->id}}">Delete</a>

<!-- Approve-Decline Contributions Modal-->
<div class="modal fade" id="approveMemberModal{{$tip->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Do you really want to delete this tip?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you are ready to delete the tip.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                <form action="{{ route('tip.delete', $tip->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input class="btn btn-primary" type="submit" name="Delete" value="Delete">
                </form>

            </div>
        </div>
    </div>
</div>
