
<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
       <br><br>
       <span style="font-size:25px"><i>This is to certify that</i></span>
       <br><br>
       <span style="font-size:25px"> <i>{{ $stdnt->name}}</i></span>, 
       <span style="font-size:25px"><i> father name: {{$stdnt->father_name}}</i></span>, 
       <span style="font-size:25px"> <i> mother name: {{$stdnt->mother_name}}.</i></span><br/><br/>
       <span style="font-size:25px"><i>He has completed the course {{$stdnt->language}} language with glorious result.</i></span> <br/>
       {{-- <span style="font-size:30px"></span> <br/><br/> --}}
       {{-- <span style="font-size:20px">with score of <b>{{$allstdnt->cgpa}} </b></span> <br/><br/><br/><br/> --}}
       <span style="font-size:25px"> <i>  He is energetic, efficient and well behaved. he has a pleasant personality and possesses good
        moral character. To the best of my knowledge, he did not take part in any activity subversive
        of the state or of discipline.</i></span><br/> <br/>
      <span style="font-size:28px"> <i>I wish him every success in life. </i> </span>
       <br/> <br/> 

        <span style="font-size:30px; text-align:left"> 
                (Prof.
                {{        $dir->dir_name
                }} ) 
                <br>
                Director
                <br>
                {{  $dir->fac_name  }} 
        </span>
       
       
    </div>
</div>
<br>


