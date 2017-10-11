<!DOCTYPE html>
<html>
    <head>
        <title>Patawag Letter</title>
        <style>
            h1, h2, h3 {
                text-align: center;
            }
            
            h1 {
                font-size: 16px;
            }
            
            h1 span {
                font-weight: normal;
            }
            
            h2 {
                font-size: 24px;
            }
            
            p, input {
                display: inline-block;
            }
            
            aside {
                text-align: right;
            }
            
            aside section {
                margin-top: -30px;
                border: none;
            }
            
            aside section p {
                display: inline-block;
            }
            
            aside .right {
                float: right;
            }
            
            header {
                background-image: url('{{URL::to('image/logo.jpg')}}');
                background-position: 10% 5%;
                background-repeat: no-repeat;
            }
            
            .clearer:after, .line:after {
                content: "";
                display: block;
                clear: both;
            }
            
            .entry {
                display: block;
                float: left;
            }
            
            .indent {
                text-align: justify;
                width: 730px;
            }
            
            .line {
                display: block;
            }
            
            .w50 {
                width: 50%;
            }
            
            .w30 {
                width: 30%;
            }
            
            #barblg {
                width: 100%;
            }
            
            #barblg span {
                font-weight: bold;
                text-align: right !important;
                margin-right: 50px;
            }
            
            #punbar {
                display: block;
                margin-top: -20px;
            }
            
            #salute p, #salute div {
                float: right;
            }
            
            #salute p {
                text-align: right;
                box-sizing: border-box;
                width: 100%;
            }
            
            #salute div {
                width: 250px;
                margin-top: 60px;
                border-top: solid black 1px;
            }
            
            #salute div p:first-child {
                margin-top: 0;
            }
            
            #salute div p {
                text-align: center;
            }
            
            #salute > p {
                padding-right: 30%;
            }
            
            #subhead {
                margin-left: 5px;
            }
        </style>
    </head>    
    <body>
        <header>
            <h1>
                REPUBLIC OF THE PHILIPPINES
                <br>    
                LALAWIGAN NG LAGUNA
                <br>
                LUNGSOD NG SANTA ROSA
                <br>
                BARANGAY TAGAPO
                <br>
                <span>Tel. No. : (049) 534-5751</span>
                <br><br>
                
                TANGGAPAN NG TAGAMAYAPA
            </h1>
            
            <aside class="clearer">
                <p id="barblg" class="line">
                    Usaping Barangay Blg.
                    <br>
                    <span>PATAWAG:</span>
                </p>                
            </aside>
        </header>
        
        <section>
            <h2>PATAWAG</h2>
            <div class="clearer line">
                <div class="entry w50">
                    <p>May Sumbong: {{$find->fname}} {{$find->mname}} {{$find->lname}}</p>
                </div>
                
                <div class="entry w50">
                    <p>Ipinagsumbong: {{$request->b_fname}} {{$request->b_mname}} {{$request->b_lname}}</p>
                </div>
            </div>

            <div class="clearer line">
                <div class="entry">
                    <p>SUMBONG HINGGIL SA: {{$request['incident_name']}}</p>
                </div>
            </div>

            <div class="clearer line">
                <div class="entry">
                    <p class="indent">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sa pamamagitan nito, ikaw/kayo ay inaanyayahan upang personal 
                        na humarap dito sa Tanggapan ng Barangay Tagapamayapa (Investigator) 
                        ng Barangay Tagapo upang mabigyang linaw ang sumbong/reklamo 
                        laban saiyo/inyo na dinulog dito ng mga nagrereklamo/nagsumbong
                        laban sa iyo/inyo sa ganap naika-<?php echo date('jS'); ?> ng 
                        <?php echo date('F');?> taon <?php echo date('Y');?> oras ng 
                        <?php echo date('h:i:s A'); ?>.</p>
                </div>
            </div>

             <div class="clearer line">
                <div class="entry">
                    <p class="indent">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ang iyong/inyong pagbalewala o hindi pagtalima sa paanyayang ito ay
                        nangangahulugan na ang iyong karapatang ipaliwanag o ipagtanggol ang
                        iyong sarili sa sumbong/reklamo laban saiyo/inyo ay mababalewala at 
                        ang sumbong/nagreklamo ay binibigyan ng karapatang tuwirang
                        magsakdal o magdemanda laban saiyo/inyo sa mas mataas natanggapan
                        ng pamahalaan:</p>
                </div>
            </div>

            <div class="clearer line">
                <div class="entry">
                    <p class="indent">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Paanyaya ngayong ika-<?php echo date('d',strtotime("+2 day"));  ?> ng buwan ng <?php echo date('F');?>, taong <?php echo date('Y');?>.</p>
                </div>
            </div>
            
            <div class="clearer line">
                <div class="entry">
                    <p class="indent">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tinaggap ni:</p>
                </div>
            </div>
            
            <div id="salute" class="clearer line">
                <p class="right">Sa kaalaman ni:</p>
                
                <div class="right">
                    <p>HON. ALDRIN M. LUMAGUE:</p>
                    <p id="punbar">Punong Barangay</p>
                </div>
            </div>            
        </section>  
    </body>
</html>