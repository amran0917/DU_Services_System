<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <div
        style=" margin: auto; height:70px; background-image: url('https://upload.wikimedia.org/wikipedia/en/thumb/c/cb/Dhaka_University_logo.svg/1200px-Dhaka_University_logo.svg.png'); background-repeat:no-repeat;background-size:cover;">
    </div>
   --}}
    {{-- <div style="text-align: center">
      
        <br>
       <b>  TO WHOM IT MAY CONCERN </b>
    </div> --}}
    <br>
    <br>
    
    <div>
        This is to certify that {{ $stdnt->name}} S/o, {{$stdnt->father_name}} &amp; {{$stdnt->mother_name}}, {{$allstdnt->address}}, was a student of  {{$stdnt->department}}
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
        Prof.
        {{        $dir->dir_name }} 
        <br>
        Director
        <br>
        {{       $dir->fac_name  }}
    </div>
</body>
</html>
