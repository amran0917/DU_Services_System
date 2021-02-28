@extends('admin.layouts.master')
@section('title', 'AdminPanel|Notification')


@section('contents')

<div class="container">
   Firebase Notification 
   <script type="text/javascript">
    // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyCX7u71ArIw2iOHYU7EhnRl6HaZMWzLmII",
            authDomain: "du-services-system.firebaseapp.com",
            projectId: "du-services-system",
            storageBucket: "du-services-system.appspot.com",
            messagingSenderId: "159046519246",
            appId: "1:159046519246:web:9699d273c4d60669eb839f",
            measurementId: "G-6F0S1E8PYH"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        //firebase.analytics();
        const messaging = firebase.messaging();
            messaging
        .requestPermission()
        .then(function () {
        //MsgElem.innerHTML = "Notification permission granted." 
            console.log("Notification permission granted.");

            // get the token in the form of promise
            return messaging.getToken()
        })
        .then(function(token) {
        // print the token on the HTML page     
        console.log(token);
        
        
        
        })
        .catch(function (err) {
            console.log("Unable to get permission to notify.", err);
        });

        messaging.onMessage(function(payload) {
            console.log(payload);
            var notify;
            notify = new Notification(payload.notification.title,{
                body: payload.notification.body,
                icon: payload.notification.icon,
                tag: "Dummy"
            });
            console.log(payload.notification);
        });

            //firebase.initializeApp(config);
        var database = firebase.database().ref().child("/applicants/");
        
        database.on('value', function(snapshot) {
            renderUI(snapshot.val());
        });

        // On child added to db
        database.on('child_added', function(data) {
            console.log("Comming");
            if(Notification.permission!=='default'){
                var notify;
                
                notify= new Notification('CodeWife - '+data.val().username,{
                    'body': data.val().message,
                    'icon': 'bell.png',
                    'tag': data.getKey()
                });
                notify.onclick = function(){
                    alert(this.tag);
                }
            }else{
                alert('Please allow the notification first');
            }
        });

        self.addEventListener('notificationclick', function(event) {       
            event.notification.close();
        });

    </script>
</div>


@endsection


    