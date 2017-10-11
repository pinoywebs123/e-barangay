@extends('template.default')

@section('styles')
<style type="text/css">
  .jumbotron{
    margin-bottom: 0px;
  }
  #heads{
    margin-top: -40px;
    color: #fff;
  }
  img{
    z-index: -9999;
  }
   body {
    background: #2c3e50;
  }

  #progressbar{
  margin:0;
  padding:0;
  font-size:18px;
}
fieldset{
  display:none;
  margin: 0;
  border: 1px solid #000 !important;
  padding: 20px !important;
  width: 80%;
}
#first{
  display:block;
    margin: 0;
  border: 1px solid #000;
  padding: 20px;
  width: 80%;
}

#regform {
    width: 50%;
    margin: auto;
    margin-top: 60px;
}
#progressbar li {
    padding: 20px 30px;
    text-align: left;
    margin-right: 0;
    max-width: 25%;
    width: 100%;
    display:inline-block;
    background: #f7f7f7;
}

#progressbar {
    margin-bottom: 20px;
    width: 100%;
}

#progressbar li.active {
    background: #AD1515;
    color: #fff;
}

#regform .title {
    width: 100%;
    text-align: center;
    background: #F3EDED;
    padding: 10px;
}

#regform .text_field,#regform textarea {
    width: 100% !important;
    padding: 10px !important;
}

#regform .next_btn, #regform .submit_btn {
    border-radius: 0;
    width: 49%;
    background: #AD1515;
    color: #fff;
    text-transform: uppercase;
    border: none;
    margin-right: 2%;
}

#regform .pre_btn {
    border-radius: 0;
    width: 48%;
    background: #FF8888;
    color: #fff;
    text-transform: uppercase;
    border: none;
}

fieldset {
    width: 80% !important;
    margin: 0 auto !important;
    margin-top: 50px !important;
}

#regform {
    width: 80% !important;
    margin: 0 auto !important;
}

#progressbar2 {
    height: 50px !important;
    margin-top: 20px;
}

#progressbar2 li {
    background: #eee;
    list-style: none;
    line-height: 20px;
    box-sizing: border-box;
    float: left;
    width: 25%;
    height: 70px;
    padding: 20px 30px;
    border-top: solid #333 1px;
    border-bottom: solid #333 1px;
}

#progressbar2:after {
  content: "";
  display: block;
  clear: both;
}

#progressbar2 li:last-of-type {
  border-right: solid #333 1px;
}

#progressbar2 li.active {
    background-color: #AD1515;
    color: white;
}
  
</style>
@endsection

