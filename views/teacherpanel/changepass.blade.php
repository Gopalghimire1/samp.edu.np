<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form action="/teacherpanel/changepassword/" method="post">
          <div class="md-form mb-5">
           
            <label data-error="wrong" data-success="right" for="orangeForm-name">Current Password</label>
            <input type="password" id="orangeForm-name" name="oldpass" class="form-control validate">
          </div>
          <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="orangeForm-name">New Password</label>
              <input type="password" id="orangeForm-name" name="newpass" class="form-control validate">
          </div>
          <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="orangeForm-name">Confirm Password</label>
              <input type="password" id="orangeForm-name" name="newpasscheck" class="form-control validate">
          </div>
          
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-deep-orange">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

