
<html>

    <body  style =" background-repeat:no-repeat;background-image: url('https://i.pinimg.com/originals/02/83/fa/0283fa0096f31843dabee05fcd4b4b1c.jpg?fbclid=IwAR0ATqgSqdhIEDFX88UUbLg-4uQR-LyMKXWcbRZK7dxsgClVZW0kga6DU-M'); ">
        <div style="margin-top:85px;">
            <div
                style="float: left;margin-left:85px;width:50px; height:70px; background-image: url('https://upload.wikimedia.org/wikipedia/en/thumb/c/cb/Dhaka_University_logo.svg/1200px-Dhaka_University_logo.svg.png'); background-repeat:no-repeat;background-size:cover;">
            </div>
            <div style="float: left;margin-top:20px;margin-left:45px;">
                <span style="font-size:25px; font-weight:bold">Certificate of Completion</span>
            </div>
    
            <div
                style="margin-left:500px;width:50px; height:70px; background-image: url('https://upload.wikimedia.org/wikipedia/en/thumb/c/cb/Dhaka_University_logo.svg/1200px-Dhaka_University_logo.svg.png'); background-repeat:no-repeat;background-size:cover;">
            </div>
        </div>

        <div style="margin-top:10px;  width:400px;margin-left:130px;  text-align: center;"> 
            <span style="height: 30px;"><i>This is to certify that {{ $stdnt->name}}, father name: {{$stdnt->father_name}},  mother name: {{$stdnt->mother_name}} has completed the course {{$stdnt->language}} language with glorious result. </i></span>
        <br/>
          
           <span style="height:30px"> <i>  He is energetic, efficient and well behaved. he has a pleasant personality and possesses good
            moral character. </i></span><br/> <br/>
          <span style="height: 30px;"> <i>I wish him every success in life. </i> </span>
           <br/> 
        
        </div>

            
      
        <div style="margin-top: 10px; ">
            <hr style="margin-left: 350px; width: 200px;"> 
            <span style="margin-left: 350px; float: left;"> 
                (Prof.{{ $dir->dir_name}}) 
                <br >
                Director
                <br >
                {{  $dir->fac_name  }} 
        </span>
        </div>
    </body>
</html>