@section('contents')
  <div id="aw">
       <img src="{{URL::to('image/test.jpg')}}" width="100%" height="320px">
       <h2 class="text-center" id="heads">Barangay Tagapo E-Sumbong</h2>
   </div>
   <div>
       <div class="col-md-3 well">
           <ul class="nav nav-pills nav-stacked">
              <li role="presentation" ><a href="{{route('user_main')}}">Home</a></li>
              <li role="presentation" ><a href="{{route('user_request')}}">Request</a></li>
              <li role="presentation" class="active"><a href="{{route('user_blotter')}}">Blotter</a></li>
              <li role="presentation" ><a href="{{route('user_missing')}}">Missing</a></li>
              <li role="presentation"><a href="{{route('user_about')}}">Account</a></li>
              <li role="presentation" ><a href="{{route('user_settings')}}">Settings</a></li>
              <li role="presentation"><a href="{{route('user_logout')}}">Logout</a></li>
            </ul>
       </div>

       <div class="col-md-9 well">
          <ul class="nav nav-tabs">
            <li role="presentation" ><a href="{{route('user_blotter')}}">List</a></li>
            <li role="presentation" class="active"><a href="{{route('user_blotter_create')}}">Create</a></li>
            
          </ul>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Congratulations!</strong> You have been successfully submitted blotter report!. Do you want to request a patawag to your respondent?
                  <br>
                  <a href="{{route('user_blotter_yes', ['entry'=> Session::get('success')])}}" class="btn btn-primary">Yes</a>
                  <a href="{{route('user_blotter_no', ['entry'=> Session::get('success')])}}" class="btn btn-danger">No</a>
                </div>
              @endif

              @if(Session::has('patawag'))
                <div class="alert alert-success alert-dismissable text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Congratulations!</strong> {{Session::get('patawag')}}
                </div>
              @endif
              
          

             <div id = "regform" >
    <div class="content">
        <div class="main">
            <form action="{{route('user_blotter_create_check')}}" class="regform" method="POST">
                <ul id="progressbar2">
                    <li class="active">Reporting Person</li>
                    <li>Suspect Data</li>
                    <li>Victim Data</li>
                    <li>Narrative of Incident</li>
                </ul>
                <fieldset id = "first">
                    <h2 class="title">Reporting Person</h2>
                      <div class="form-group">
                        <label for="a_qualifier">Qualifier:</label>
                        <input class="text_field" name="a_qualifier" placeholder="Qualifier" type="text" >
                      </div>
                      <div class="form-group">
                        <label for="a_nickname">Nickname:</label>
                        <input class="text_field" name="a_nickname" placeholder="Nickname" type="text">
                      </div>

                      <div class="form-group">
                        <label for="a_dob_place">Place of Birth:</label>
                        <input class="text_field" name="a_dob_place" placeholder="Place of Birth" type="text">
                      </div>
                    
                    <div class="form-group">
                        <label for="a_home">Home Phone:</label>
                        <input class="text_field" name="a_home" placeholder="Home Phone" type="text">
                      </div>
                    
                    <div class="form-group">
                        <label for="a_occupation">Occupation:</label>
                        <input class="text_field" type="text" name="a_occupation" placeholder="Occupation">
                      </div>
                    
                    <div class="form-group">
                        <label for="a_occupation_addr">Occupation Address:</label>
                        <input class="text_field" name="a_occupation_addr" placeholder="Occupation Address" type="text">
                      </div>
                    
                    <input class="next_btn btn btn-default" name="next" type="button" value="Next">
                </fieldset>

                <fieldset>
                    <h2 class="title">Suspect Data</h2>
                    <div class="form-group">
                        <label for="b_fname">First Name:</label>
                        <input class="text_field" name="b_fname" placeholder="First Name" type="text">
                     </div>

                    <div class="form-group">
                        <label for="b_mname">Middle Name:</label>
                        <input class="text_field" name="b_mname" placeholder="Middle Name" type="text">
                     </div>
                    
                    <div class="form-group">
                        <label for="b_lname">Last Name:</label>
                        <input class="text_field" name="b_lname" placeholder="Last Name" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_qualifier">Qualifier:</label>
                        <input class="text_field" name="b_qualifier" placeholder="Qualifier" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_nickname">Nickname:</label>
                        <input class="text_field" name="b_nickname" placeholder="Nickname" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_gender">Sex:</label>
                        <select class="text_field" name="b_gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="b_status">Status:</label>
                        <select class="text_field" name="b_status">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="b_dob">Date of Birth:</label>
                        <input class="text_field" name="b_dob" type="date">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_dob_addr">Place of Birth:</label>
                        <input class="text_field" name="b_dob_addr" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_home">Home Phone:</label>
                        <input class="text_field" name="b_home" placeholder="Home Phone" type="text" >
                    </div>
                    
                    <div class="form-group">
                        <label for="b_mobile">Mobile Phone:</label>
                        <input class="text_field" name="b_mobile" placeholder="Mobile" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_email">E-mail Address:</label>
                        <input class="text_field" name="b_email" placeholder="E-mail Address" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_current_addr">Current Address:</label>
                        <input class="text_field" name="b_current_addr" placeholder="Current Address" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_student">Occupation:</label>
                        <input class="text_field" name="b_student" placeholder="Occupation" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_occupation_addr">Occupation Address:</label>
                        <input class="text_field" name="b_occupation_addr" placeholder="Occupation Address" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_height">Height:</label>
                        <input class="text_field" name="b_height" placeholder="Height" type="number" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_weight">Weight:</label>
                        <input class="text_field" name="b_weight" placeholder="Weight" type="number" min="0">
                    </div>
                    <div class="form-group">
                        <label for="b_influence">Under Influence:</label>
                        <select name="b_influence" class="text_field">
                          <option value="None">None</option>
                          <option value="Drugs">Drugs</option>
                          <option value="Liquor">Liquor</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="b_color_eyes">Color of Eyes:</label>
                        <input class="text_field" name="b_color_eyes" placeholder="Color of Eyes" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_descp_eyes">Description of Eyes:</label>
                        <input class="text_field" name="b_descp_eyes" placeholder="Description of Eyes" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_color_hair">Color of Hair:</label>
                        <input class="text_field" name="b_color_hair" placeholder="Color of Hair" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_desc_hair">Description of Hair:</label>
                        <input class="text_field" name="b_desc_hair" placeholder="Description of Hair" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="b_other_desc">OTHER DISTINGUISHING FEATURES (DESCRIBE IN DETAILS):</label>
                        <textarea rows="5" name="b_other_desc" placeholder="Distinguishing features described in detail"></textarea>
                    </div>
                    
                    <input class="pre_btn btn" type="button" value="Back">
                    <input class="next_btn btn btn-default" name="next" type="button" value="Next">
                </fieldset>
                <fieldset>
                    <h2 class="title">Victim Data</h2>
                   <div class="form-group">
                        <label for="c_fname">First Name:</label>
                        <input class="text_field" name="c_fname" placeholder="First Name" type="text">
                     </div>

                    <div class="form-group">
                        <label for="c_mname">Middle Name:</label>
                        <input class="text_field" name="c_mname" placeholder="Middle Name" type="text">
                     </div>
                    
                    <div class="form-group">
                        <label for="c_lname">Last Name:</label>
                        <input class="text_field" name="c_lname" placeholder="Last Name" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="c_qualifier">Qualifier:</label>
                        <input class="text_field" name="c_qualifier" placeholder="Qualifier" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="c_nick">Nickname:</label>
                        <input class="text_field" name="c_nick" placeholder="Nickname" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="lname">Sex:</label>
                        <select class="text_field" name="c_gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="lname">Status:</label>
                        <select class="text_field" name="c_status">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="c_dob">Date of Birth:</label>
                        <input class="text_field" name="c_dob" type="date">
                    </div>
                    
                    <div class="form-group">
                        <label for="c_dob_place">Place of Birth:</label>
                        <input class="text_field" name="c_dob_place" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="c_home">Home Phone:</label>
                        <input class="text_field" name="c_home" placeholder="Home Phone" type="text" >
                    </div>
                    
                    <div class="form-group">
                        <label for="c_mobile">Mobile Phone:</label>
                        <input class="text_field" name="c_mobile" placeholder="Mobile" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="c_email">E-mail Address:</label>
                        <input class="text_field" name="c_email" placeholder="E-mail Address" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="c_current_addr">Current Address:</label>
                        <input class="text_field" name="c_current_addr" placeholder="Current Address" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="c_occupation">Occupation:</label>
                        <input class="text_field" name="c_occupation" placeholder="Occupation" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="c_occupation_addr">Occupation Address:</label>
                        <input class="text_field" name="c_occupation_addr" placeholder="Occupation Address" type="text">
                    </div>
                    
                    <input class="pre_btn btn" type="button" value="Back">
                    <input class="next_btn btn btn-default" name="next" type="button" value="Next">
                </fieldset>

                <fieldset>
                    <h2 class="title">Narrative of Incident</h2>
                   <div class="form-group">
                        <label for="incident_name">Type of Incident:</label>
                        <input class="text_field" name="incident_name" placeholder="Type of Incident" type="text">
                     </div>

                    <div class="form-group">
                        <label for="incident_time">Time:</label>
                        <input class="text_field" name="incident_time" type="time">
                     </div>
                    
                    <div class="form-group">
                        <label for="incident_date">Date:</label>
                        <input class="text_field" name="incident_date" type="date">
                    </div>
                    
                    <div class="form-group">
                        <label for="incident_place">Place of Incident:</label>
                        <input class="text_field" name="incident_place" placeholder="Place of Incident" type="text">
                    </div>
                    
                    <div class="form-group">
                        <label for="incident_narrative">DETAIL THE NARRATIVE OF THE INCIDENT:</label>
                        <textarea rows="5" name="incident_narrative" placeholder="Narrative of the Incident described in detail"></textarea>
                    </div>
                    
                    <input class="pre_btn btn" type="button" value="Cancel">
                    <input class="submit_btn btn btn-default" type="submit" value="Submit">
                     {{csrf_field()}}
                </fieldset>
            </form>
        </div>
    </div>
