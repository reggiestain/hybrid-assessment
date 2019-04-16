<!-- Login Modal -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center">       
                <h4 class="modal-title w-100">Sign In</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
                    <div class="form-group">
                        
                    </div>
                    <div class="form-group">
                        
                    </div>
            </div>
            
        </div>
        <!--End Modal content-->
    </div>
</div>

<!-- Register Modal -->
<div id="regModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center">       
                <h4 class="modal-title w-100">Register</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">                     
                    <div class="form-group">
                        <label for="usern">Username:</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="row">     
                    <div class="col-md-6 form-group">
                        <label for="usern">First Name:</label>
                        <input type="text" class="form-control" name="firstname" id="firstname">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="usern">Surname:</label>
                        <input type="text" class="form-control" name="surname" id="surname">
                    </div>
                    </div>    
                    <div class="form-group">
                        <label for="usern">Email:</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="confirm_pass" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Confirm Password:</label>
                        <input type="password-conf" class="form-control" id="pwd">
                    </div>                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success pull-left">Register</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!--End Modal content-->
    </div>
</div>