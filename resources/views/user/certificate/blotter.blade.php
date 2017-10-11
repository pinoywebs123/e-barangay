<!DOCTYPE html>
<html>
    <head>
        <title>Blotter Letter</title>
        <style>
            h1, h2, h3 {
                text-align: center;
            }
            
            h1 {
                font-size: 18px;
            }
            h2 {
                font-size: 24px;
            }
            
            header, section {
                border-bottom: solid black 1px;
            }
            
            .entry {
                display: block;
                float: left;
            }
            
            .entry p, input {
                display: inline-block;
            }

            .just {
                text-align: justify;
            }

            .line {
                display: block;
            }
            
            .line:after {
                content: " ";
                display: block;
                clear: both;
            }

            .w100 {
                width: 100%;
            }
            
            .w50 {
                width: 50%;
            }
            
            .w30 {
                width: 33.33%;
            }

            #cut {
                display: block;
                text-align: center;
                margin-top: 20px;
                border-top: dashed black 1px;
                padding-top: -10px;
            }

            #cut p {
                background-color: white;
                width: 460px;
                margin: 0 auto;
                margin-top: -2px;
            }

            #report_name {
                text-align: center;
                position: absolute;
                width: 235px;
                border: none;
                margin-top: -10px;
            }

            .clearer {
                display: block;
                clear: both;
            }

            .report_person, .desk_officer {
                float: right;
                padding-top: 20px;
            }

            .report_person {
                margin-right: 20px;
            }

            .report_person p, .desk_officer p {
                border-top: solid black 1px;
            }
           
        </style>
    </head>    
    <body>
        <header>
            <h1>Philippine National Police</h1>
            <h2>INCIDENT RECORD FORM</h2>
        </header>
        
        <section>
            <h3>ITEM "A" - REPORTING PERSON</h3>

            <div class="line">
                <div class="entry w100">
                    <p>Blotter Entry Number: {{$number}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w50">
                    <p>Type of Incident: {{$request['incident_name']}}</p>
                </div>

                <div class="entry w50">
                    <p>Time and Date of Report: <?php echo date('l jS \of F Y h:i:s A'); ?></p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>First Name: {{$find->fname}}</p>
                </div>

                <div class="entry w30">
                    <p>Middle Name: {{$find->fname}}</p>
                </div>

                <div class="entry w30">
                    <p>Last Name: {{$find->lname}}</p>
                </div>
            </div>

             <div class="line">
                <div class="entry w30">
                    <p>Qualifier: {{$request['a_qualifier']}}</p>
                </div>

                <div class="entry w30">
                    <p>Nickname: {{$request['a_nickname']}}</p>
                </div>

                <div class="entry w30">
                    <p>Sex: {{$find->gender}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>Status: {{$find->civil_status}}</p>
                </div>

                <div class="entry w30">
                    <p>Date of Birth: {{$find->dob}}</p>
                </div>

                <div class="entry w30">
                    <p>Place of Birth: {{$request['a_dob_place']}}</p>
                </div>
            </div>
            
            <div class="line">
                <div class="entry w30">
                    <p>Home Phone: {{$request['a_home']}}</p>
                </div>

                <div class="entry w30">
                    <p>Mobile Phone: {{Auth::user()->contact}}</p>
                </div>

                <div class="entry w30">
                    <p>E-mail Address: {{$find->email}}</p>
                </div>
            </div>
            
            <div class="line">
                <div class="entry w100">
                    <p>Current Address: {{$find->address}}</p>
                </div>
            </div>
            
            <div class="line">
                <div class="entry w50">
                    <p>Occupation: {{$request['a_occupation']}}</p>
                </div>
                
                <div class="entry w50">
                    <p>Occupation Address: {{$request['a_occupation_addr']}}</p>
                </div>
            </div>
        </section>
        
        <section>
            <h3>ITEM "B" - SUSPECT DATA</h3>

            <div class="line">
                <div class="entry w30">
                    <p>First Name: {{$request['b_fname']}}</p>
                </div>

                <div class="entry w30">
                    <p>Middle Name: {{$request['b_mname']}}</p>
                </div>

                <div class="entry w30">
                    <p>Last Name: {{$request['b_lname']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>Qualifier: {{$request['b_qualifier']}}</p>
                </div>

                <div class="entry w30">
                    <p>Nickname: {{$request['b_nickname']}}</p>
                </div>

                <div class="entry w30">
                    <p>Sex: {{$request['b_gender']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>Status: {{$request['b_status']}}</p>
                </div>

                <div class="entry w30">
                    <p>Date of Birth: {{$request['b_dob']}}</p>
                </div>

                <div class="entry w30">
                    <p>Place of Birth: {{$request['b_dob_addr']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>Phone Number: {{$request['b_home']}}</p>
                </div>

                <div class="entry w30">
                    <p>Mobile Number: {{$request['b_mobile']}}</p>
                </div>

                <div class="entry w30">
                    <p>Email Address: {{$request['b_email']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry">
                    <p>Current Address: {{$request['b_current_addr']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w50">
                    <p>Occupation: {{$request['b_student']}}</p>
                </div>

                <div class="entry w50">
                    <p>Occupation Address: {{$request['b_occupation_addr']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>Height: {{$request['b_height']}}</p>
                </div>

                <div class="entry w30">
                    <p>Weight: {{$request['b_weight']}}</p>
                </div>

                <div class="entry w30">
                    <p>Under Influence? {{$request['b_influence']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w50">
                    <p>Color of Eyes: {{$request['b_color_eyes']}}</p>
                </div>

                <div class="entry w50">
                    <p>Description of Eyes: {{$request['b_descp_eyes']}}</p>
                </div>
            </div>
            
            <div class="line">
                <div class="entry w50">
                    <p>Color of Hair: {{$request['b_color_hair']}}</p>
                </div>

                <div class="entry w50">
                    <p>Description of Hair: {{$request['b_desc_hair']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry">
                    <p><strong>OTHER DISTINGUISHING FEATURES (DESCRIBE IN DETAILS)</strong></p>

                </div>
            </div>

            <div class="line">
                <p>{{$request['b_other_desc']}}</p>
            </div>
        </section>

        <section>
            <div id="cut"><p>CUT HERE, ISSUE THIS RECEIPT TO THE REPORTING PERSON<p></div>

            <h3>INCIDENT RECORD TRANSACTION RECEIPT</h3>

            <div class="line">
                <div class="entry">
                    <p><strong>Blotter Entry Number: {{$number}}</strong></p>
                </div>
            </div>
            <div class="line">
                <div class="entry just">
                    <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This certify that <strong>{{Auth::user()->fname}} {{Auth::user()->mname}} {{Auth::user()->lname}}</strong> at <strong>{{Auth::user()->address}}</strong> Reported an incident to be recorded in the Police Blotter which involves <strong>{{$request['incident_name']}}</strong> at <strong>{{$request['incident_time']}}</strong> on <strong>{{$request['incident_date']}}}</strong> in <strong>{{$request['incident_place']}}</strong> and recorded by:</p>
                </div>
            </div>

            <div class="line desk_officer">
                <p>Rank/Name/Signature of Desk Officer</p>
            </div>

            <div class="clearer"></div>
        </section>

        <section>
            <h3>ITEM "C" - VICTIM DATA</h3>
            
            <div class="line">
                <div class="entry w30">
                    <p>First Name: {{$request['c_fname']}}</p>
                </div>

                <div class="entry w30">
                    <p>Middle Name: {{$request['c_mname']}}</p>
                </div>

                <div class="entry w30">
                    <p>Last Name: {{$request['c_lname']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>Qualifier: {{$request['c_qualifier']}}</p>
                </div>

                <div class="entry w30">
                    <p>Nickname: {{$request['c_nick']}}</p>
                </div>

                <div class="entry w30">
                    <p>Sex: {{$request['c_gender']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>Status: {{$request['c_status']}}</p>
                </div>

                <div class="entry w30">
                    <p>Date of Birth: {{$request['c_dob']}}</p>
                </div>

                <div class="entry w30">
                    <p>Place of Birth: {{$request['c_dob_place']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>Phone Number: {{$request['c_home']}}</p>
                </div>

                <div class="entry w30">
                    <p>Mobile Number: {{$request['c_mobile']}}</p>
                </div>

                <div class="entry w30">
                    <p>Email Address: {{$request['c_email']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry">
                    <p>Current Address: {{$request['c_current_addr']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w50">
                    <p>Occupation: {{$request['c_occupation']}}</p>
                </div>
                
                <div class="entry w50">
                    <p>Occupation Address: {{$request['c_occupation_addr']}}</p>
                </div>
            </div>
        </section>

        <section>
            <h3>ITEM "D" - NARRATIVE OF INCIDENT</h3>

             <div class="line">
                <div class="entry">
                    <p>Blotter Entry Number: {{$number}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry w30">
                    <p>Type of Incident: {{$request['incident_name']}}</p>
                </div>

                <div class="entry w30">
                    <p>Time: {{$request['incident_time']}}</p>
                </div>

                <div class="entry w30">
                    <p>Date: {{$request['incident_date']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry">
                    <p>Place of Incident: {{$request['incident_place']}}</p>
                </div>
            </div>

            <div class="line">
                <div class="entry">
                    <p><strong>DETAIL THE NARRATIVE OF THE INCIDENT</strong></p>
                </div>
            </div>

            <div class="line">
                <p>{{$request['incident_narrative']}}</p>
            </div>
        </section>

        <section>
            <h3>AUTHENTICATION</h3>

            <div class="line">
                <div class="entry just">
                    <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; I hereby to certify to the correctness of the foregoing to the best of my knowledge and belief, <strong>{{Auth::user()->fname}} {{Auth::user()->mname}} {{Auth::user()->lname}}</strong>.</p>
                </div>
            </div>

            <div id="rank" class="line">
                <div class="entry desk_officer">
                    <p>Rank/Name/Signature of Desk Officer</p>
                </div>
                <div class="entry report_person">
                    <p id="report_name">{{Auth::user()->fname}} {{Auth::user()->mname}} {{Auth::user()->lname}}</p>
                    <p>Name/Signature of Reporting Person</p>
                </div>

                <div class="clearer"></div>
            </div>
        </section>

        <section>
            <h3>CASE DISPOSITION(FOR CHIEF/HEAD OF OFFICE USE ONLY)</h3>

            <div class="line">
                <div class="entry">
                    <p>Chief of station/office instructions:</p>
                </div>
            </div>

            <div class="line">
                <div class="entry">
                    <p>Name of Designated investigator-on-case:</p>
                </div>
            </div>

            <div class="line">
                <div class="entry">
                    <p>Name of Chief of station/office:</p>
                </div>
            </div>
        </section>
    </body>
</html>