</div>
   </div>

@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
var count = 0; // To Count Blank Fields
/*------------ Validation Function-----------------*/
$(".submit_btn").click(function(event) {
var radio_check = $('.rad'); // Fetching Radio Button By Class Name
var input_field = $('.text_field'); // Fetching All Inputs With Same Class Name text_field & An HTML Tag textarea
var text_area = $('textarea');
// Validating Radio Button
if (radio_check[0].checked == false && radio_check[1].checked == false) {
var y = 0;
} else {
var y = 1;
}
// For Loop To Count Blank Inputs
for (var i = input_field.length; i > count; i--) {
if (input_field[i - 1].value == '' || text_area.value == '') {
count = count + 1;
} else {
count = 0;
}
}
// Notifying Validation
if (count != 0 || y == 0) {
alert("*All Fields are mandatory*");
event.preventDefault();
} else {
return true;
}
});
/*---------------------------------------------------------*/
$(".next_btn").click(function() { // Function Runs On NEXT Button Click
$(this).parent().next().fadeIn('slow');
$(this).parent().css({
'display': 'none'
});
// Adding Class Active To Show Steps Forward;
$('.active').next().addClass('active');
});
$(".pre_btn").click(function() { // Function Runs On PREVIOUS Button Click
$(this).parent().prev().fadeIn('slow');
$(this).parent().css({
'display': 'none'
});
// Removing Class Active To Show Steps Backward;
$('.active:last').removeClass('active');
});
// Validating All Input And Textarea Fields
$(".submit_btn").click(function(e) {
if ($('input').val() == "" || $('textarea').val() == "") {
alert("*All Fields are mandatory*");
return false;
} else {
return true;
}
});
});
</script>

@endsection