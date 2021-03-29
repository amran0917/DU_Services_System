
<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
<div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
       <br><br>
       <span style="font-size:25px"><i>This is to certify that</i></span>
       <br><br>
       <span style="font-size:30px"><b>{{ $stdnt->name}}</b></span><br/><br/>
       <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
       <span style="font-size:30px">$course.getName()</span> <br/><br/>
       <span style="font-size:20px">with score of <b>{{$allstdnt->cgpa}} </b></span> <br/><br/><br/><br/>
       <span style="font-size:25px"><i>dated</i></span><br>
      #set ($dt = $DateFormatter.getFormattedDate($grade.getAwardDate(), "MMMM dd, yyyy"))
      <span style="font-size:30px">$dt</span>
</div>
</div


{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center">

       <b>  TO WHOM IT MAY CONCERN </b>
    </div>
    <br>
    <br>
    
    <div>
        This is to certify that {{ $stdnt->name}} S/o, {{$stdnt->father_name}} &amp; {{$stdnt->mother_name}},{{$allstdnt->address}}, was a student of  {{$stdnt->department}}
        , University of Dhaka. He has successfully completed the final examination of “Master
        in Information Technology (MIT)” course (Session- {{$stdnt->session}}, Roll-{{$stdnt->roll_no}}) and his
        CGPA is {{$allstdnt->cgpa}} on a scale of 4.00.
        <br>
        <br>
        <br>

        He is energetic, efficient and well behaved. he has a pleasant personality and possesses good
        moral character. To the best of my knowledge, he did not take part in any activity subversive
        of the state or of discipline.
        <br>
        <br>
        I wish him every success in life.
        <br>
        <br>
        <br>
        (Prof.
        {{        $dir->dir_name
        }} ) 
        <br>
        Director
        <br>
        {{       $dir->fac_name 
        }}
    </div>
</body>
</html> --}}
