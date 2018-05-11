
<style type="text/css">
    
.red{
    color:red;
    }
.form-area
{
    background-color: #FAFAFA;
    padding: 10px 40px 60px;
    /margin: 10px 0px 60px;
    border: 1px solid GREY;
    }
</style>

<div class="container">
<div class="col-md-6">

    @if(Session::has('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
    @endif

    @if(Session::has('error_msg'))
        <div class="alert alert-danger">{{ Session::get('success_msg') }}</div>
    @endif

    <div class="form-area">  
        <form role="form" action="{{ route('Insert') }}" method="POST">
        <br style="clear:both">
        {{ csrf_field() }}
                    <h3 style="margin-bottom: 25px; text-align: center;">Add Car</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="car_number" placeholder="Car Number" required>
                    </div>

    				<div class="form-group">
						<input type="text" class="form-control" id="name" name="owner_name" placeholder="Name" required>
					</div>
					
					<div class="form-group">
						<input type="text" class="form-control" id="mobile" name="owner_mobile" placeholder="Mobile Number" required>
					</div>
					<!-- <div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					</div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" name="msg" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                    </div> -->
            
        <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Add</button>
        </form>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){ 
    $('#characterLeft').text('140 characters left');
    $('#message').keydown(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });    
});

</script>